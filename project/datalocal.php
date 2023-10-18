

<?php

    $dsn = 'mysql:host=localhost;dbname=bookrepository';
    $username = 'root';
    $password = '';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo "There was an error";
        exit();
    }
    // Prepare the SQL statement for execution
    $stmt = $db->prepare("SELECT * FROM Users");
    // Execute the prepared statement
    $stmt->execute();
    // Fetch all of the remaining rows in the result set and display them
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "UserID: " . $row['UserID'] . "<br>";

        echo "FirstName: " . $row['FirstName'] . "<br>";

        echo "LastName: " . $row['LastName'] . "<br>";

        echo "Emaillogin: " . $row['Emaillogin'] . "<br>";

        echo "Passwordhash: " . $row['Passwordhash'] . "<br>";

        echo "AccountMadeDate: " . $row['AccountMadeDate'] . "<br>";

        echo "AccountClosingDate: " . $row['AccountClosingDate'] . "<br><br>";
        

    }

    $stmt = $db->prepare("SELECT * FROM Authors");

    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "AuthorID: " . $row['AuthorID'] . "<br>";

        echo "FirstName: " . $row['FirstName'] . "<br>";

        echo "LastName: " . $row['LastName'] . "<br><br>";
    }

    $stmt = $db->prepare("SELECT * FROM Books");
   
    $stmt->execute();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "BookID: " . $row['BookID'] . "<br>";

        echo "Title: " . $row['Title'] . "<br>";

        echo "AuthorID: " . $row['AuthorID'] . "<br>";

        echo "BookGenreID: " . $row['BookGenreID'] . "<br>";

        echo "ISBN: " . $row['ISBN'] . "<br>";

        echo "Pyear: " . $row['Pyear'] . "<br>";

        echo "Cost: " . $row['Cost'] . "<br>";

        echo "Length: " . $row['Length'] . "<br><br>";
    }

    $stmt = $db->prepare("SELECT * FROM BookGenre");

    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "BookGenreID: " . $row['BookGenreID'] . "<br>";

        echo "GenreName: " . $row['GenreName'] . "<br>";

        echo "BookID: " . $row['BookID'] . "<br><br>";
    }

    $stmt = $db->prepare("SELECT * FROM BooksRead");
   
    $stmt->execute();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "BooksReadID: " . $row['BooksReadID'] . "<br>";

        echo "UserID: " . $row['UserID'] . "<br>";

        echo "BookID: " . $row['BookID'] . "<br>";

        echo "DateRead: " . $row['DateRead'] . "<br>";

        echo "ReviewDate: " . $row['ReviewDate'] . "<br>";

        echo "ReviewText: " . $row['ReviewText'] . "<br>";

        echo "Rating: " . $row['Rating'] . "<br><br>";

    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <form action="insert_user.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="account_made_date">Account Made Date:</label>
        <input type="date" name="account_made_date" required><br>

        <input type="submit" value="Add User">
    </form>
    <!DOCTYPE html>
<html>
<head>
    <title>Users Database Query</title>
</head>
<body>
    <h1>Users Database Query</h1>
    <form action="query.php" method="POST">
        <button type="submit">Query Users Database</button>
    </form>
    
</body>
</html>


</body>
</html>
