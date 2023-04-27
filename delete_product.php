<?php
    if($_GET['id_product']){
        include "connect_db.php";
        $qry_hapus=mysqli_query($conn,"delete from product where id_product='".$_GET['id_product']."'");
        if($qry_hapus){
            echo "<script>alert('Delete product successfully');location.href='../pages/product.php';</script>";
        } else {
            echo "<script>alert('Failed to delete the product');location.href='../pages/product.php';</script>";
        }
    }
?>
