<?php
session_start();
include ("db.php");

$cond='';
$mintakoz=300;
if ($_GET['interval']=='WEEK') {
    $cond = 'AND (MINUTE(`time`)%5)=0';
    $mintakoz=300;
}
if ($_GET['interval']=='MONTH') {
    $cond = 'AND (MINUTE(`time`)%15)=0';
    $mintakoz=900;
}
if ($_GET['interval']=='YEAR') {
    $cond = 'AND (MINUTE(`time`)=0)';
    $mintakoz=3600;
}
$res = mysql_query("SELECT `{$_GET['attr']}` AS value, `time` AS `timestamp`, UNIX_TIMESTAMP(`time`) AS utimestamp FROM `log` WHERE `time` > NOW() - INTERVAL 1 {$_GET['interval']} $cond;") or die ("Lekerdezes hiba!". mysql_error());
$timestamp=0;
while($row = mysql_fetch_assoc($res)) {
    if ($timestamp == 0 || $timestamp + $mintakoz*2.5 > $row['utimestamp']) $timestamp = $row['utimestamp'];
    else {
      for($i=$timestamp ; $i<$row['utimestamp'] ; $i+=$mintakoz)
//        echo strftime("%Y-%m-%d %H:%M",$i).";-1\n";
        echo strftime("%Y-%m-%d %H:%M",$i).";\n";
      $timestamp = $row['utimestamp'];
    }
    echo substr($row['timestamp'],0,-3).";{$row['value']}\n";
}
if (mysql_num_rows($res)==0) $timestamp = time() - 60*60*24;

if ($timestamp + ($mintakoz*1.5) < time()) {
  for($i=$timestamp ; $i<time() ; $i+=$mintakoz)
//     echo strftime("%Y-%m-%d %H:%M",$i).";-1\n";
     echo strftime("%Y-%m-%d %H:%M",$i).";\n";

}

?>

