<?php
session_start();
include "models/lecturerController.php";
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
                        Lecturers <small>Statistics Overview</small>
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
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Edit Lecturer</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if(isset($_GET["update"])){
                            $id = $_GET["id"];
                            $where = array("u_id"=>$id);
                            $row = $obj->select_record("user",$where);

                            ?>
                            <form method="post" action="models/lecturerController.php">
                                <table class="table table-hover">

                                    <input type="hidden"  name="id" value="<?php echo $row["u_id"];?>">
                                    <tr>
                                        <td> Username</td>
                                        <td><input type="text" class="form-control" name="uname" value="<?php echo $row["username"];?>"> </td>
                                    </tr>

                                    <tr>
                                        <td> Full Name</td>
                                        <td><input type="text" class="form-control" name="fname" value="<?php echo $row["fullName"];?>"> </td>
                                    </tr>

                                    <tr>
                                        <td> Email</td>
                                        <td><input type="email" class="form-control" name="email" value="<?php echo $row["email"];?>"> </td>
                                    </tr>

                                    <tr>
                                        <td> Contact Number</td>
                                        <td><input type="number" class="form-control" name="contact" value="<?php echo $row["contact"];?>"> </td>
                                    </tr>

                                    <tr>
                                        <td> Password</td>
                                        <td><input type="password" class="form-control" name="psswrd" placeholder="Enter New Password"> </td>
                                    </tr>

                                    <tr>
                                        <td> Subjects</td>
                                        <td><textarea class="form-control" name="subject" rows="4" cols="50" > <?php echo $row["subjects"];?></textarea> </td>
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
                            <form method="post" action="models/lecturerController.php">
                                <table class="table table-hover">
                                    <tr>
                                        <td> Username</td>
                                        <td><input type="text" class="form-control" name="uname" placeholder="Enter Username"> </td>
                                    </tr>

                                    <tr>
                                        <td> Full Name</td>
                                        <td><input type="text" class="form-control" name="fname" placeholder="Enter Full Name"> </td>
                                    </tr>

                                    <tr>
                                        <td> Email</td>
                                        <td><input type="email" class="form-control" name="email" placeholder="Enter Email"> </td>
                                    </tr>

                                    <tr>
                                        <td> Contact Number</td>
                                        <td><input type="text" class="form-control" name="contact" placeholder="Enter Contact Number"> </td>
                                    </tr>

                                    <tr>
                                        <td> Password</td>
                                        <td><input type="text" class="form-control" name="psswrd" placeholder="Enter Password"> </td>
                                    </tr>

                                    <tr>
                                        <td> Confirm Password</td>
                                        <td><input type="password" class="form-control" name="cpsswrd" placeholder="Confirm Password"> </td>
                                    </tr>

                                    <tr>
                                        <td> Subjects</td>
                                        <td><textarea class="form-control" name="subject" rows="4" cols="50"> </textarea> </td>
                                    </tr>

                                    <tr>
                                        <td  align="center"><input type="reset" class="btn btn-danger btn-block" name="reset" value="Clear"></td>
                                        <td  align="center"><input type="submit" class="btn btn-primary btn-block" name="addLec" value="Add Lecturer"></td>
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
                            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> View Lecturers</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">

                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php
                                $myrow = $obj->view_record("user");
                                foreach ($myrow as $row) {
                                    ?>
                                    <tr>
                                        <th><?php echo $row["u_id"]; ?></th>
                                        <th><?php echo $row["username"]; ?></th>
                                        <th><?php echo $row["fullName"]; ?></th>
                                        <th><?php echo $row["email"]; ?></th>
                                        <th><?php echo $row["contact"]; ?></th>
                                        <th><a href="lecturer.php?update=1&id=<?php echo $row["u_id"]; ?>" class="btn btn-info">Edit</a></th>
                                        <th><a href="models/lecturerController.php?delete=1&id=<?php echo $row["u_id"]; ?>" class="btn btn-danger">Delete</a></th>
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