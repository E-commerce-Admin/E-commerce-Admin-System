<?php

//open database by PDO
$dbms='sqlite';     //DBMS type
$host=''; //Host name
$dbName='mysqlitedb.db';    //database name
$user='';      //database user
$pass='';          //database password
$dsn="$dbms:$dbName";

try {
    $con = new PDO($dsn, $user, $pass);
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

// Show products infomation

function spudetail($db_con, $spu){
    $sql = "SELECT COUNT(*) FROM spu WHERE id = ".$spu;
    $query = $db_con->query($sql);
    if($query->fetchColumn()>0){
        $sql = 'SELECT * FROM spu WHERE id ='.$spu;
        $row = $db_con->query($sql)->fetch();
        $info_array = json_decode($row["info_list"], true);
        echo <<<EOT
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <img src="img/demo.jpg" style="width:80%" id="product_img"/>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12">
                    <H2>{$row["name"]}</H2>
                    <p>{$row["description"]}</p>
        EOT;
        $i =1;
        foreach($info_array as $info){
            echo <<<EOT
                    <div class="row">
                        <div class="col-lg-3 col-mg-3 col-sm-3">
                                <p> {$info} </p>
                        </div>
                        <div class="col-lg-9 col-mg-9 col-sm-9 btn-group" data-toggle="buttons">
            EOT;

            $sku_sql = 'SELECT DISTINCT info_'.$i.' FROM sku WHERE spu_id='.$row['id'];
            $sku_details = $db_con->query($sku_sql);
            foreach($sku_details as $sku_row){
                echo <<<EOT
                    <label class="btn btn-primary">
                        <input type="radio" name="options" id="option1"> {$sku_row["info_".$i]}
                    </label>
                EOT;
            }
            $i++;
            echo <<<EOT
                            </div>
                        </div>
            EOT;
        }

        echo <<<EOT
                        <div class="line"> </div>

                        <div class="row">
                            <p> $ xxxx</p>
                            <label class="btn btn-primary">Add to Cart</label>
                        </div>
        EOT;
    } else {
        echo "<h2> Product ID error! </h2>";
    }
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302 Lab5</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="styles/sidebar.css">
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
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>CAN302 DEMO</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Product Details</p>
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
                    <div class="navbar-right">
                        <form class="navbar-form" role="search" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </nav>

            <div class="container-fluid"> <!-- Show product details here-->
            
            <?php
            
            if(isset($_GET['spu'])){
                spudetail($con, myget('spu'));
            } else {
                echo "<h2> Parameter error! </h2>";
            }
                        
            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>