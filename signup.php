<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment System</title>
</head>
<body>
    <h1>Signup</h1>
    <?php session_start(); ?>
    <!-- Display signup form -->
    <form action="" method="post">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="tel" name="contact_number" placeholder="Contact Number" requried><br>
        <button type="submit" name="signup">Signup</button>
    </form>

    <?php if (isset($_POST['signup'])): ?>
        <?php
        include('db.php'); // Include database connection
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $contact_number = $_POST['contact_number'];
        
        // Check if email already exists
        $check_email = "SELECT * FROM Patients WHERE Email='$email'";
        $result_email = $conn->query($check_email);
        if ($result_email->num_rows > 0) {
            echo "Email already exists";
        } 
        else {
            // Insert new user data into database
            $sql = "INSERT INTO Patients (Name, Email, Password, contact_number) VALUES ('$name', '$email', '$password', '$contact_number')";
            if ($conn->query($sql) === TRUE) {
                echo "Signup successful!";
                header("Location: login.php");
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
    <?php endif; ?>

    <a href="login.php">Login</a>
</body>
</html>
