<?php
    include 'dbconn.php';
    if(!isset($_COOKIE["username"]))
        header("Location: login.php");

    $sql="select * from utility";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $sprinkler=$row['status'];
    $row=$result->fetch_assoc();
    $waterPump=$row['status'];
    $row=$result->fetch_assoc();
    $fertiliser=$row['status'];

    $sql="select * from `data` order by `TIME` desc limit 1;";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $temperature=$row['TEMPERATURE'];
    $humidity=$row['HUMIDITY'];
    $moisture=$row['MOISTURE'];
    $ecsensor=$row['ECSENSOR'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="asset/main.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
    <link rel="stylesheet" type="text/css" media="screen" href="asset/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:bold" rel="stylesheet"> 
    <title>Smart Greenhouse Application</title>
</head>
<body>
    <nav class="navbar navbar-inverse mynavbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#">Smart GHA</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a data-toggle="tab" href="#main" onclick="collapseNav()">Home</a></li>
                    <li><a data-toggle="tab" href="#sensors" onclick="collapseNav()">Sensors Data</a></li>
                    <li><a data-toggle="tab" href="#utilities" onclick="collapseNav()">Utilities</a></li>
                    <li><a data-toggle="tab" href="#members" onclick="collapseNav()">Members</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
                    <li><a id="logout-button" href="#"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="tab-content">

        <!-- Main Tab -->
            <div id="main" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <h3>Overview Sensors</h3>
                        <div class="main-sensor">
                            <div class="summary-card">
                                Temperature: <span><?=$temperature?> &deg;C</span>
                            </div>
                            <div class="summary-card">
                                Humidity: <span><?=$humidity?> %</span>
                            </div>
                            <div class="summary-card">
                                Moisture: <span><?=$moisture?></span>
                            </div>
                            <div class="summary-card">
                                EC Sensor: <span><?=$ecsensor?> ppm</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xs-12">
                        <h3>Overview Utilities</h3>
                        <div class="main-utility">
                            <div class="summary-card">
                                Sprinkler: <span id="summary-sprinkler"><?=$sprinkler?></span>
                            </div>
                            <div class="summary-card">
                                Water Pump: <span id="summary-water-pump"><?=$waterPump?></span>
                            </div>
                            <div class="summary-card">
                                Fertiliser: <span id="summary-fertiliser"><?=$fertiliser?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- Sensors Tab -->
            <div id="sensors" class="tab-pane fade">
                <label>
                    <h3>Sensors</h3>
                </label>
                <div class="content-sensor">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-xs-6">
                            <a href="#" data-toggle="modal" data-target="#temperature-data">
                                <div class="card clickable">
                                    <div class="card-body"><img src="asset/temperature.jpeg" style="width:100%;"/></div>
                                    <div class="card-footer">Temperature</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <a href="#" data-toggle="modal" data-target="#humidity-data">
                                <div class="card clickable">
                                    <div class="card-body"><img src="asset/humidity.jpeg" style="width:100%;"/></div>
                                    <div class="card-footer">Humidity</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <a href="#" data-toggle="modal" data-target="#moisture-data">
                                <div class="card clickable">
                                    <div class="card-body"><img src="asset/moisture.jpg" style="width:100%;"/></div>
                                    <div class="card-footer">Moisture</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <a href="#" data-toggle="modal" data-target="#ecsensor-data">
                                <div class="card clickable">
                                    <div class="card-body"><img src="asset/ec-sensor.jpeg" style="width:100%;"/></div>
                                    <div class="card-footer">EC Sensor</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

<!-- Utilities Tab -->
            <div id="utilities" class="tab-pane fade">
                <label>
                    <h3>Utilities</h3>
                </label>
                <div class="content-utility">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-xs-6">
                            <div class="card">
                                <div class="card-header">Sprinkler</div>
                                <div class="card-body">
                                    Status: <span id="text-sprinkler" class="util-<?=strtolower($sprinkler)?>"><?=$sprinkler?></span><br>
                                    Last switched on: 15 April 2019, 13:40:23 
                                </div>
                                <div class="card-footer">
                                    <span id="sprinkler" name="sprinkler" class="util-<?=strtolower($sprinkler)?> clickable" onclick="toggleUtil(this)"><?=$sprinkler?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-6">
                            <div class="card">
                                <div class="card-header">Water Pump</div>
                                <div class="card-body">
                                    Status: <span id="text-water-pump" class="util-<?=strtolower($waterPump)?>"><?=$waterPump?></span><br>
                                    Last switched on: 15 April 2019, 13:40:23 
                                </div>
                                <div class="card-footer">
                                    <span id="water-pump" name="waterpump" class="util-<?=strtolower($waterPump)?> clickable" onclick="toggleUtil(this)"><?=$waterPump?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-6">
                            <div class="card">
                                <div class="card-header">Fertiliser</div>

                                <div class="card-body">
                                    Status: <span id="text-fertiliser" class="util-<?=strtolower($fertiliser)?>"><?=$fertiliser?></span><br>
                                    Last switched on: 15 April 2019, 13:40:23 
                                </div>

                                <div class="card-footer">
                                    <span id="fertiliser" name="fertiliser" class="util-<?=strtolower($fertiliser)?> clickable" onclick="toggleUtil(this)"><?=$fertiliser?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php
    $sql="select `username`, `email`, `member_type` from `user` order by `member_type` asc, `username` asc;";
    $result=$conn->query($sql);
?>
<!-- Members Tab -->
            <div id="members" class="tab-pane fade in">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <h3>Members</h3>
                        <table class="member-list">
                            <thead>
                                <th>Username</th>
                                <th>Email Address</th>
                                <th>Member Type</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
<?php while($row=$result->fetch_assoc()): ?>
                                <tr id="<?=$row['username']?>">
                                    <td><?=$row['username']?></td>
                                    <td><a href="#" onclick="mailto:<?=$row['email']?>;"><?=$row['email']?></a></td>
                                    <td><?=$row['member_type']?></td>
                                    <td>
                                        <span id="change-button" title="Change Membership" onclick="changeUser('<?=$row['username']?>')" class="glyphicon glyphicon-user"></span>
                                        <span id="delete-button" title="Delete User" onclick="deleteUser('<?=$row['username']?>','<?=$_COOKIE['username']?>')" class="glyphicon glyphicon-remove"></span>
                                    </td>
                                </tr>
<?php endwhile;?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6 col-xs-12">
                        <h3>Add New Member</h3>
                        <form id="new-form" action="addUser.php" method="POST" onsubmit="checkAll()">
                            <div class="form-card">
                                <table class="new-member">
                                    <tr>
                                        <td>Username:</td>
                                        <td><input id="new-user" type="text" name="username" placeholder="Login ID" required></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><input id="pass-check" type="password" name="pass" placeholder="Password" required></td>
                                    </tr>
                                    <tr>
                                        <td>Confirm Password:</td>
                                        <td><input id="new-pass" type="password" placeholder="Retype Password" required></td>
                                    </tr>
                                    <tr>
                                        <td>Email Address:</td>
                                        <td><input type="email" placeholder="Email Address" name="email" required></td>
                                    </tr>
                                    <tr>
                                        <td>Member Type:</td>
                                        <td>
                                            <select name="member_type">
                                                <option selected>Member</option>
                                                <option>Admin</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2 ><button type="submit" name="submit" value="submit">Submit</button></td>
                                    </tr>
                                        
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
    include('dbconn.php');
    $query = 'SELECT `temperature`,`humidity`,`moisture`,`ecsensor`,`time` AS `datetime` FROM `data` ORDER BY `time` DESC limit 100';

    $result = mysqli_query($conn, $query);
    $tempTable = array();
    $humidTable = array();
    $moistTable = array();
    $ecTable = array();


    while($row = mysqli_fetch_array($result))
    {
        $time=$row["datetime"];
        $temp=$row["temperature"];
        $humid=$row["humidity"];
        $moist=$row["moisture"];
        $ec=$row["ecsensor"];
        $tempTable[] =  array("x" => "new Date('$time'), y:$temp");
        $humidTable[] =  array("x" => "new Date('$time'), y:$humid");
        $moistTable[] =  array("x" => "new Date('$time'), y:$moist");
        $ecTable[] =  array("x" => "new Date('$time'), y:$ec");
    }

?>
<!-- Temperature Chart Modal -->
    <div id="temperature-data" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Temperature</h4>
                </div>
                <div class="modal-body">
                    <?php 
                        $jsonTable = json_encode($tempTable);
                        $jsonTable=str_replace('"','',$jsonTable);
                        $yAxis="Temperature in °C";
                        $title="Temperature";
                        $id="temp-chart";
                        $chart="temp";
                        include 'charts/line-chart.php'; 
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- Humidity Chart Modal -->
    <div id="humidity-data" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Humidity</h4>
                </div>
                <div class="modal-body">
                    <?php 
                        $jsonTable = json_encode($humidTable);
                        $jsonTable=str_replace('"','',$jsonTable);
                        $yAxis="Humidity in %";
                        $title="Humidity";
                        $id="humid-chart";
                        $chart="humid";
                        include 'charts/line-chart.php'; 
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- Moisture Chart Modal -->
    <div id="moisture-data" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Moisture</h4>
                </div>
                <div class="modal-body">
                    <?php 
                        $jsonTable = json_encode($moistTable);
                        $jsonTable=str_replace('"','',$jsonTable);
                        $yAxis="Moisture";
                        $title="Moisture";
                        $id="moist-chart";
                        $chart="moist";
                        include 'charts/line-chart.php'; 
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- EC Sensor Chart Modal -->
    <div id="ecsensor-data" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">EC Sensor</h4>
                </div>
                <div class="modal-body">
                    <?php 
                        $jsonTable = json_encode($ecTable);
                        $jsonTable=str_replace('"','',$jsonTable);
                        $yAxis="EC Sensor in ppm";
                        $title="EC Sensor";
                        $id="ec-chart";
                        $chart="ec";
                        include 'charts/line-chart.php'; 
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="asset/main.js"></script>

</body>
</html>