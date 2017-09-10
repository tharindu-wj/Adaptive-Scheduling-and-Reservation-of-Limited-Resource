<?php
session_start();
include "models/roomController.php";
include "models/connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adaptive Scheduling</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">









</head>

<body>

<div id="wrapper">



    <br>

    <a href="generate.php" class="btn btn-info">
        <span class="glyphicon glyphicon-home"></span> &nbsp; &nbsp; Return to Main Page
    </a> <br> <br>
                            <table class="table table-bordered table-hover">


                                <?php
                                $file=fopen("timetable.csv","r");
                                while(!feof($file)){
                                    $content = fgetcsv($file);
                                    $count =  count($content);
                                    echo "<tr class='info'>";
                                    for($i=0; $i<$count; $i++)
                                    {
                                        echo "<th>".$content[$i]."</th>";
                                    }

                                    echo "</tr>";
                                }
                                ?>



                            </table>



</div>
<!-- /#wrapper -->

<!-- jQuery -->


<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->

</body>

</html>
