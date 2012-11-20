<?php 

$url = "http://{$_SERVER['SERVER_NAME']}/invoice/"; 

$id = $_GET['id'];

 // Get Invoice Details
$invoice_url = "../data/invoices/$id.json";
$invoice_json = @file_get_contents( $invoice_url);
$inData = json_decode( $invoice_json);   
if (!@$inData->id):
  echo "Invalid Invoice";
else:

$slug = $inData->slug;  
$inDateDue = $inData->date_due;
$inDateInvoice = $inData->date_invoice;


// Get Company Details
$company_url = "../data/company.json";
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

// Get Client Details
$client_url = "../data/clients/$slug.json";
$client_json = file_get_contents( $client_url);
 $clData = json_decode( $client_json);   
 $clSlug =  $clData->slug;
 $clName =  $clData->name;
 $clAddr1 =  $clData->address1;
 $clAddr2 =  $clData->address2;
 $clCity =  $clData->city;
 $clState =  $clData->state;
 $clCountry =  $clData->country;
 $clPhone =  $clData->phone;




?>
<!DOCTYPE html>
<html>
  <head>
    <title><?= $coSlug."-".$id ?></title>
    <link href="<?= $url ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $url ?>css/invoice.css" rel="stylesheet">
    <script src="<?= $url ?>js/webrupee.js" type="text/javascript"></script>
  </head>
  <body>
    
    <div class="container-fluid">

      <div class="invoice">

      <!-- Company Details -->
      <div class="row-fluid">

        <!-- Company Logo -->
        <div class="span8 logo">          
          <img src="<?= $url ?>img/logo.gif">
        </div>

        <!-- Company Address -->
        <div class="span4 companyAddress">
          <p>
            <b><?= $coName  ?></b><br>
            <?= $coAddr1  ?><br>
            <?= $coAddr2  ?><br>
            <?= $coCity  ?><br>
            <?= $coState  ?><br>
            <?= $coCountry ?><br>
            <b>Phone: </b><?= $coPhone  ?><br>
          </p>
        </div>

      </div>
      
      <hr>
      
      <!-- Invoice  Number & Client Details -->
      <div class="row-fluid">
        <div class="span9">
            <h4>Invoice: <?= $coSlug."-".$id ?></h4>
             <p>
              <b><?= $clName ?></b><br>
              <?= $clAddr1 ?><br>
              <?= $clAddr2 ?><br>
              <?= $clCity  ?><br>
              <?= $clState  ?><br>
              <?= $clCountry ?><br>
              <b>Phone: </b><?= $clPhone ?><br>
            </p>
        </div>
        <div class="span3">
          <br><br>
            <p>
              <b>Date of Invoice: <?= $inDateInvoice ?></b><br>
              Due Date: <?= $inDateDue ?><br>
            </p>
        </div>
      </div>

      <br>

      <!-- Item Details -->
      <div class="row-fluid">
        <div class="span12">
        <table class="table table-striped table-bordered">
          <tr>
            <th>Sr. No.</th>
            <th>Description</th>
            <th>Price</th>
          </tr>
          <tr>
            <td>1.</td>
            <td>Domain Registration</td>
            <td>Rs. 500</td>
          </tr>
          <tr>
            <td>2.</td>
            <td>Website Designing</td>
            <td>Rs. 4500</td>
          </tr>
        </table>
        </div>
      </div>

      
      <!-- Price Details -->
      <div class="row-fluid">
        <div class="span5 offset7">
            <p>
              Total: Rs. XXXX<br>
              Tax (14.5%): Rs. XXX<br>
              Invoice Total: <span style="color:green;">Rs. XXXX</span><br>
            </p>

        </div>
      </div>

            
      <!-- Footer -->
      <div class="row-fluid">

      </div>


      </div>

      <br>

    </div>

    </body>
</html>
<?php endif; ?>