<form class="signup-form" action="index.php" method="POST">
<?php
error_reporting(0);
require_once("qrcode.php");
$n = $_POST['$nos'];
//---------------------------------------------------------
$qr = new QRCode();
$qr->setErrorCorrectLevel(QR_ERROR_CORRECT_LEVEL_L);
$qr->setTypeNumber(4);
//Send your value from the database
$qr->addData("$");
$qr->addData("$n*40");
//Data value end
$qr->make();
$qr->printHTML();
?>
 <button type="submit" name ="submit" class="btn btn-info">
              <i class="icon-ok icon-white"></i> Done</a>
              </button>
