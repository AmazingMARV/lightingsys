<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //mu execute
    $username = $_POST['usename'];
    $password = $_POST['password'];

    require_once 'php/config.php';

    try {
        $con = Connection::con();
        $sql = "select * from users where username = :user and password = :pwd limit 1";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user', $username);
        $stmt->bindParam(':pwd', $password);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();     

        //echo $_SESSION['user'];

       if($stmt->rowCount() > 0){
            $userObj = new \stdClass();

            $userObj->username = $res[0]['username'];
            $userObj->lname = $res[0]['lname'];
            $userObj->fname = $res[0]['fname'];
            $userObj->mname = $res[0]['mname'];
            $userObj->role = $res[0]['role'];

            $_SESSION['user'] = json_encode($userObj);
            ///echo json_encode($userObj);

          
          //$root_url = $_SERVER['PHP_SELF'];
          header('location: dashboard.php');
       }

    }catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }     

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="loginbox">
        <img src="img/icon.png" class="avatar"> 
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <p>Username</p>
            <input type="text" name="usename" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="" value="Login">
        </form>
    </div>
</body>
</html>