<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/logo (1)_131594377264114942.ico" />
	<title>List of Institute</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	  <style type="text/css">
	  	.container{width: 100%;}
	  	button, input, select{color: #fff; background-color: #5cb85c; border-color: #5cb85c;}
	  </style>
</head>
<body>

 <div class="container" style="padding-top:50px;">
 </div>

 

 <div class="container">
 	 <!-- <div class="table-responsive" style="border: 2px solid #ddd !important;border-radius: 8px;"> -->
		<table id="example" class="display" cellspacing="0" width="100%">
			<thead>
		<tr>
			<td>No</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email</td>
			<td>Mobile</td>
			<td>Pincode</td>
			<td>Business</td>
		</tr>
	</thead>
	<tbody>
		<?php
		$i=1;
			
			foreach($employee_data as $hm)
		{
		?>
		
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $hm->fname; ?></td>
			<td><?php echo $hm->lname; ?></td>
			<td><?php echo $hm->email; ?></td>
			<td><?php echo $hm->phone; ?></td>
			<td><?php echo $hm->pincode; ?></td>
			<td><?php echo $hm->cname; ?></td>
			
			
			
		</tr>
		
		
			<?php
			$i++;
				}
			?>
			</tbody>
		</table>
	
	<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</body>

</div>

</html>