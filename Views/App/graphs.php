<!doctype html>
<html lang="en">
<head>

    <?php 
        
        session_start();
        
        if (isset($_SESSION['login_user']) == false) {
            header("Location: ../Views/UserLogin.php");
        }

        include '../../resources/config.php';

    ?>
    <script type="text/javascript" src="../Js/d3Config.js"></script>
    <script type="text/javascript" src="../Js/createGraph.js"></script>
    <script type="text/javascript">
    
    function onLoad(){
        var identification = <?php print_r("'" . $_SESSION['login_user']['ID'] . "'") ?>;
        document.getElementById("userName").innerHTML = <?php print("'" . $_SESSION['login_user']['Name'] . "'") ?>;
    }

    
    </script>

    <meta charset="UTF-8">

    <title>Condition Tracker</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/appStyle.css"> 
    <!-- D3 -->
    <script src="http://d3js.org/d3.v2.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3-legend/1.1.0/d3-legend.js"></script>


</head>
<body onload="onLoad()">
    <div class="container">

        <h1>Condition Tracker</h1>
          <h2>An easier way to track health conditions</h2>

    </div>

    <nav class="navigation">
            
        <ul class="Nav-bar">
            <li><a href="profile.php" id="userName"></a></li>
            <li><a href="logAReading.php">Log a Reading</a></li>
            <li><a class="active" href="graphs.php">Graphs</a></li>
            <li><a href="personalData.php">Data</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="../UserLogin.php"> Log Out </a></li>
        </ul>
    </nav>

    <div class="content">     
        <div class="title"> User Graphs </div>
        <img class="help" src="../../Static/images/question-mark-button.png" title="Help">

        <div id="newGraphs">
                <script type="text/javascript" >

                    var userData = <?php print_r(json_encode(getConditionData($_SESSION['login_user']['ID'])->toArray())); ?> 

                    var graphs = <?php print_r(json_encode(getData("Users", ['_id' => new MongoDB\BSON\ObjectId($_SESSION['login_user']['ID'])])->toArray())) ?>;

                    var graphs = graphs[0]['SpecifiedGraphs'];

                    for (key in graphs){
                        
                        createGraph(key, userData, graphs[key]);
                    }

                </script>
        </div>
    </div>

          
    <!-- <div class="footer"></div> -->
</body>
</html>
