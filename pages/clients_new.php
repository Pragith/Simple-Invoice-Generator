<?php
	
if (isset($_POST['saveBtn'])):
	$file = "../data/clients/".$_POST["coslug"].".json";
        $fh = fopen($file, 'w');
	$content = '
{
	"slug" : "'.$_POST["coslug"].'",
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
<h2>Add client: </h2>
    <form class="form" method="POST">
      <table>
         <tr>
                  <td>Nickname: </td>
                  <td><input type="text" name="coslug" maxlength="4"></td>
         </tr>
    	<tr>
  		<td>Name: </td>
  		<td><input type="text" name="coname" ></td>
  	</tr>
  	<tr>
  		<td>Address Line 1:  </td>
  		<td><input type="text" name="coaddr1"></td>
  	</tr>
  	<tr>
  		<td>Address Line 2: </td>
  		<td><input type="text" name="coaddr2" ></td>
  	</tr>
  	<tr>
  		<td>Phone: </td>
  		<td><input type="text" name="cophone" maxlength="10" ></td>
  	</tr>
   	<tr>
  		<td>City: </td>
  		<td><input type="text" name="cocity"></td>
  	</tr>
    	<tr>
  		<td>State: </td>
  		<td><input type="text" name="costate"></td>
  	</tr>
    	<tr>
  		<td>Country: </td>
  		<td><input type="text" name="cocountry"></td>
  	</tr>
  	<tr>
  		<td></td>
  		<td><input class="btn btn-primary" name="saveBtn" type="submit" value="Save"></td>
  	</tr>
       </table>
   </form>
<?php require_once('../footer.php'); ?>