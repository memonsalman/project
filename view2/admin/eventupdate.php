<!DOCTYPE html>
<html>
<head>
	<title>Update Event</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	
<div class="container">
	<div class="row">
		<h2>Events</h2>
	</div>
	<div class="row">
		<div style="float: right;padding-bottom: 50px;padding-top: 50px;">
			<a href="<?php echo base_url('admin/events_form'); ?>"><button type="button" class="btn btn-info">Add New</button></a>
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
				
				<td>	
				<button onclick="location.href='<?php echo base_url("admin/events_form/".$k->eid) ?>'" type="button" class="btn btn-info">Edit</button>
				</td>

				<td>	
				<button onclick="location.href='<?php echo base_url("admin/eventdelet/".$k->eid) ?>'" type="button" class="btn btn-danger">Delete</button>
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