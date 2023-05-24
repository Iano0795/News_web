<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/style/style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div id="left">
        <h1>NEWSLETTER</h1>
        <img src="https://images.pexels.com/photos/1369476/pexels-photo-1369476.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="background">
    </div>
    <div id="right">
        <form method="post" action="login.php" id="login_container">
            <?php
                $sname = "localhost";
                $uname = "root";
                $password = "";
                $dbname = "usercredentials";

                $conn = mysqli_connect($sname, $uname, $password, $dbname);
                
                if(!$conn){
                    die("Connection failed!");
                }

                $username = $_POST['User'];
                $pass = $_POST['pass'];
                $username = stripcslashes($username);
                $pass = stripcslashes($pass);
                $username = mysqli_real_escape_string($conn, $username);
                $pass = mysqli_real_escape_string($conn, $pass);

                $sql = "select * from users where username = '$username' and password = '$pass'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);

                if($count == 1){
                    header('Locaton:home_page.html');
                }else{
                    echo "login failed";
                }
            ?>
            <p id="message"></p>
            <input type="text" name="User" id="userName" placeholder="User name">
            <hr/>
            <input type="password" name="pass" id="userPassword" placeholder="Password">
            <hr/>
            <button id="btn" type="submit">Login</button>
        </form>
    </div>
</body>
</html>