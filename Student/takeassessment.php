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


<!doctype html>
<html lang="en">
	<head>
		<title>Student - Dashboard</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Welcome To <?php $roll_no=$_SESSION['LoginStudent'];
					$query="select * from student_info where roll_no='$roll_no'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					}
					?> Dashboard </h4> </h4>
				</div>
				<div class="row">
		<div class="col-md-2"></div>

		<div class="col-md-8">
			<?php 
				//below query will print the existing record of Assessment
				$sql="SELECT * FROM examdetails";
				$rs=mysqli_query($con,$sql);
				echo "<h2 class='page-header'>Take Assessment</h2>";
				echo "<table class='table table-striped table-hover' style='width:100%'>
				<tr>
				<th>#</th>
				<th>Asses. Name</th>
				<th>Action</th>					
				</tr>";
				$count=1;
				while($row=mysqli_fetch_array($rs))
				{
			?>
			<tr>
				<td>
					<?PHP echo $count;?>
				</td>
				<td>
					<?PHP echo $row['ExamName'];?>
				</td>
				<td>
					<a href="takeassessment2.php?exid=<?php echo $row['ExamID']; ?>"> <button type="submit" class="btn btn-success" style="border-radius:0%">Start</button></a>
				</td>
			</tr>
			<?php
		$count++;	}
			?>
			</table>
			
		</div>

		<div class="col-md-2"></div>
	</div>
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>