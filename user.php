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
<?php
        include 'nav.php';
    ?>

    <div class="table-container">
        <h1 class="heading">User List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Sex</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="User ID">1</td>
                    <td data-label="Username">admin</td>
                    <td data-label="Last Name">Santiago</td>
                    <td data-label="First Name">Noel</td>
                    <td data-label="Middle Name">Santisima</td>
                    <td data-label="Sex">Male</td>
                    <td data-label="Role">ADMIN</td>
                    
                </tr>
                <tr>
                    <td data-label="User ID">2</td>
                    <td data-label="Username">admin</td>
                    <td data-label="Last Name">Santiago</td>
                    <td data-label="First Name">Noel</td>
                    <td data-label="Middle Name">Santisima</td>
                    <td data-label="Sex">Male</td>
                    <td data-label="Role">ADMIN</td>
                    
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>