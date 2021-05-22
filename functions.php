<?php
/**
 *      --------------------- STEPS ---------------------
 *      1- Making the query
 *      2- Connecting to DB
 *      3- Executing the query
 *      4- Disconnecting from DB
 *      5- Returning the result (dial executed query)
 */

    function connect(){
        // Create our variables
        $servername = "localhost";
        $dbname = "bookstore";  // DB name, you can change it if you want
        $username = ""; // insert DB username here
        $password = ""; // insert DB password here
        // IMPORTANT : the by default MySQL port is 3306, dont forget to check if it's the same for you or not, you might have different one !

        try {
            // Create a new connection
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8;port=3306", $username, $password);
            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
            
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    // function disconnect(){
    //     $pdo = null;
    // }

    function getBooks(){
        // Create query
        $query = "SELECT * FROM books";
        // Connect to DB
        $pdo = connect();
        // Execute query
        $result = $pdo->query($query);
        // Disconnect from DB
        $pdo = null;
        // Return result
        return $result;
    }

    function getBookById($id){
        $query = "SELECT * FROM books WHERE id = '$id'";
        $pdo = connect();
        $result = $pdo->query($query);
        $pdo = null;
        return $result;
    }

    function createBook($title, $author, $pages, $price){
        // Using exec()
        $query = "INSERT INTO books (title, author, pages, price) VALUES ('$title','$author', '$pages', '$price')";
        $pdo = connect();
        $res = $pdo->exec($query);
        $pdo = null;
        return $res;

        // Using Prepared statement
        /*$pdo = connect();
        $stm = $pdo->prepare("INSERT INTO books (title, author, pages, price) VALUES (?, ?, ?, ?)");
        $res = $stm->execute([$title, $author, $pages, $price]);
        $pdo = null;
        return $res;*/
    }

    function updateBook($id, $title, $author, $pages, $price){
        $query = "UPDATE books SET 
                    title = '$title', author = '$author', pages = '$pages', price = '$price' 
                    where id = '$id'";
        $pdo = connect();
        $res = $pdo->exec($query);
        $pdo = null;

        return $res;
    }

    function deleteBook($id){
        $query = "DELETE FROM books WHERE id = '$id'";
        $pdo = connect();
        $res = $pdo->exec($query);
        $pdo = null;

        return $res;
    }

?>
