 <?php
				
				if(isset($_POST["find"])){
					$capcity=$_POST["capacity"];
					$type=$_POST["type"];
					$condition=$_POST["AC"];
					$date_s=$_POST["date_s"];
	  				$time_s=$_POST["time_s"];
					$r_id=$_POST["class"];
					$duration=$_POST["duration"];
					$s_code=$_POST["s_code"];
					
					$sub=mysqli_query($con, "INSERT INTO `schedule`(`date`, `time`, `r_id`, `u_id`, `s_code`) VALUES ('".$date_s."','".$time_s."','".$r_id."','lec100','".$s_code."')")or die(mysqli_error($con));
					
					if($sub)
					{
						?>
                        	<div class="alert alert-success">Your request is Complete</div>
                            <br>
                            <a href="scheduleDay.php"><input type="button" class="btn btn-block btn-primary" value="Return"></a>
                        <?php
					}
					
				}
				
				
				
			?>
            <div class="clearfix"></div>
            <form action="shec.php" method="post">
            
            
            
            
          
          
          <?php
				
				if(isset($_POST["select"])){
					$capcity=$_POST["capacity"];
					$type=$_POST["type"];
					$condition=$_POST["AC"];
					$date_s=$_POST["date_s"];
	  				$time_s=$_POST["time_s"];
					$r_id=$_POST["class"];
					
					?>
                    
                    <hr>
                    <div class="form-group">
                    <label for="capacity">Capacity (Number of students):</label>
                    <input type="text" class="form-control" name="capacity" id="capacity" placeholder="Number of Students" value="<?php echo $capcity; ?>" disabled>
                    <input type="hidden" class="form-control" name="capacity" id="capacity" placeholder="Number of Students" value="<?php echo $capcity; ?>" >
                </div>

                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" name="" disabled value="<?php echo $type; ?> " />
                    <input type="hidden" class="form-control" name="type" value="<?php echo $type; ?> " />
                </div>

                <div class="form-group">
                    <label for="type">Condition:</label>
                    <input type="text" class="form-control" name="" disabled value="<?php echo $condition; ?>"/>
                    <input type="hidden" class="form-control" name="AC" value="<?php echo $condition; ?>"/>
                </div>




                <div class="form-group">
                    <label for="Date">Date:</label>
                    <input type="text" class="form-control" name="" disabled value="<?php echo $date_s; ?>"/>
                    <input type="hidden" class="form-control" name="date_s" value="<?php echo $date_s; ?>"/>
                </div>


                <div class="form-group">
                    <label for="Time">Time:</label>
                    <input type="text" class="form-control" name="" disabled value="<?php echo $time_s; ?>"/>
                    <input type="hidden" class="form-control" name="time_s" value="<?php echo $time_s; ?>"/>
                </div>

                <div class="form-group">
                    <label for="type">Location (Classroom):</label>
                    <input type="text"  class="form-control" name="" disabled value="<?php echo $r_id; ?>" />
                    <input type="hidden"  class="form-control" name="r_id" value="<?php echo $r_id; ?>" />
                </div>
                    
                    
                    
                <div class="form-group">
                    <label for="type">Lecture_Hours:</label>
                    <select class="form-control" id="duration" name="duration">
                        <option value="1 hours" selected>1 hours</option>
                        <option value="2 hours">2 hours</option>
                        <option value="3 hours">3 hours</option>
                        <option value="4 hours">4 hours</option>
                        <option value="5 hours">5 hours</option>
                        <option value="6 hours">6 hours</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="capacity">Subject_Code:</label>
                    <input type="text" class="form-control" name="s_code" id="s_code" placeholder="Subject_Code" required>
                </div>
                    <input type="hidden" class="form-control" name="class" value="<?php echo $r_id; ?>"/>
                   
                    <button type="submit" name="find" class="btn btn-success" >Submit</button>
                <a href="slot_request.php"><button type="button" class="btn btn-danger">Change</button></a>
            </form>
                    
                    <hr>
                    <?php
					
				}
				
				
				
			?>