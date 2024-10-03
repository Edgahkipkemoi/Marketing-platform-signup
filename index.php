<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Platform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php if(isset($_SESSION['username'])): ?>
                <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <div class="container">
                <h1>Welcome to Our Digital Marketing Platform</h1>
                <?php if(isset($_SESSION['username'])): ?>
                <p>Welcome back, <?php echo $_SESSION['username']; ?>!</p>
                <?php else: ?>
                <p>Please sign up to access our advertising services.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Other sections: Services, About Us, Contact -->

    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Digital Marketing Platform</p>
        </div>
    </footer>
</body>
</html>
