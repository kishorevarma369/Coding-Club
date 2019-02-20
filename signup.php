<?php
include_once('includes/session.php');
if(isset($_SESSION['user_id'])) header('Location: '.'/home.php');
include_once('includes/dbcon.php');

function process_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit']))
{
    
    if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['pass']))
    {
        $username=process_input($_POST['username']);
        $email=process_input($_POST['email']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $pass=process_input($_POST['pass']);
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM `users` WHERE `email` = '$email' or `username` = '$username'";
            if($ans=mysqli_query($dbcon,$sql)){
                if(mysqli_num_rows($ans)==0)
                {
                    $sql="INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `verified`) VALUES (NULL, '$username', '$email', '$pass', '0')";
                    echo $sql;
                    if(mysqli_query($dbcon,$sql))
                    {
                        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
                        if($res=mysqli_query($dbcon,$sql)){
                            $row=mysqli_fetch_assoc($res);
                            $_SESSION['user_id']=$row['user_id'];
                            $_SESSION['username']=$username;
                        }
                        else $_SESSION['error']='Account Creation Problem Contact Admin';
                    }
                    else $_SESSION['error']='Account Creation Problem Contact Admin';
                }
                else
                {
                    $_SESSION['error']='Account already Exists';
                } 
            }else $_SESSION['error']='Failed query';
        }
        else $_SESSION['error']='Invalid Email';
    }
}
mysqli_close($dbcon);
// echo $_SESSION['error'];
header('Location: index.php');
?>