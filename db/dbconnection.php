<?php
    try{
        $conn = pg_connect("
        host=ec2-52-0-67-144.compute-1.amazonaws.com
        dbname=daamklnedkd007
        user=bxgvgpxylebnnx
        port=5432
        password=4781b3e2f3522d77c10c071b2d72953193d7c55523cab7bf099f7ed400e09a8e
        ");
    
    }catch(Exception $e){
        $e->getMessage();
    }
?>