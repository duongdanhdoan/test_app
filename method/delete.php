<?php
require_once("../db/dbconnection.php");
$id=$_POST['id'];
$query = "DELETE FROM products where id ='$id' ";
$result = pg_query($conn,$query);
pg_close($conn);
header("location: ../admin/admin.php");
?>