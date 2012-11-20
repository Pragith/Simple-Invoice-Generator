<pre>Invoice Create Page


<?php

  
// Get current ID count and increment by 1
  $url = "../data/count.json";
  $json = file_get_contents($url);
  $data = json_decode(@$json);   
  $id = ++$data->invoices;
  echo $id;



?>