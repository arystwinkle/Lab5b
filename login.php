<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
    <h1>Login Page</h1>
    <form action="authenticate.php" method="post">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'true') {
            echo "<p style='color: red;'>Login failed. Invalid Matric or Password!</p>";
        } elseif ($_GET['error'] == 'emptyfields') {
            echo "<p style='color: red;'>Please fill in all required fields.</p>";
        }
        echo '<p><a href="register_form.php" style="text-decoration: underline;">Register</a> here if you have not.</p>';
    }
    ?>
    </div>
</body>

</html>