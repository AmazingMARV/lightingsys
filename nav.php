<div class="navbar">

    <h3>Lighting System</h3>
    
    <ul class="links">
        <li class="active"><a href="a">Dashboard</a></li>
        <li><a href="switch.php">Switch</a></li>
        <li><a href="user.php">User</a></li>
        <li><a href="dashboard.php"><?php echo strtoupper($user->username); ?></a></li> 
    </ul>

    <button class="btnlogout" onclick="document.getElementById('logout').submit()">Log Out</button></a>
</div>

<form id="logout" action="logout.php" method="post">
    </form>