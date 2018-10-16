<?php
# date_default_timezone_set("Asia/Taipei");
# $today = date("YmdHi");
# $today  = mktime(date("H"), date("i"), 0, date("m")  , date("d"), date("Y"));

$qstatQueryFile="/home/c00cjz00/tmp/qstat.Query";
$qstatListFile="/home/c00cjz00/tmp/qstat.List";
unlink($qstatQueryFile); sleep(1);
$cmd="/opt/pbs/bin/qstat -Q > ".$qstatQueryFile; exec($cmd); sleep(1);
unlink($qstatListFile); sleep(1);
$cmd="/opt/pbs/bin/qstat > ".$qstatListFile; exec($cmd); sleep(1);
$cmd="/usr/bin/curl -F 'fileToUpload=@".$qstatQueryFile."' http://140.110.17.247/github/curl/index.php";
echo $cmd."\n"; exec($cmd); sleep(1);
$cmd="/usr/bin/curl -F 'fileToUpload=@".$qstatListFile."' http://140.110.17.247/github/curl/index.php";
echo $cmd."\n"; exec($cmd); sleep(1);


?>