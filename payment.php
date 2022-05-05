<?php

    session_start();
    if(!isset($_SESSION['EMAIL'])){
        echo("<script type='text/javascript'>alert('Login Required');
            window.location.href='login.php';
            </script>");
    }else{
        include("admin/config.php");
    
        $productCategory = $_GET['CATEGORY'];
        $productId = $_GET['ID'];
        $_SESSION['CATEGORY'] = $productCategory;
        $_SESSION['PRODUCTID'] = $productId;

        $sql = "SELECT NUMBEROFPRODUCT FROM {$productCategory} WHERE ID = '{$productId}'";
        $result = mysqli_query($conn, $sql) or die("first query not running");
        $row = mysqli_fetch_assoc($result);
        if($row['NUMBEROFPRODUCT'] > 0){
            $sql = "UPDATE {$productCategory} SET NUMBEROFPRODUCT = NUMBEROFPRODUCT - 1 WHERE ID = {$productId}";
            $result = mysqli_query($conn, $sql) or die("second query not running");
            header("location: PaytmKit/TxnTest.php?CATEGORY=".$productCategory."&PRODUCTID=".$productId);
        }else{
            header("location: card-details.php?CATEGORY=".$productCategory."&ID=".$productId);
        }
    }
?>