<?php
session_start();
if(isset($_SESSION['email']))
include('includes/connection.php');
?>
<html>
<body>
	<center><h3>Your Leave Applications</h3></center><br>
	<table class="table" style="background-color:whitesmoke; width:75vw;">
		<tr>
			<th>S.no</th>
			<th>Subject</th>
			<th>Message</th>
			<th>Status</th>
		</tr>
		<?php
		$sno=1;
		$query="select * from leaves where uid=$_SESSION[uid]";
		$query_run=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run)){
			?>
			<tr>
				<td><?php echo $sno; ?></td>
				<td><?php echo $row['subject']; ?></td>
				<td><?php echo $row['message']; ?></td>
				<td><?php echo $row['status']; ?></td>
			</tr>
			<?php
			$sno=$sno+1;
		}
		?>
	</table>
</body>
</html>
<?php
}
else{
	header('Location:leave_status.php');
}
?>