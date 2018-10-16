<?php
date_default_timezone_set("Asia/Taipei");
$today = date("YmdHi");
$qstatQueryFile="/tmp/".$today.".qstatQuery";
$qstatListFile="/tmp/".$today.".qstatList";
$cmd="qstat -Q > ".$qstatQueryFile;
passthru($cmd);
$cmd="qstat > ".$qstatListFile;
passthru($cmd);
sleep(1);
$cmd="curl -F 'fileToUpload=@".$qstatQueryFile."' http://140.110.17.247/github/curl/index.php";
passthru($cmd);
$cmd="curl -F 'fileToUpload=@".$qstatListFile."' http://140.110.17.247/github/curl/index.php";
passthru($cmd);
sleep(1);
unlink($qstatQueryFile);
unlink($qstatListFile);
?>