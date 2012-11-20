<?php

$i = 0;

//Delete a client

if  (isset($_POST['deleteBtn'])) {
  unlink('../data/clients/'.$_POST['deleteBtn']);
  ?><script>window.location.reload()</script><?php
}



?>
<?php require_once('../header.php'); ?>
<a href="<?= $url ?>client/new" class="btn btn-primary"><i class="icon icon-white icon-plus"></i>&nbsp;&nbsp;Add Client</a>
<br><br>
<form method="POST">
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Sr. No.</th>
			<th>Name</th>
			<th>Operation</th>
		</tr>
<?php	
		if ($handle = opendir('../data/clients')) {    
		    while (false !== ($entry = readdir($handle))) {
		       	if ($entry != "." and $entry !="..") {
				$client_json = file_get_contents('../data/clients/'.$entry);
				$clientData = json_decode($client_json);   
?>
		<tr>
			<td><?= ++$i ?></td>
			<td><?= $clientData->name ?></td>
			<td>
			  <a class="btn btn-success" href="<?= $url ?>client/edit/<?= $clientData->slug ?>"><i class="icon icon-white icon-edit"></i></a>
			  <button class="btn btn-danger" name="deleteBtn" value="<?= $entry  ?>"><i class="icon icon-white icon-trash"></i></button>
			</td>
		</tr>
<?php
			}
		    }

		    closedir($handle);
		}
?>

	</table>	
</form>
<?php require_once('../footer.php'); ?>