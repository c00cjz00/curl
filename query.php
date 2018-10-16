<?php
$cmd="/opt/pbs/bin/qstat -Q"; $remoteFile="/home/c00cjz00/tmp/qstat.Query"; curlFile($cmd,$remoteFile);
$cmd="/opt/pbs/bin/qstat"; $remoteFile="/home/c00cjz00/tmp/qstat.List"; curlFile($cmd,$remoteFile);
$cmd="/find ~/"; $remoteFile="/home/c00cjz00/tmp/scan.List"; curlFile($cmd,$remoteFile);

function curlFile($cmd,$remoteFile){
 unlink($remoteFile); sleep(1);
 $cmdExec=$cmd." > ".$remoteFile; 
 exec($cmdExec); sleep(1);
 $cmdCurl="/usr/bin/curl -F 'fileToUpload=@".$remoteFile."' http://140.110.17.247/github/curl/index.php"; 
 exec($cmdCurl); sleep(1);
} 
?>