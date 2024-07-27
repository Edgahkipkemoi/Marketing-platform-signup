<?php
session_start();

// Include database connection code if needed
// Example:
// include 'config.php'; // Assuming your database connection code is in config.php

// Define variables and initialize with empty values
$username = $email = $password = "";
$username_err = $email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Check input errors before inserting into database
    if(empty($username_err) && empty($email_err) && empty($password_err)){
        
        // Prepare an insert statement
        // Example:
        // $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        
        // if($stmt = mysqli_prepare($link, $sql)){
        //     // Bind variables to the prepared statement as parameters
        //     mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
            
        //     // Set parameters
        //     $param_username = $username;
        //     $param_email = $email;
        //     $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
        //     // Attempt to execute the prepared statement
        //     if(mysqli_stmt_execute($stmt)){
        //         // Redirect to login page
        //         header("location: login.php");
        //     } else{
        //         echo "Something went wrong. Please try again later.";
        //     }

        //     // Close statement
        //     mysqli_stmt_close($stmt);
        // }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Digital Marketing Platform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sign Up for Your Account</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Already have an account? <a href="login.php">Log in</a></p>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Digital Marketing Platform</p>
    </footer>
</body>
</html>
