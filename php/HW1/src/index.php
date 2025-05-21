<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form Handling</title>
</head>
<body>
    <h2>Submit Your Details</h2>
    <form action="process.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $_GET['name'] ?? '' ?>">
        <span style="color:red;"><?= $_GET['name_error'] ?? '' ?></span>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $_GET['email'] ?? '' ?>">
        <span style="color:red;"><?= $_GET['email_error'] ?? '' ?></span>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password">
        <span style="color:red;"><?= $_GET['password_error'] ?? '' ?></span>
        <br><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password">
        <span style="color:red;"><?= $_GET['confirm_error'] ?? '' ?></span>
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
