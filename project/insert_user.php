<?php
$dsn = 'mysql:host=localhost;dbname=bookrepository';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $account_made_date = $_POST['account_made_date'];

    $sql = "INSERT INTO Users (FirstName, LastName, Emaillogin, Passwordhash, AccountMadeDate) 
    VALUES (:first_name, :last_name, :email, :password, :account_made_date)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':account_made_date', $account_made_date);

    try {
        $stmt->execute();
        echo "User added successfully!";
    } catch (PDOException $e) {
        echo "Error adding user: " . $e->getMessage();
    }
}
?>
