<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment System</title>
    <link rel="stylesheet" href="css/index_style.css">
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

        <!-- Profile dropdown -->
        <div class="profile">
            <?php
            session_start();
            // Check if user is logged in
            if (isset($_SESSION['name'])) {
                echo '<div class="dropdown">';
                echo '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">';
                echo $_SESSION['name']; 
                echo '</a>';
                echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                echo '<li><a class="dropdown-item" href="#">Profile</a></li>';
                echo '<li><a class="dropdown-item" href="#">Settings</a></li>';
                echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                echo '</ul>';
                echo '</div>';
            }
            else {
                echo '<ul class="navbar-nav mr-auto">';
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="signup.php">Signup</a>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="login.php">Login</a>';
                echo '</li>';
            }
            ?>
        </div>
    </nav>
</body>
</html>
