<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->

<!doctype html>
<html lang="en">
	<head>
		<title>student- Time Table</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class=" mt-3">
							<div class="row">
								<div class="col-md-12">
									<table class="w-100 table-elements table-three-tr" cellpadding="3">
										<tr class="table-tr-head table-three text-white">
											<td colspan="5" class="text-center text-white"><h4>Classes Time Table</h4></td>
											<td width="10" >											
											<div class="row">
									
				
								
													<!-- Large modal -->
													<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
															<div class="modal-content">
																
														
																<div class="modal-body">
																	<form action="time-table.php" method="post">
																		<div class="row mt-3">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Course Code: </label>
																					<select class="browser-default custom-select" name="course_code">
																						<option >Select Course</option>
																						<?php
																						$query="select distinct(course_code) as course_code from time_table";
																						$run=mysqli_query($con,$query);
																						while($row=mysqli_fetch_array($run)) {
																						echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
																						}
																					?>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Semester Or Years:</label>
																					<select class="browser-default custom-select" name="semester">
																						<option >Select Class Semester</option>
																						<?php
																						$query="select distinct(semester) as semester from time_table";
																						$run=mysqli_query($con,$query);
																						while($row=mysqli_fetch_array($run)) {
																						echo	"<option value=".$row['semester'].">".$row['semester']."</option>";
																						}
																					?>
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Timing From: </label>
																					<input type="time" name="timing_from" class="form-control">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Timing To:</label>
																					<input type="time" name="timing_to" class="form-control">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Lecture Day: </label>
																					<select class="browser-default custom-select" name="day">
																						<option >Select Week Day</option>
																						<?php
																						$teacher_id=$_SESSION['teacher_id'];
																						$query="select * from weekdays";
																						$run=mysqli_query($con,$query);
																						while($row=mysqli_fetch_array($run)) {
																						echo	"<option value=".$row['day_id'].">".$row['day_name']."</option>";
																						}
																						?>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Please Select Subject:*</label>
																				<select class="browser-default custom-select" name="subject_code" required="">
																					<option >Select Subject</option>
																					<?php
																						$query="select subject_code from time_table";
																						$run=mysqli_query($con,$query);
																						while($row=mysqli_fetch_array($run)) {
																						echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																						}
																					?>
																				</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Enter Room No:</label>
																					<input type="text" name="room_no" class="form-control" placeholder="Room No">
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<input type="submit" class="btn btn-primary" name="btn_update" value="Update Data">
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																		</div> 	
																	</form>
																</div>
															</div>
													</div>
													</div>
												</div>
											</td>
										</tr>
										<tr class="table-tr-head">
											<th>Batch</th>
											<th>Timming</th>
											<th>Day</th>
											<th>Subject</th>
											<th>Room No</th>
										</tr>
										<?php  
											$query="select id,course_code,TIME_FORMAT(timing_from,'%h:%i %p') as timing_from,TIME_FORMAT(timing_to,'%h:%i %p') as timing_to,semester,day_name,day_id,day,subject_code,room_no from time_table tt inner join weekdays wd on tt.day=wd.day_id";
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
												echo "<tr>";
												echo "<td>".$row["course_code"]." ".$row["semester"]."Sem </td>";
												echo "<td>" .$row["timing_from"]."<br>".$row["timing_to"]."</td>";
												echo "<td>".$row["day_name"]."</td>";
												echo "<td>".$row["subject_code"]."</td>";
												echo "<td>".$row["room_no"]."</td>";
												echo "</tr>";
											}
										?>
									</table>
								</div>
							</div>				
						</section>
					</div>
				</div>
			</div>
		</main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

