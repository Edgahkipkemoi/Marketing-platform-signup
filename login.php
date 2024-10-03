<?php
session_start();

// Include database connection code if needed
// Example:
// include 'config.php'; // Assuming your database connection code is in config.php

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Check input errors before inserting into database
    if(empty($email_err) && empty($password_err)){
        
        // Prepare a select statement
        // Example:
        // $sql = "SELECT id, username, password FROM users WHERE email = ?";
        
        // if($stmt = mysqli_prepare($link, $sql)){
        //     // Bind variables to the prepared statement as parameters
        //     mysqli_stmt_bind_param($stmt, "s", $param_email);
            
        //     // Set parameters
        //     $param_email = $email;
            
        //     // Attempt to execute the prepared statement
        //     if(mysqli_stmt_execute($stmt)){
        //         // Store result
        //         mysqli_stmt_store_result($stmt);
                
        //         // Check if email exists, if yes then verify password
        //         if(mysqli_stmt_num_rows($stmt) == 1){                    
        //             // Bind result variables
        //             mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
        //             if(mysqli_stmt_fetch($stmt)){
        //                 if(password_verify($password, $hashed_password)){
        //                     // Password is correct, start a new session
        //                     session_start();
                            
        //                     // Store data in session variables
        //                     $_SESSION["username"] = $username;                            
        //                     $_SESSION["id"] = $id;
                            
        //                     // Redirect user to welcome page
        //                     header("location: index.php");
        //                 } else{
        //                     // Display an error message if password is not valid
        //                     $password_err = "The password you entered was not valid.";
        //                 }
        //             }
        //         } else{
        //             // Display an error message if email doesn't exist
        //             $email_err = "No account found with that email.";
        //         }
        //     } else{
        //         echo "Oops! Something went wrong. Please try again later.";
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
    <title>Login - Digital Marketing Platform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Login to Your Account</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Digital Marketing Platform</p>
    </footer>
</body>
</html>
