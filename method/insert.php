<?php
require_once("../db/dbconnection.php");
$prname=$_POST['namePR'];
$prcount=$_POST['count'];
$query = "INSERT INTO products(prname, prcount) VALUES ('$prname', '$prcount');";
$result = pg_query($conn,$query);
pg_close($conn);
header("location: ../admin/admin.php");
?>