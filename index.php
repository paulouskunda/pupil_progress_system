<?php
// Include config file
require_once "includes/config.php";
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: index.php");
//     exit;
// }

 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT adminID, adminUserName, password FROM admin WHERE adminUserName = ?";
        $sql2 = "SELECT teacherID, phoneNumber, grade_class, password FROM teacher WHERE phoneNumber = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id,$username, $hashed_password);
                    if($stmt->fetch()){
                        if($password == $hashed_password ){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["adminid"] = $id;
                            $_SESSION["username"] = $username;   
                                                     
                            
                            // Redirect user to welcome page
                            header("location: admin/");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                }
                // else if($results = $mysqli->query($sql2)){
                //     if($results->num_rows > 0){
                //         while($rows = $results->fetch_assoc()){
                //             if($password == $rows['password']){
                //                 $_SESSION["loggedin"] = true;
                //                 $_SESSION["teacherid"] = $id;
                //                 $_SESSION["username"] = $username;  

                //                 header("location: teacher/move.php?grade=".$rows['grade_class']);

                //             }else{
                //                 $password_err = "The password you entered was not valid.";
                //             }
                //         }
                //     }else{
                //         $username_err = "No account found with that username.";
                //     }
                // }
                else if($stmt = $mysqli->prepare($sql2)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("s", $param_username);
                    
                    // Set parameters
                    $param_username = $username;
                    
                    // Attempt to execute the prepared statement
                    if($stmt->execute()){
                        // Store result
                        $stmt->store_result();
                        
                        // Check if username exists, if yes then verify password
                        if($stmt->num_rows == 1){                    
                            // Bind result variables
                            $stmt->bind_result($id,$username, $grade_class ,$hashed_password);
                            if($stmt->fetch()){
                                if($password == $hashed_password){
                                    // Password is correct, so start a new session
                                    session_start();
                                    
                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["teacherid"] = $id;
                                    $_SESSION["username"] = $username;                            
                                    echo ";";
                                    // Redirect user to welcome page
                                    header("location: teacher/move.php?grade=".$grade_class);
                                } else{
                                    // Display an error message if password is not valid
                                    $password_err = "The password you entered was not valid.";
                                }
                            }
                        } else{
                            // Display an error message if username doesn't exist
                            $username_err = "No account found with that username.";
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
        
                    // // Close statement
                    // $stmt->close();
                }
            }
            
            // Close connection
            $mysqli->close();
        }
                //  else{
                //     // Display an error message if username doesn't exist
                //     $username_err = "No account found with that username.";
                // }
            
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        

        }
        
        
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin-left: 33%; margin-top:10% }
    </style>
</head>
<body>
    <div class="container">
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Forgot your Password? <a href="changepassword.php">Reset Password</a>.</p>
        </form>
    </div>    
</body>
</html>