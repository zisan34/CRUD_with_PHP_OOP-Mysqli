<?php 
include 'inc/header.php' ;
include 'config/config.php';
include 'Database/Database.php'; 

?>
<?php 

$db = new Database();

if(isset($_POST['submit']) ){
	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	$email = mysqli_real_escape_string($db->link,$_POST['email']);
	$skill = mysqli_real_escape_string($db->link,$_POST['skill']);

	if($name == '' || $email == '' || $skill == '' ){
		$error = "Field must not be empty "; 
	}else{
		$query = "INSERT INTO tbl_user (name,email,skill) VALUES('$name','$email','$skill') ";
		$insert = $db->insert($query);
	}

}

?>


<?php 
if(isset($error) ){
  echo "<div class='alert alert-danger'>".$error."</div>";
}
?>



<div class="panel panel-default">
	<div class="panel-heading">
		<h3> Add User <a class="pull-right btn btn-primary" href="index.php"> Back </a></h3>
	</div>

 <div class="panel-body">
	<form action="" method="post">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" >
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" id="email" name="email" >
			</div>

			<div class="form-group">
				<label for="phone">Skill</label>
				<input type="text" class="form-control" id="skill" name="skill" >
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-success"  name="submit" value="Submit" >
				<input type="reset" class="btn btn-primary"   value="Reset" >
			</div>


	  </form>
   </div>
 </div>
 
<?php include 'inc/footer.php' ?> 