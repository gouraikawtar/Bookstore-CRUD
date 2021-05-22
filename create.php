<?php
    require_once "functions.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST["title"];
        $author = $_POST["author"];
        $pages = $_POST["pages"];
        $price = $_POST["price"];
        if(createBook($title, $author, $pages, $price) != 0){
            header("location: dashboard.php");  // Redirect to home page
            exit();
        }else{
            echo "Something wrong!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container w-50 p-3">
        <form action="create.php" method="POST">
            <h2 class="text-center">Add new book</h2>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Author">
            </div>
            <div class="form-group">
                <label for="pages">Pages</label>
                <input type="number" class="form-control" id="pages" name="pages" placeholder="Pages">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Price">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
</body>
</html>