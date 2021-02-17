<?php 
    session_start(); 
    if(!isset($_SESSION['username'])){
        ?> <script type="text/javascript">
                alert('You have been LOGGED OUT please LOGIN again.');
            </script>
        <?php 
            echo "<script>location.href='login.php';</script>";
    }
?>
<?php

require_once('phpConn.php');

$help = $_POST['help'];
$description = $_POST['Description']; 
$add_type = $_POST['Location_rad']; 
$username = $_SESSION['username']; //echo $username;
$userType = $_SESSION['userType']; //echo $userType;

$regnoQuery = pg_query($conn,"select max(regno) from service") or die("Couldn't Execute");
$regnoFetch = pg_fetch_assoc($regnoQuery);
$regno = $regnoFetch['max']+1; //echo $regno+1;

 
if($add_type == "new"){

    $add = $_POST['Location'];
    //echo $add;
}
else    
 {
     $addQuery = "select address from walkin where username = '$username'";
     $addQueryResult = pg_query($conn,$addQuery) or die("Couldn't Execute");
     
     $addFetch = pg_fetch_assoc($addQueryResult);
     $add = $addFetch['address'];
        //echo $add;
    
 }   

$date = $_POST['Date'];
$time = $_POST['Time'];  //echo $time;

$todayDate = date("Y-m-d");
//echo $todayDate;

$currentTime = 2+date("H:i");
//echo $currentTime;



if($date < $todayDate)
{
    ?> <script type="text/javascript">
            alert('Invalid Booking date!!!');
        </script>
    <?php die();

}
else if($date == $todayDate)
{
    if($time < $currentTime){
        ?> <script type="text/javascript">
        alert('Select time at least 2 hours from current time.');
        </script>
        <?php die();
    }
}

$insert = pg_query($conn,"INSERT INTO service(regno,username,usertype,helpfor,description,address,date,time,status,billamount) VALUES($regno,'$username','$userType','$help','$description','$add','$date','$time','pending',0000)") or die("Couldn't Execute");

    ?><script type="text/javascript">
        alert("Service Requested Successfully!!!");
    </script><?php
    echo "<script>location.href='userHome.php';</script>";
?>