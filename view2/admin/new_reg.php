<!DOCTYPE html>
<html>
<head>
	<title>List of New User</title>
	
</head>
<body>

	<table border="1" align="center">
		<tr>
			<td>ID</td>
			<td>User Name</td>
			<td>Pasword</td>
			<td>City</td>
			<td>Posstion</td>
			<td>Mail</td>
			<td>Phone</td>
			<td>Photoes</td>
			<td>Headline</td>
			<td>Summery</td>
			<td>Status</td>
			<td>Delete</td>
			<td>Edit</td>
		</tr>
		<?php
		$i=1;
		
			foreach($hom as $hm)
		{
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $hm->uname; ?></td>
			<td><?php echo $hm->upass; ?></td>
			<td><?php echo $hm->ucity; ?></td>
			<td><?php echo $hm->uposstion; ?></td>
			<td><?php echo $hm->uemail; ?></td>
			<td><?php echo $hm->umobile; ?></td>
			<td><img src="<?php echo base_url().$hm->uphotoes ;?>" height=100px; width=auto;  class="img" alt="" /></td>
			<td><?php echo $hm->uheadline; ?></td>
			<td><?php echo $hm->usummery; ?></td>
			<td><?php echo anchor("admin/sts/".$hm->uid,$hm->status); ?></td>
			<td><?php echo anchor("admin/del/".$hm->uid,"Delete"); ?></td>
			<td><?php echo anchor("admin/myaccount/".$hm->uid,"Edit"); ?></td>
			
		</tr>
		<?php
		$i++;
			}
		?>
	</table>
</body>
</html>