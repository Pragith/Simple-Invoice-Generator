<?php
	
$slug = @$_GET['slug'];

$company_url = "../data/clients/$slug.json";
$company_json = file_get_contents($company_url);
$coData = json_decode($company_json);   
$coSlug = $coData->slug;
$coName = $coData->name;
$coAddr1 = $coData->address1;
$coAddr2 = $coData->address2;
$coCity = $coData->city;
$coState = $coData->state;
$coCountry = $coData->country;
$coPhone = $coData->phone;

if (isset($_POST['saveBtn'])):
	$fh = fopen($company_url, 'w');
	$content = '
{
         "slug" : "'.$coSlug.'",
	"name" : "'.$_POST["coname"].'",
	"address1" : "'.$_POST["coaddr1"].'",
	"address2" : "'.$_POST["coaddr2"].'",
	"city" : "'.$_POST["cocity"].'",
	"state" : "'.$_POST["costate"].'",
	"country" : "'.$_POST["cocountry"].'",
	"phone" : "'.$_POST["cophone"].'"
}
';
	fwrite($fh, $content); 
?><script>window.location.reload()</script><?php
endif;
?>
<?php require_once('../header.php'); ?>
<h2>Edit client: </h2>
    <form class="form" method="POST">
      <table>
           <tr>
                  <td>Nickname: </td>
                  <td><label><b><?= $coSlug ?></b></label></td>
         </tr>
    	<tr>
  		<td>Name: </td>
  		<td><input type="text" name="coname" value="<?= $coName ?>"></td>
  	</tr>
  	<tr>
  		<td>Address Line 1:  </td>
  		<td><input type="text" name="coaddr1" value="<?= $coAddr1 ?>"></td>
  	</tr>
  	<tr>
  		<td>Address Line 2: </td>
  		<td><input type="text" name="coaddr2" value="<?= $coAddr2 ?>"></td>
  	</tr>
  	<tr>
  		<td>Phone: </td>
  		<td><input type="text" name="cophone" value="<?= $coPhone ?>" maxlength="10"></td>
  	</tr>
   	<tr>
  		<td>City: </td>
  		<td><input type="text" name="cocity" value="<?= $coCity ?>"></td>
  	</tr>
    	<tr>
  		<td>State: </td>
  		<td><input type="text" name="costate" value="<?= $coState ?>"></td>
  	</tr>
    	<tr>
  		<td>Country: </td>
  		<td><input type="text" name="cocountry" value="<?= $coCountry ?>"></td>
  	</tr>
  	<tr>
  		<td></td>
  		<td><input class="btn btn-primary" name="saveBtn" type="submit" value="Save"></td>
  	</tr>
       </table>
   </form>
<?php require_once('../footer.php'); ?>