<?php
session_start();
include ("db.php");
$cond='';
$mintakoz=60*15;
if ($_GET['interval']=='WEEK') {
    $mintakoz=60*15;
}
elseif ($_GET['interval']=='MONTH') {
    $mintakoz=60*15;
}
elseif ($_GET['interval']=='YEAR') {
    $mintakoz=60*15;
}
elseif ($_GET['interval']!='DAY') {
    die("interval error");
}
$res = mysql_query("SELECT `".mysql_real_escape_string($_GET['attr'])."` AS value, `time` AS `timestamp`, UNIX_TIMESTAMP(`time`) AS utimestamp FROM `log` WHERE `time` > NOW() - INTERVAL 1 ".mysql_real_escape_string($_GET['interval'])." $cond ORDER BY `time` ASC;") or die ("Lekerdezes hiba!". mysql_error());
$timestamp=0;
while($row = mysql_fetch_assoc($res)) {
    if ($timestamp == 0 || $timestamp + $mintakoz*2.5 > $row['utimestamp']) $timestamp = $row['utimestamp'];
    else {
      for($i=$timestamp ; $i<$row['utimestamp'] ; $i+=$mintakoz)
        echo strftime("%Y-%m-%d %H:%M",$i).";\n";
      $timestamp = $row['utimestamp'];
    }
    echo substr($row['timestamp'],0,-3).";{$row['value']}\n";
}
if (mysql_num_rows($res)==0) $timestamp = time() - 60*60*24;

if ($timestamp + ($mintakoz*1.5) < time()) {
  for($i=$timestamp ; $i<time() ; $i+=$mintakoz)
     echo strftime("%Y-%m-%d %H:%M",$i).";\n";

}

?>

