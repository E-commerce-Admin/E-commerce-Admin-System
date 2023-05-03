<?php

session_start();

//open database by PDO
$dbms='sqlite';     //DBMS type
$host=''; //Host name
$dbName='mysqlitedb.db';    //database name
$user='';      //database user
$pass='';          //database password
$dsn="$dbms:$dbName";

try {
    $con = new PDO($dsn, $user, $pass);
    $con->exec('PRAGMA foreign_keys = ON;');
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

//a safe method to recieve get data
function myget($str) { 
    $val = !empty($_GET[$str]) ? $_GET[$str] : '';
    return $val;
}       

//a safe method to recieve post data
function mypost($str) { 
    $val = !empty($_POST[$str]) ? $_POST[$str] : '';
    return $val;
}

function mycategory($db_con, $parent_id){
    $sql = "SELECT COUNT(*) FROM product_category WHERE parent_id = ".$parent_id;
    $query = $db_con->query($sql);
    if($query->fetchColumn()>0){
        echo '<ul class="list-unstyled components">';
        $sql = "SELECT * FROM product_category WHERE parent_id = ".$parent_id." ORDER BY priority";
        $query = $db_con->query($sql);
        foreach($query as $row){
            echo '<li>';
            echo '<a href="index.php?category='.$row["id"].'">'.$row["name"].'</a>';
            mycategory($db_con, $row["id"]);
            echo '</li>';
        }
        echo '</ul>';    
    }
}

function newcookie(){
    $expire = time() + 60*60*24;
    $random = md5($_SERVER['REMOTE_ADDR'].time());
    setcookie("guest", $random, $expire, "/");
    return $random;
}

// get user credentail from cookie.
if(isset($_COOKIE["guest"])){
    $guest = $_COOKIE["guest"];
} else {
    $guest = newcookie();
}

// get the cart id of current guest.
$sql = "SELECT * FROM 'cart' WHERE cookie='{$guest}'";
$row=$con->query($sql)->fetch();
if(!$row){
    $sql2 = "INSERT INTO 'cart' (`id`, `cookie`, 'user_id') VALUES (NULL, '{$guest}', 0)";
    $con->exec($sql2);
    $con->query($sql);
    $row=$con->query($sql)->fetch();
}
$cart = $row["id"];

// add the sku to cart if it is not in the cart.
if(isset($_GET['sku'])) {
    $sku = $_GET['sku'];
    $sql = 'SELECT * FROM cart_item WHERE cart_id="'.$cart.'" AND sku_id='.$sku;
    $item = $con->query($sql)->fetch();
    if(!$item){
        $sql2 = "INSERT INTO 'cart_item' (`id`, `cart_id`, 'sku_id', 'quantity') VALUES (NULL, '{$cart}', '{$sku}', 1)";
        $con->exec($sql2);
    }
}

function myitem($db_con, $cart_id){
    $sql = 'SELECT * FROM cart_item WHERE cart_id='.$cart_id;
    $query = $db_con->query($sql);
    foreach($query as $row){
        $sql2 = 'SELECT * FROM sku INNER JOIN spu ON sku.spu_id=spu.id WHERE sku.id='.$row["sku_id"];
        $query2 = $db_con->query($sql2)->fetch();
        echo <<<EOT
            <li class="row">
                <span class="quantity">{$row["quantity"]}</span>
                <span class="itemName">{$query2["name"]}</span>
                <span class="popbtn"><a class="arrow"></a></span>
                <span class="price">$ {$query2["price"]}</span>
            </li>
        EOT;
    }
}

function whoami() {
    if(!empty($_SESSION['username'])) {
        echo $_SESSION['username'];
    } else {
        echo '<a href="login-form.php">Login</a>';    
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302 Lab8</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/customer.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" >
            <div class="sidebar-header">
                <h3>CAN302 DEMO</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Dummy Store</p>
            </ul>

            <?php
            mycategory($con, 1);
            ?>
            
            <ul class="list-unstyled CTAs">
                    <li><a href="#" class="download">Back to HOME</a></li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
    
            <!-- Nav Bar Holder-->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <span>Toggle Sidebar</span>
                        </button>
                    </div>
                    <div class="navbar-left">
                        <form class="navbar-form" role="search" method="post" action="index.php">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword">
                                <button type="submit" class="btn btn-default">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="navbar-right navbar-text">
                            <?php whoami() ?>
                    </div>
                </div>
            </nav>

            <div class="container-fluid text-center"> <!-- Show products here-->

                <h2>Your shopping cart</h2>
                <div class="line"></div>

                <div class="col-md-5 col-sm-12">
                    <div class="bigcart"></div>
                    <p>
                        This is a free and <b><a href="https://tutorialzine.com/2014/04/responsive-shopping-cart-layout-twitter-bootstrap-3/" title="Read the article!">responsive shopping cart layout, made by Tutorialzine</a></b>. It looks nice on both desktop and mobile browsers. Try it by resizing your window (or opening it on your smartphone and pc).
                    </p>
                </div>
            
                <div class="col-md-7 col-sm-12 text-left">
                    <ul>
                        <li class="row list-inline columnCaptions">
                            <span>QTY</span>
                            <span>ITEM</span>
                            <span>Price</span>
                        </li>

                        <?php
                        myitem($con, $cart);
                        ?>

                        <li class="row totals">
                            <span class="itemName">Total:</span>
                            <span class="price">$1694.43</span>
                            <span class="order"> <a class="text-center" onclick="window.open('order.php?cart=<?php echo $cart ?>')">ORDER</a></span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</body>
</html>