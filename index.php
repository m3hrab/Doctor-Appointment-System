<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment System</title>
</head>
<body>
    <h1>Welcome to Doctor Appointment System</h1>
    
    <?php
    session_start();
    // Check if user is logged in
    if (isset($_SESSION['name'])) {
        echo "<p>Welcome, " . $_SESSION['name'] . "!</p>";
        echo "<a href='logout.php'>Logout</a>";
    } else {
        echo "<a href='login.php'>Login</a> | <a href='signup.php'>Signup</a>";
    }
    ?>
</body>
</html>
