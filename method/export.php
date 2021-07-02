<?php
require("../db/dbconnection.php");
if (isset($_POST["export"]))
{
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen( "php://output", "w");
    fputcsv($output, array('id', 'prname','prcount'));
    $query = "SELECT * from products ORDER BY id DESC";
    $result = pg_query($conn,$query);
    while($row = pg_fetch_assoc($result)){
        fputcsv($output,$row);
    }
    fclose($output);
}
?>