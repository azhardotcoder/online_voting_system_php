<?php
session_start(); // Un-commented session_start() to start the session

// // Check if session data is set
// if(!isset($_SESSION['userdata']) || !isset($_SESSION['groupdata'])){
//     header('location: ../');
//     exit(); // Added exit() after header redirection
// }

$userdata = $_SESSION['userdata'];
$groupdata = $_SESSION['groupdata'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online voting system - Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        button{
            margin: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: 1px solid black;
            cursor: pointer;
        }
        #back{
            float: left;
        }
        #logout{
            float: right;
        }
        h1{
            text-align: center;
        }
        #profile{
            margin: 20px;
            margin-top: 30px;
            width: 20%;
            float: left;
            border: 1px solid black;
            border-radius: 10px;
            text-align: left;
            background-color: white;
        }
        #profile img{
            margin-top: 10px;
            border-radius: 50%;
        }
        #profile-content{
            padding-left: 10px;
        }
        #groups{
            width: 70%;
            background-color: #fff;
            margin-left: 20px;
            float: right;
            margin-top: 30px;
            border: 1px solid black;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div id="main">
    <button id="back">Back</button>
    <button id="logout">Logout</button>
    <h1>Online Voting System</h1>
</div>
<hr>

<div id="profile">
    <center>
        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D<?php echo $userdata['photo']?>" height="100" width="100"  alt="Image not found">
    </center>
    <br> <br>
    <div id="profile-content">
        <b>Name:</b> <?php echo $userdata['name']?><br> <br>
        <b>Mobile:</b> <?php echo $userdata['mobile']?><br> <br>
        <b>Address:</b> <?php echo $userdata['address']?><br> <br>
        <b>Status:</b> <?php echo $userdata['status']?><br> <br>
    </div>
</div>

<div id="groups">
<div>
        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" height="100" width="100" alt="Image not found">
        <b>Group Name: Example Group 1</b>
        <b>Votes: 10</b>
        <form action="vote_handler.php" method="post">
            <input type="hidden" name="group_id" value="1">
            <input type="submit" value="Vote" class="button-3">
        </form>
    </div>
    <div>
        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" height="100" width="100" alt="Image not found">
        <b>Group Name: Example Group 2</b>
        <b>Votes: 8</b>
        <form action="vote_handler.php" method="post">
            <input type="hidden" name="group_id" value="2">
            <input type="submit" value="Vote" class="button-3">
        </form>
    </div>
            

    <?php 
    if(isset($_SESSION['userdata'])){
        for ($i=0; $i < count($groupdata); $i++) { 
    ?>
            <div>
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D <?php echo $groupdata[$i]['photo'] ?>" height="100" width="100" alt="Image not found">
                <b>Group Name: <?php echo $groupdata[$i]['name']?></b>
                <b>Votes: <?php echo $groupdata[$i]['votes']?></b>
                <form action="">
                    <input type="hidden" name="gvotes" value="">
                    <input type="hidden" name="submit" value="vote" class="button-3">
                </form>
            </div>
    <?php
        }
    }
    ?>
</div>

</body>
</html>
