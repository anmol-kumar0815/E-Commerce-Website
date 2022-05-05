<?php
    session_start();
    if(isset($_SESSION['EMAIL'])){
        echo "true";
    }else{
        echo "false";
    }
?>