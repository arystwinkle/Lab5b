<?php
include 'Database.php';
include 'User.php';

// Check if the form has been submitted
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Process the update using the matric value
    // For example, you can fetch the user data using the matric value and display it in a form for updating
    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    if ($userDetails) {
    
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
        <h2>Update User</h2>
        <form action="update.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" id="matric" name="matric" value="<?php echo $userDetails['matric']; ?>" required><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $userDetails['name']; ?>"><br>
            <label for="role">Access Level</label>
            <select name="role" id="role" required>
                <option value="">Please select</option>
                <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer')
                    echo "selected" ?>>Lecturer</option>
                    <option value="student" <?php if ($userDetails['role'] == 'student')
                    echo "selected" ?>>Student</option>
                </select><br>
                <input type="submit" value="Update">
                <a href="read.php" style="text-decoration: underline;">Cancel</a>
            </form>
        </body>

        </html>
    <?php
    } else {
        echo "User not found.";
    }

    $db->close();
}
?>