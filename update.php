<?php
    require_once "functions.php";
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        $title = $_POST["title"];
        $author = $_POST["author"];
        $pages = $_POST["pages"];
        $price = $_POST["price"];
        if(updateBook($id, $title, $author, $pages, $price) != 0){
            header("location: dashboard.php");
            exit();
        }else{
            echo "Something wrong!";
        }
    }else{
        if(isset($_GET["id"])){
            $myId = $_GET["id"];
            $myBook = getBookById($myId)->fetch();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container w-50 p-3">
        <form action="update.php" method="POST">
            <h2 class="text-center">Update book details</h2>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" placeholder="ID" value="<?= $myBook['id'] ?>">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?= $myBook['title'] ?>">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="<?= $myBook['author'] ?>">
            </div>
            <div class="form-group">
                <label for="pages">Pages</label>
                <input type="number" class="form-control" id="pages" name="pages" placeholder="Pages" value="<?= $myBook['pages'] ?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= $myBook['price'] ?>">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>