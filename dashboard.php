<?php
    require_once "functions.php";
    $books = getBooks()->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            /*width: 600px;*/
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="wrapper w-75 p-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Books Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Book</a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Pages</th>
                                <th>Price (MAD)</th>
                                <th colspan="2">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book) { ?>
                            <tr>
                                <td> <?= $book['id'] ?> </td>
                                <td> <?= $book['title'] ?> </td>
                                <td> <?= $book['author'] ?> </td>
                                <td> <?= $book['pages'] ?> </td>
                                <td> <?= $book['price'] ?> </td>
                                <td>
                                    <a href="update.php?id=<?= $book['id'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Update</a>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?= $book['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>                          
                    </table>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>