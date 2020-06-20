<div class="col-md-12">
	<table class="table table-bordered">
		<thead><tr><th></th><th>Name</th><th>Fathername</th><th>ContactNo</th><th></th></tr></thead>
		<tbody>
			<?php 
			$data = $this->admin_database->customerdata();
			if(!empty($data)){?>
            <?php for ($i=0; $i < count($data); $i++) { 
              echo "<tr><td><img src='".base_url().'uploads/'.$data[$i]["image"]."' height='50px' width='50px'></td><td>".$data[$i]["name"]."</td><td>".$data[$i]["fname"]."</td><td>".$data[$i]["contact"]."</td><td><a href=".base_url()."addtanscation/".base64_encode($data[$i]["id"]).">Add Transcation</a></td></tr>";
            }?>
   			<?php }?>
		</tbody>
	</table>
</div>
<div class="container">
		<div class="col-md-12">
	<?php 
	$data    = $this->session->flashdata("success");
    $dataerr = $this->session->flashdata("error");
    if($dataerr != ""){
      echo "<div class='alert alert-warning'>Please Try again Email and Password doesnot exist</div>";
    }
    else if($data!= "")

    {
    	echo "<div class='alert alert-success'>Data added successfully";
    }
	?>
</div>
          <?php echo validation_errors(); ?>

	<div class="col-md-6">
		<form action="<?php echo base_url()?>customeradddata"  method="post" enctype="multipart/form-data">
		<div class="form-class">
			<label>Name:</label>
			<input type="text" name="name" class="form-control" required>
		</div>

		<div class="form-class">
			<label>FatherName:</label>
			<input type="fname" name="fname" class="form-control" required>
		</div>



      	<div class="form-class">
			<label>ContactNo:</label>
			<input type="text" name="contact" class="form-control" required>
		</div>

	   <div class="form-class">
			<label>MarriedStatus:</label>
			<select name="m_status" class="form-control" required>
				<option value="yes">Yes</option>
				<option value="no">no</option>
			</select>
		</div>

		<div class="form-class">
			<label>Pic:</label>
			<input type="file" name="image" required>
		</div>



<br>
		<div class="form-class">
			<input type="submit" value="Add" class="btn btn-danger">
		</div>
	</div>
</form>
</div>