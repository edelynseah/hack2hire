<?php
session_start();
//Database connection
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" )  {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(mysqli_num_rows($result)==1){
//        $status = "SELECT status FROM users WHERE email='$email'";
//        $usernamesql = "SELECT username FROM users WHERE email='$email'";
//        $username = mysqli_fetch_object(mysqli_query($db, $usernamesql)) -> username;
//        $datetime = date("Y-m-d H:i:s");
//        mysqli_query($db,"UPDATE users SET last_login='$datetime',total_login=total_login+1 WHERE email='$email'");
//        $isAdmin = in_array('admin', mysqli_fetch_assoc(mysqli_query($db,$status)));
          $_SESSION['email'] = $email;
//        $_SESSION['username'] = $username;
//        $_SESSION['isAdmin'] = $isAdmin;
        header("Location: home.html");
        exit;
    }
    else {
        echo "<script>alert('Invalid credentials. Please try again.');
        window.location='login.html'</script>";}
}

else{
    echo "<script>alert('Invalid credentials. Please try again.')";
}
?>