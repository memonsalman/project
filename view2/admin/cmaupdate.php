<!DOCTYPE html>
<html>
<head>
	<title>Update CMA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	
<div class="container">
	<div class="row">
		<h2>CMA</h2>
	</div>
	<div class="row">
		<div style="float: right;padding-bottom: 50px;padding-top: 50px;">
			<a href="<?php echo base_url('admin/cma'); ?>"><button type="button" class="btn btn-info">Add New</button></a>
		</div>
		<div style="float: left;padding-bottom: 50px;padding-top: 50px;">
			<a href="<?php echo site_url("admin/home"); ?>"><button type="button" class="btn btn-primary">Choose Another Category</button></a>
		</div>
	</div>
	<table class="table" border="1" align="center">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Area</th>
			<th colspan="2" style="text-align: center;">Action</th>
		</thead>
		<tbody>
			
				<?php
				$i=1;
          			foreach($hom as $k)
          			{
        		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $k->name; ?></td>
				<td><?php echo $k->area; ?></td>
				<!-- <td><?php echo anchor("admin/preedt/".$k->pid,"Edit"); ?></td> -->
				<!-- <td><?php echo anchor("admin/predelet/".$k->pid,"<button>Delete"); ?></td> -->
				<td>	
				<button onclick="location.href='<?php echo base_url("admin/cma/".$k->cmaid) ?>'" type="button" class="btn btn-info">Edit</button>
				</td>

				<td>	
				<button onclick="location.href='<?php echo base_url("admin/cmadelet/".$k->cmaid) ?>'" type="button" class="btn btn-danger">Delete</button>
				</td>
			</tr>
			<?php
			$i++;
			 } ?>
		
			
		
		</tbody>
	</table>
</div>
</body>
</html>