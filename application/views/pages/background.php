<?php
$filename = '/web_project/images/back1.jpg';
$filesize = filesize($filename);
header( "Content-Type: application/force-download");
header( "Content-Disposition: attachment; filename= ".basename($filename));
header( "Content-Length: ".$filesize);
//读取文件并写入到输出缓冲
ob_clean();
readfile($filename);
?>