<?php
include "db.php";

class ViewSchedule extends Database
{
    public $r_id;
    public $time;
    public $date;

    public function view_schedule($id, $time, $date)
    {
        $sql = "SELECT * FROM schedule WHERE r_id='$id' && time='$time' && date='$date' ";
        $result = mysqli_query($this->con, $sql) or die("View erorr!!");

        if ($num = mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                //echo $row["u_id"];
                echo $row["s_code"]; ?>

                <?php
            }
        } else { ?>
            <a href="booking.php?id=<?php echo $id; ?> &time=<?php echo $time; ?> &date=<?php echo $date; ?>"
            <button type="button" class="btn btn-default">Book</button> </a>
        <?php }

    }

    public function view_group($id, $time, $date)
    {
        $sql = "SELECT * FROM schedule WHERE std_group='$id' && time='$time' && date='$date' ";
        $result = mysqli_query($this->con, $sql) or die("View erorr!!13");

        if ($num = mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                //echo $row["u_id"];
                echo $row["s_code"]; ?>

                <?php
            }
        } else { ?>
            <a href="booking2.php?id=<?php echo $id; ?> &time=<?php echo $time; ?> &date=<?php echo $date; ?>"
            <button type="button" class="btn btn-default">Book</button> </a>
        <?php }

    }

    public function analyse_schedule($id, $time, $date)
    {
        $sql = "SELECT * FROM schedule WHERE r_id='$id' && time='$time' && date='$date' ";
        $result = mysqli_query($this->con, $sql) or die("View erorr!!12");

        if ($num = mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                //echo $row["u_id"];
                $grp =  $row["std_group"];
            }

            $sql = "SELECT * FROM std_group WHERE std_group='$grp' ";
            $result = mysqli_query($this->con, $sql) or die("View erorr!!12");

            if ($num = mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Registered Students <br> <h3>".$row["nu_std"]."</h3>";

                }
            }

        }


        else {
            echo "Not Reserved";
        }

    }

    public function real_occupency($id, $time, $date)
    {
        $sql = "SELECT SUM(occupency) FROM sch WHERE r_id='$id' && time='$time' && date='$date' ";
        $result = mysqli_query($this->con, $sql) or die("View erorr!!23");

        if ($num = mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                //echo "Realtime Occupency <br> <h3>".$row["occupency"]."</h3>";
                //echo array_sum($row["occupency"])."</h3>";
                //echo $row["occupency"];
                $sum = $row['SUM(occupency)']."<br>";
                //echo $num;

            }

        } else {
            //echo "NULL";
        }


        $sql = "SELECT * FROM sch WHERE r_id='$id' && time='$time' && date='$date' ";
        $result = mysqli_query($this->con, $sql) or die("View erorr!!");
        $num =  mysqli_num_rows($result);
        if($sum>0 and $num>0){
            $display = $sum/$num;
            echo "Realtime Occupency <br> <h3>".$display ."</h3>";
        }
        else{ echo "NULL"; }




    }







}

?>