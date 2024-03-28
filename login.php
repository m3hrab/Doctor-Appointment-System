<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary">
        <a class="navbar-brand" href="#">DocAppoint</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Appointments</a>
                </li>                
            </ul>
        </div>

        <div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>     
        </div>
    </nav>

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

    <a href="signup.php">Signup</a>
</body>
</html>
