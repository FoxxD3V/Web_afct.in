<?php
ob_start();
header("Last-Modified:" . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-store, must-revalidate");
header("Pragma: no-cache");
session_start();
session_destroy();
header("Location: login.php");
exit;
?>