<?php
$url = "http://{$_SERVER['SERVER_NAME']}/invoice/"; 


function activeClass($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo ' class="active"';
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple Invoice Generator</title>
    <link href="<?= $url ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $url ?>css/styles.css" rel="stylesheet">
    <script src="<?= $url ?>js/jquery.js"></script>
    <script src="<?= $url ?>js/bootstrap.min.js"></script>
  </head>
  <body>

    <h1>Simple Invoice Generator</h1>

      <div class="wrapper">
        <ul class="nav nav-tabs">
          <li <?= activeClass('invoices'); ?> ><a href="<?= $url ?>invoices/">Invoices</a></li>
          <li <?= activeClass('clients'); ?> ><a href="<?= $url ?>clients/">Clients</a></li>
          <li <?= activeClass('company'); ?> ><a href="<?= $url ?>company/">Company</a></li>
        </ul>
