<div class="col-md-12">
	<label><b>Show by Month Transcation</b></label>
<select id="month" class="form-control">
	<option value="">select</option>
	<?php 
	for($i=1;$i<12;$i++){?>
    <option value="<?php echo $i?>"><?php echo $i?></option>
	<?php }
	?>
</select>
<input type="button" id="search" value="search" class="btn btn-primary">
		<table class="table table-bordered trans">
		<thead><tr><th>Name</th><th>Type</th><th>Date</th><th>Amount</th></tr></thead>
		<tbody>
			<?php 
			$data = $this->admin_database->customertransdata();
			if(!empty($data)){?>
            <?php for ($i=0; $i < count($data); $i++) { 
            	$id = $data[$i]["cust_id"];
            	$custname = $this->admin_database->customername($id);
              echo "<tr><td>".$data[$i]["type"]."</td><td>".$custname[0]["name"]."</td><td>".$data[$i]["date"]."</td><td>".$data[$i]["amount"]."</td></tr>";
            }?>
   			<?php }?>
		</tbody>
	</table>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#search").click(function(){
			var id = $("#month").find(":selected").val();
			 $.ajax({
			 	url:"<?php echo base_url()?>transmonth",
			 	type:"post",
			 	data:{"id":id},
			 	success:function(data){
                $(".trans tbody").empty();
                $(".trans tbody").append(data);
			 	},error:function(data){

			 	}
			 })
		})
	})
</script>