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

$plan = $_POST['plan'];
$help = $_POST['help']; echo $help;
$noOfMachines = $_POST['Machines'];
$add_type = $_POST['Location_rad']; 
$username = $_SESSION['username']; //echo $username;
$userType = $_SESSION['userType']; //echo $userType;

$regnoQuery = pg_query($conn,"select max(regno) from amcservice") or die("Couldn't Execute");
$regnoFetch = pg_fetch_assoc($regnoQuery);
$regno = $regnoFetch['max']+1; //echo $regno+1;

 
if($add_type == "new"){

    $add = $_POST['Location'];
    //echo $add;
}
else    
 {
     $addQuery = "select address from corporate where username = '$username'";
     $addQueryResult = pg_query($conn,$addQuery) or die("Couldn't Execute");
     
     $addFetch = pg_fetch_assoc($addQueryResult);
     $add = $addFetch['address'];
        //echo $add;
    
 }   

$date = $_POST['Date'];


$todayDate = date("Y-m-d");
//echo $todayDate;


if($date < $todayDate)
{
    ?> <script type="text/javascript">
            alert('Invalid Booking date!!!');
        </script>
    <?php die();

}

$insert = pg_query($conn,"INSERT INTO amcservice(regno,username,plan,noofmachines,typeofmachine,address,startdate,status,billamount) VALUES($regno,'$username','$plan',$noOfMachines,'$help','$add','$date','pending',0000)") or die("Couldn't Execute");

    ?><script type="text/javascript">
        alert("Service Requested Successfully!!!");
    </script><?php
    echo "<script>location.href='corporateHome.php';</script>";
?>