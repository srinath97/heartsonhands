<?php
require_once("db.php");
$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without the <>.
$mac_calculated = hash_hmac("sha1", implode("|", $data), "0d0bae5270f946ea82f2c586b6e313d9");

if($mac_provided == $mac_calculated){
    echo "MAC is fine";
    // Do something here
    if($data['status'] == "Credit")
    {
      require_once("db.php");
      $p1=$data['payment_id'];
      $p2=$data['payment_request_id'];
      $q="UPDATE orders SET paid=1 WHERE payment_request_id=\"".$data['payment_request_id']."\"";
mysqli_query($stat,$q);  
    }
    else
    {
       require_once("db.php");
       $q="UPDATE orders SET paid=-1 WHERE payment_request_id=\"".$data['payment_request_id']."\"";
       mysqli_query($stat,$q);
    }
}
else
{
    echo "Invalid MAC passed";
}
?>