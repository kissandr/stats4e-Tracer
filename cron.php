<?
$address = "http://213.16.87.105";
// 025.9:000.0:000.0:0000:000.0:026.0:000.0:Normal  :No Charge :053:0016.4:0018.6:
$raw = exec('/usr/bin/curl -s --max-time 10 "'.$address.'/RTMonitor?id="');
if (preg_match('/(\d\d\d\.\d):(\d\d\d.\d):(\d\d\d.\d):(\d\d\d\d):(\d\d\d.\d):(\d\d\d.\d):(\d\d\d.\d):(\S+)\s*:([^:]+)\s*:(\d\d\d):(\d\d\d\d.\d):(\d\d\d\d.\d):/',$raw,$m)) {
    include_once("db.php");
    unset($m[0]);
    $sql = "INSERT INTO `log` (
  `battVolt`,
  `pvVolt`,
  `battCurr`,
  `chargePower`,
  `energyGen`,
  `maxBattVolt`,
  `minBattVolt`,
  `battState`,
  `chargeState`,
  `soc`,
  `remoteTemp`,
  `localTemp`) VALUES ('".join("','",$m)."');";
    mysql_query($sql) or print(mysql_error());
}
?>
