<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Adaptive Scheduling</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>Test Lecturer</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>Test Lecturer</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <?php

                if(!isset($_SESSION['username']))
                {
                    ?>
                <a href="login.php" ><i class="glyphicon glyphicon-log-in"></i> Login
                <?php
                }
                else{
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    <?php

                }

                    if(isset($_SESSION['username']))
                    {

                    echo $_SESSION['username'];
                        ?>
                        <b class="caret"></b>
                        <?php
                    }
                    ?>
                    </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?php
                        if(isset($_SESSION['username']))
                        {
                            ?>
                            <a href="models/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out

                            </a>
                        <?php

                        }
                        ?>

                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>

                <li>
                    <a href="ownReservation.php"><i class="fa fa-align-justify"></i> Own Reservations</a>
                </li>

                <li>
                    <a href="generate.php"><i class="fa fa-cog"></i> Generate Schedule</a>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#fnd"><i class="fa fa-bars"></i> Find Free Slots <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="fnd" class="collapse">
                        <li>
                            <a href="scheduleDay.php">Search by Day</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#srch"><i class="fa fa-table"></i> View Schedule <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="srch" class="collapse">
                        <li>
                            <a href="roomSchedule.php">Lecture Room Schedule</a>
                        </li>
                        <li>
                            <a href="groupSchedule.php">Student Group Schedule</a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#lec"><i class="fa fa-users"></i> Lecturers <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="lec" class="collapse">
                        <li>
                            <a href="lecturer.php">Add Lecturer</a>
                        </li>
                        <li>
                            <a href="lecturer.php">View Lecturers</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#rom"><i class="fa fa-university"></i> Lecture Rooms <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="rom" class="collapse">
                        <li>
                            <a href="room.php">Add Lecture Room</a>
                        </li>
                        <li>
                            <a href="room.php">View Lecture Rooms</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#dpt"><i class="fa fa-certificate"></i> Departments <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="dpt" class="collapse">
                        <li>
                            <a href="department.php">Add Department</a>
                        </li>
                        <li>
                            <a href="department.php">View Departments</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#grp"><i class="fa fa-graduation-cap"></i> Student Groups <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="grp" class="collapse">
                        <li>
                            <a href="group.php">Add Student Group</a>
                        </li>
                        <li>
                            <a href="group.php">View Student Groups</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#sub"><i class="fa fa-folder-o"></i> Subjects <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="sub" class="collapse">
                        <li>
                            <a href="subject.php">Add Subjects</a>
                        </li>
                        <li>
                            <a href="subject.php">View Subjectss</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#bui"><i class="fa fa-building-o"></i> Buildings <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="bui" class="collapse">
                        <li>
                            <a href="building.php">Add Building</a>
                        </li>
                        <li>
                            <a href="building.php">View Buildings</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="analyseOccupency.php"><i class="fa fa-align-justify"></i> Analyse Occupency </a>
                </li>

                <li>
                    <a href="http://classroomdashboard.000webhostapp.com/index.html" target="_blank"><i class="fa fa-align-justify"></i> IoT Dashboard</a>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>


    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../js/plugins/morris/raphael.min.js"></script>
<script src="../js/plugins/morris/morris.min.js"></script>
<script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
