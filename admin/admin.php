<?php
require_once("../db/dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>admin page</title>
    <style>
        #contain {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #contain td, #contain th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #contain tr:nth-child(even){background-color: #f2f2f2;}

        #contain tr:hover {background-color: #ddd;}

        #contain th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
    </style>
</head>

<body>
    
    <div class="container" id="contain">
        <a href="../index.php"><button type="button" class="btn btn-secondary">Logout</button></a>
        <br>
        <br>
        <h2>Dabase table</h2>
        <p>Show data</p>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Products Name</th> 
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
            <div id="refresh">
            <?php
                        $select ="SELECT id,prname,prcount from products";
                        $result = pg_query($conn, $select);
                        if ( mysqli_fetch_row($result) >0){
                            while($row = pg_fetch_assoc($result)){
                                echo "<tr><td>".$row["id"]."</td>";
                                
                                echo "<td>".$row["prname"]."</td>";
                                
                                echo "<td>".$row["prcount"]."</td>";
                                
                                "</td></tr>";
                            }
                        }
                        pg_close($conn);
                        echo header("refresh: 15");
                ?> 
            </div>
            </tbody>
        </table>
    </div>
    <div class="container" >
                                <!---insert -->
                <form action="../method/insert.php" method="post" style="width: 40%; float:left;">    
                    <div class="form-group">
                    ADD PRODCUTS: 
                    <br><label for="namePR">PRODUCTS NAME</label>
                    <input type="text" class="form-control" id="namePR" placeholder="Enter Products name" name="namePR">
                    </div>

                    <div class="form-group">
                    <label for="count">COUNT</label>
                    <input type="text" class="form-control" id="count" placeholder="Enter count" name="count">
                    </div>
                    <button type="submit" class="btn btn-default">ADD PRODUCTS</button>
                </form>

                                <!---update -->

                <form action="../method/update.php" method="post" style="width: 40%; float:right"> 
                UPDATE:  
                    <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="id" class="form-control" id="ID" placeholder="Enter id" name="id">
                    </div>
                
                    <div class="form-group">
                    <br><label for="namePR">PRODUCTS NAME</label>
                    <input type="text" class="form-control" id="namePR" placeholder="Enter Products name" name="namePR">
                    </div>

                    <div class="form-group">
                    <label for="count">COUNT</label>
                    <input type="text" class="form-control" id="count" placeholder="Enter count" name="count">

                    <button type="submit" class="btn btn-default">UPDATE</button>
                    <br> 
                </form>

                                <!---delete -->
                     
                <form action="../method/delete.php" method="post" style="width: 40%; "> 
                <br> <br> <br> 
                DELETE:
                    <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="id" class="form-control" id="ID" placeholder="Enter id" name="id">
                    </div> 
                    <button type="submit" class="btn btn-default">DELETE</button>
                    <br> <br> <br> 
                </form>
                        
                                <!---Download csv file -->
                                <form action="../method/export.php" method="post" style="width: 40%; float:left">
                                
                                <button type="submit" name="export" class="btn btn-secondary" >Download CSV File</button></a>
                                </form>         
        </div>
        
</html>
