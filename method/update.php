<?php
require_once("../db/dbconnection.php");
$prname=$_POST['namePR'];
$prcount=$_POST['count'];
$id=$_POST['id'];
$query = "UPDATE products SET prname = '$prname', prcount = '$prcount' where id='$id'";
$result = pg_query($conn,$query);
pg_close($conn);
header("location: ../admin/admin.php");
?>