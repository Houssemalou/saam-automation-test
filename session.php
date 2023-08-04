<?php
    session_start();
    if(isset($_SESSION['email'])){
        $curentUser=$_SESSION['email'];
    }
?>