
<?php 
include 'inc/header.php' ;
include 'config/config.php';
include 'Database/Database.php'; 
?>

<?php 
 $db = new Database();

 $query  = "SELECT * FROM tbl_user";
 $read   =  $db->select($query); 

 ?>

<?php

if(isset($_GET['msg']) ){
  echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
}

 ?>

<?php 

if(isset($_GET['id']) ){
    $id = $_GET['id'];
    $query = "DELETE FROM tbl_user WHERE id = '$id' ";
    $delete = $db->delete($query);
}

 ?>


 <div class="panel panel-default">
      <div class="panel-heading">
      	 <h3>User List <a class="pull-right btn btn-primary" href="adduser.php">Add User</a></h3>
      </div>	

      
 <div class="panel-body"> 

    <table class="table table-striped text-center">

         	<tr>
         		<th class="text-center">Serial No</th>
         		<th class="text-center">Name</th>
         		<th class="text-center">Email</th>
         		<th class="text-center">Skill</th>
         		<th class="text-center">Action</th>
         	</tr>

<?php 

if($read){
   $i = 0;
   while ($result = $read->fetch_assoc() ) {
   $i++;

 ?>

         	<tr>
         		<td><?php echo $i; ?></td>
         		<td><?php echo $result['name']; ?></td> 
         		<td><?php echo $result['email']; ?></td>
         		<td><?php echo $result['skill']; ?></td>
         		<td>
         			<a class="btn btn-info" href="edituser.php?id=<?php echo urlencode($result['id']); ?>"> Edit </a>
         			<a class="btn btn-danger" href="?id=<?php echo $result['id']; ?>" onclick="return confirm('Are You Sure to Delete !') " > Delete </a>
         		</td>
         	</tr>

<?php } ?>
<?php } else { ?>
<tr><td colspan="5"><h3>No User Data Found !</h3></td></tr>
<?php } ?>

     </table>
  </div>     
</div>

 <?php include 'inc/footer.php';
