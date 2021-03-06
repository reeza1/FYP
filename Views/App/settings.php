<!doctype html>
<html lang="en">
<head>

    <?php 
        
        session_start();
        
        if (isset($_SESSION['login_user']) == false) {
            header("Location: ../UserLogin.php");
        }

    ?>
    <script type="text/javascript">
    function onLoad(){
       document.getElementById("userName").innerHTML = <?php print("'" . $_SESSION['login_user']['Name'] . "'") ?>;
    }
    </script>

    <meta charset="UTF-8">

    <title>Condition Tracker</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/appStyle.css"> <!-- custom styles -->

</head>
<body onload="onLoad()">
    <div class="container">

    	<h1>Condition Tracker</h1>
          <h2>An easier way to track health conditions</h2>

    </div>

    <div class="container2">

        <nav class="navigation">
        	  	
          	<ul class="Nav-bar">
                <li><a href="profile.php" id="userName"></a></li>
                <li><a href="logAReading.php">Log a Reading</a></li>
                <li><a href="graphs.php">Graphs</a></li>
                <li><a href="personalData.php">Data</a></li>
                <li><a class="active" href="settings.php">Settings</a></li>
                <li><a href="../../resources/logout.php"> Log Out </a></li>
            </ul>
        </nav>
        	  
        <div class="content">     
            <div class="title"> Settings </div>
            <img class="help" src="../../Static/images/question-mark-button.png" title="Help">
        </div>  
        <div class="page">
            
        </div>  
        
        <div class="footer"></div>

    </div>

</body>
</html>