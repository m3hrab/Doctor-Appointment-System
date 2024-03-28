<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary">
        <a class="navbar-brand" href="#">DocAppoint</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
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
