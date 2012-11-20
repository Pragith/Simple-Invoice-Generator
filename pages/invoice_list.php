<?php

$i = 0;

//Delete an invoice

if  (isset($_POST['deleteBtn'])) {
  unlink('../data/invoices/'.$_POST['deleteBtn']);
  ?><script>window.location.reload()</script><?php
}



?>
<?php require_once('../header.php'); ?>
<script src="<?= $url ?>js/webrupee.js" type="text/javascript"></script>
<a href="<?= $url ?>invoice/new" class="btn btn-primary"><i class="icon icon-white icon-plus"></i>&nbsp;&nbsp;Create Invoice</a>
<br><br>
<form method="POST">
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Sr. No.</th>
			<th>Invoice ID</th>
			<th>Company</th>
			<th>Amount</th>
			<th>Operation</th>
		</tr>
<?php	
		if ($handle = opendir('../data/invoices')) {    
		    while (false !== ($entry = readdir($handle))) {
		       	if ($entry != "." and $entry !="..") {
				$invoice_json = file_get_contents('../data/invoices/'.$entry);
				$invoiceData = json_decode($invoice_json);   
?>
		<tr>
			<td><?= ++$i ?></td>
			<td><?= $invoiceData->id ?></td>
			<td><?= $invoiceData->name ?></td>
			<td><?= $invoiceData->invoice_total ?></td>
			<td>
			<a target="_blank" class="btn btn-inverse" href="<?= $url ?>invoice/<?= $invoiceData->id ?>"><i class="icon icon-white icon-search"></i></a>
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