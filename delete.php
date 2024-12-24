<?php
include 'Database.php';
include 'User.php';

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);
    if ($user->deleteUser($matric)) {
        echo "User deleted successfully.";
        header("Location: read.php");
        exit();
    } else {
        echo "Error deleting user.";
    }

    $db->close();
}
?>