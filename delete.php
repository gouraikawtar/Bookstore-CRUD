<?php
    require_once "functions.php";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if(deleteBook($id) != 0){
            header("location: dashboard.php");
            exit();
        }else{
            echo "Something wrong!";
        } 
    }
?>