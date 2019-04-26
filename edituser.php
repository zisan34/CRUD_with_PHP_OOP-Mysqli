<?php 
	include 'inc/header.php' ;
	include 'config/config.php';
	include 'Database/Database.php'; 
	$db = new Database();
?>

<?php 
  if(!isset($_GET['id']) || $_GET['id'] == NULL ){
    echo "<script>window.location='index.php';</script>";
  }
  else{
    $id = $_GET['id'];
  }

 $query  = "SELECT * FROM tbl_user WHERE id=$id ";
 $getdata   =  $db->select($query)->fetch_assoc(); 

?>


<?php 

if(isset($_POST['submit']) ){
	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	$email = mysqli_real_escape_string($db->link,$_POST['email']);
	$skill = mysqli_real_escape_string($db->link,$_POST['skill']);

	if($name == "" || $email == "" || $skill == ""){
		$error = "Field must not be empty "; 
	}else{
		$query = "UPDATE  tbl_user SET name='$name',email='$email',skill='$skill' WHERE id=$id ";
		$update = $db->update($query);
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
		<h3> Edit User <a class="pull-right btn btn-primary" href="index.php"> Back </a></h3>
	</div>

 <div class="panel-body">
	<form action="" method="post">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" value="<?php echo $getdata['name']; ?>" >
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $getdata['email']; ?>" >
			</div>

			<div class="form-group">
				<label for="phone">Skill</label>
				<input type="text" class="form-control" id="skill" name="skill" value="<?php echo $getdata['skill']; ?>" >
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-success"  name="submit" value="Submit" >
				<input type="reset" class="btn btn-primary"   value="Reset" >
			</div>


	  </form>
   </div>
 </div>
 
<?php include 'inc/footer.php' ?> 