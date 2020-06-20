  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https:/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
	<div class="col-md-6">
		          <?php echo validation_errors(); ?>

		<form action="<?php echo base_url()?>addtransdata" method="post">
		<div class="form-class">
			<label>CustomerType:</label>
			<select name="customer_type" class="form-control" required>
				<option value="credit">Credit</option>
				<option value="debit">Debit</option>
			</select>
		</div>
<input type="hidden" value="<?php echo $id?>" name="id">
		<div class="form-class">
			<label>Amount:</label>
			<input type="text" name="amount" class="form-control" required>
		</div>
      
       <div class="form-class">
			<label>Date:</label>
			<input type="text" name="date" id="datepicker" class="form-control" autocomplete="off" required>
		</div>

<br>
		<div class="form-class">
			<input type="submit" value="Add" class="btn btn-danger">
		</div>
	</div>
</form>
</div>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:"yy-mm-dd",minDate:new Date()});
  } );
  </script>
