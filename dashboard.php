<?php
session_start();

if(isset($_SESSION['user'])){
    $user = json_decode( $_SESSION['user']);
}else{
    header('location: index.php');
}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lighting System Nav Bar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/switchstyle.css">


</head>
<body>

    <div class="navbar">

        <h3>Lighting System</h3>
        
        <ul class="links">
            <li class="active"><a href="a">Dashboard</a></li>
            <li><a href="a.html">Schedules</a></li>
            <li><a href="a"><?php echo strtoupper($user->username); ?></a></li> 
        </ul>

        <button class="btnlogout" onclick="document.getElementById('logout').submit()">Log Out</button></a>
    </div>

    <form id="logout" action="logout.php" method="post">
    </form>

    <div class="container">
        <div class="row flex-center">
            <div class="box">
                <div class="box-header">
                    <div class="title">SWITCH 1</div>
                </div>
                <div class="box-body">
                    <p id="status1">STATUS: OFF</p>
                    <label class="switch">
                        <input type="checkbox" id="togBtn1" onclick="switchFunction()">
                        <div class="slider round">
                            <span class="on">ON</span>
                            <span class="off">OFF</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <div class="title">SWITCH 2</div>
                </div>
                <div class="box-body">
                    <p id="status2">STATUS: OFF</p>
                    <label class="switch">
                        <input type="checkbox" id="togBtn2">
                        <div class="slider round">
                            <span class="on">ON</span>
                            <span class="off">OFF</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>


    <script>

        function switchFunction(){
            var switch1 = document.getElementById('togBtn1');
            let status1 = document.getElementById('status1');

            let headers = new Headers();
            headers.append('Content-Type', 'application/json');
            headers.append('Accept', 'application/json');
            headers.append('Access-Control-Allow-Origin', 'http://localhost:8080');
            headers.append('Access-Control-Allow-Credentials', 'true');

            if(switch1.checked == true){
                status1.innerHTML = "STATUS: ON";
                status1.style.color = "green";

               

                fetch('http://192.168.0.50/ON')
            }else{
                fetch('http://192.168.0.50/OFF')
                status1.innerHTML = "STATUS: OFF";
                status1.style.color = "red";
            }
        }
        
    </script>
   
</body>
</html>
