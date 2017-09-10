<?php
session_start();
include "models/lecturerController.php";
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
                        Make your Reservation <small></small>
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
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Add Reservation</h3>
                        </div>
                        <div class="panel-body">

                            <?php
                            $grp = $_GET['id'];
                            $time = $_GET['time'];
                            $date = $_GET['date'];

                            //echo $u_id."<br>";
                            //echo $time."<br>";
                            //echo $date."<br>";
                            ?>


                            <form method="post" action="models/scheduleAdd2.php">
                                <table class="table table-hover">
                                    <input type="hidden" class="form-control" name="date" id="date" value="<?php echo $date; ?>" readonly>
                                    <input type="hidden" class="form-control" name="time" id="time" value="<?php echo $time; ?>" readonly>
                                    <input type="hidden" class="form-control" name="grp" id="room" value="<?php echo  $grp; ?>" readonly>
                                     <input type="hidden" class="form-control" name="lec_id" value="<?php echo $_SESSION['username']; ?>" readonly>

                                    <tr>
                                        <td> Subject</td>
                                        <td><input type="text" class="form-control" name="Subject_Code" id="Subject_Code" placeholder="Subject_Code"> </td>
                                    </tr>

                                    <tr>
                                        <td> Lecture Room</td>
                                        <td>
                                            <select class="form-control" id="grp" name="room">
                                                <?php
                                                $row2 = $obj->view_record("room");
                                                foreach ($row2 as $row) {
                                                    ?>
                                                    <option value="<?php echo $row["r_id"]; ?>" selected><?php echo $row["r_name"]; ?></option>
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
                                        <td  align="center"><input type="reset" class="btn btn-danger btn-block" name="reset" value="Clear"></td>
                                        <td  align="center"><input type="submit" class="btn btn-primary btn-block" name="S_add" value="Make Reservation"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">

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