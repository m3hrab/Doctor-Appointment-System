<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php session_start(); ?>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>

    <?php if (isset($_POST['login'])): ?>
        <?php
        include('db.php'); // Include database connection
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM Patients WHERE Email='$email' AND Password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1):
            // Fetch user's name and store it in a session variable
            $row = $result->fetch_assoc();
            $_SESSION['name'] = $row['Name'];
            $_SESSION['email'] = $email;
            header("Location: index.php"); // Redirect to homepage
        else:
            echo "Invalid email or password";
        endif;
        ?>
    <?php endif; ?>

    <a href="signup.html">Signup</a>
</body>
</html>
