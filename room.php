<?php
session_start();
include "models/roomController.php";
include "models/connect.php";
if(isset($_SESSION['username'])) {
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

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'template\navigation.php';?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Lecture Rooms <small>Statistics Overview</small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if(isset($_GET["msg"])){ ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php $msg = $_GET['msg'];
                        echo $msg;

                        }
                        ?>
                    </div>



                </div>
            </div>

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Edit Lecture Room</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if(isset($_GET["update"])){
                                $id = $_GET["id"];
                                $where = array("r_id"=>$id);
                                $row = $obj->select_record("room",$where);

                                ?>
                                <form method="post" action="models/roomController.php">
                                    <table class="table table-hover">

                                        <input type="hidden"  name="id" value="<?php echo $row["r_id"];?>">
                                        <tr>
                                            <td> Room Name</td>
                                            <td><input type="text" class="form-control" name="rname" value="<?php echo $row["r_name"];?>"> </td>
                                        </tr>






                                        <tr>
                                            <td> Capacity</td>
                                            <td><input type="number" class="form-control" name="cap" value="<?php echo $row["capacity"];?>"> </td>
                                        </tr>

                                        <tr>
                                            <td> LAB or Classroom</td>
                                            <td>
                                                <select class="form-control" id="ac" name="lab">
                                                    <option value="true" selected>LAB</option>
                                                    <option value="false">Classroom</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> AC or Non AC</td>
                                            <td>
                                                <select class="form-control" id="ac" name="ac">
                                                    <option value="true" selected>AC</option>
                                                    <option value="false">Non AC</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Building</td>
                                            <td>
                                                <select class="form-control" id="building" name="building">
                                                    <?php
                                                    $row2 = $obj->view_record("building");
                                                    foreach ($row2 as $row) {
                                                        ?>
                                                        <option value="<?php echo $row["b_id"]; ?>" selected><?php echo $row["b_name"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Department</td>
                                            <td>
                                                <select class="form-control" id="dpt" name="dpt">
                                                    <?php
                                                    $row2 = $obj->view_record("department");
                                                    foreach ($row2 as $row) {
                                                        ?>
                                                        <option value="<?php echo $row["dept_id"]; ?>" selected><?php echo $row["dept_name"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td> </td>
                                            <td ><input type="submit" class="btn btn-success btn-block" name="edit" value="Update"></td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                            }

                            else{
                            ?>
                            <form method="post" action="models/roomController.php">
                                <table class="table table-hover">
                                    <tr>
                                        <td> Room Name</td>
                                        <td><input type="text" class="form-control" name="rname" placeholder="Enter Room Name"> </td>
                                    </tr>


                                        <tr>
                                            <td> Building</td>
                                            <td>
                                                <select class="form-control" id="building" name="building">
                                                    <?php
                                                    $row2 = $obj->view_record("building");
                                                    foreach ($row2 as $row) {
                                                    ?>
                                                    <option value="<?php echo $row["b_id"]; ?>" selected><?php echo $row["b_name"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>



                                    <tr>
                                        <td> Capacity</td>
                                        <td><input type="number" class="form-control" name="cap" placeholder="Enter Capacity"> </td>
                                    </tr>

                                    <tr>
                                        <td> LAB or Classroom</td>
                                        <td>
                                            <select class="form-control" id="ac" name="lab">
                                                <option value="true" selected>LAB</option>
                                                <option value="false">Classroom</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> AC or Non AC</td>
                                        <td>
                                            <select class="form-control" id="ac" name="ac">
                                                <option value="true" selected>AC</option>
                                                <option value="false">Non AC</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Department</td>
                                        <td>
                                            <select class="form-control" id="dpt" name="dpt">
                                                <?php
                                                $row2 = $obj->view_record("department");
                                                foreach ($row2 as $row) {
                                                ?>
                                                <option value="<?php echo $row["dept_id"]; ?>" selected><?php echo $row["dept_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td  align="center"><input type="reset" class="btn btn-danger btn-block" name="reset" value="Clear"></td>
                                        <td  align="center"><input type="submit" class="btn btn-primary btn-block" name="addroom" value="Add Lecture Room"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>

                            </form>


                        </div>

                    </div>

                </div>
                <div class="col-lg-1">
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> View Lecture Rooms</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">

                                <tr>
                                    <th>#</th>
                                    <th>Room Name</th>
                                    <th>Building</th>
                                    <th>Capacity</th>
                                    <th>LAB</th>
                                    <th>AC</th>
                                    <th>Department</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php
                                $myrow = $obj->view_record("room");
                                foreach ($myrow as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["r_id"]; ?></td>
                                        <td><?php echo $row["r_name"]; ?></td>
                                        <td><?php
                                            $b_id = $row["b_id"];
                                            $sql1 = "SELECT * FROM building WHERE b_id = $b_id";
                                            $result1 = mysqli_query($con, $sql1) or die("View erorr!!");

                                            if ($num1 = mysqli_num_rows($result1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                                    echo $row1["b_name"];
                                                }
                                            }
                                            ?></td>
                                        <td><?php echo $row["capacity"]; ?></td>
                                        <td><?php if ($row["LAB"]=="true") { echo "LAB";}
                                            else if ($row["LAB"]=="false") { echo "Classroom";}

                                            ?></td>
                                        <td><?php $ac =  $row["AC"];
                                            if($ac=="true"){echo "A/C";}
                                            else if($ac=="false"){echo "None A/C";}
                                            ?></td>
                                        <td><?php $dept =  $row["dept_id"];


                                            $sql2 = "SELECT * FROM department WHERE dept_id = $dept";
                                            $result2 = mysqli_query($con, $sql2) or die("View erorr!!");

                                            if ($num1 = mysqli_num_rows($result2) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    echo $row2["dept_name"];
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><a href="room.php?update=1&id=<?php echo $row["r_id"]; ?>" class="btn btn-info">Edit</a></td>
                                        <td><a href="models/roomController.php?delete=1&id=<?php echo $row["r_id"]; ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>

                                    <?php
                                }
                                ?>



                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
    <?php
}

else{
    $_SESSION['msg'] = "Login to continue";
    header('location:login.php');
    echo $_SESSION['msg'];
}
?>