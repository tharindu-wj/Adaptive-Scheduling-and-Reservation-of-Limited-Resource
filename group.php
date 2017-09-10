<?php
session_start();
include "models/roomController.php";
if(isset($_SESSION['username'])) {
?>
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
                       Student Groups <small>Statistics Overview</small>
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
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Add Student Group</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if(isset($_GET["update"])){
                                $id = $_GET["id"];
                                $where = array("std_group"=>$id);
                                $row = $obj->select_record("std_group",$where);

                                ?>
                                <form method="post" action="models/groupController.php">
                                    <table class="table table-hover">

                                        <input type="hidden"  name="id" value="<?php echo $row["std_group"];?>">

                                        <tr>
                                            <td> Group Name</td>
                                            <td><input type="text" class="form-control" name="g_name" value="<?php echo $row["semester"];?>"> </td>
                                        </tr>

                                        <tr>
                                            <td> Number of Students</td>
                                            <td><input type="number" class="form-control" name="nu" value="<?php echo $row["nu_std"];?>"> </td>
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
                            <form method="post" action="models/groupController.php">
                                <table class="table table-hover">

                                    <tr>
                                        <td> Group Name</td>
                                        <td><input type="text" class="form-control" name="g_name" placeholder="Enter Group Name"> </td>
                                    </tr>

                                    <tr>
                                        <td> Number of Students</td>
                                        <td><input type="number" class="form-control" name="nu" placeholder="Enter Number of Students"> </td>
                                    </tr>



                                    <tr>
                                        <td  align="center"><input type="reset" class="btn btn-danger btn-block" name="reset" value="Clear"></td>
                                        <td  align="center"><input type="submit" class="btn btn-primary btn-block" name="addgrp" value="Add Student Group"></td>
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
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> View Student Groups</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">

                                <tr>
                                    <th>#</th>
                                    <th>Semester</th>
                                    <th>Number of Students</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php
                                $myrow = $obj->view_record("std_group");
                                foreach ($myrow as $row) {
                                    ?>
                                    <tr>
                                        <th><?php echo $row["std_group"]; ?></th>
                                        <th><?php echo $row["semester"]; ?></th>
                                        <th><?php echo $row["nu_std"]; ?></th>

                                        <th><a href="group.php?update=1&id=<?php echo $row["std_group"]; ?>" class="btn btn-info">Edit</a></th>
                                        <th><a href="models/groupController.php?delete=1&id=<?php echo $row["std_group"]; ?>" class="btn btn-danger">Delete</a></th>
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