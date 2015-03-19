<?
$address = "http://213.16.87.105";
ini_set('error_reporting', E_ALL);
// 025.9:000.0:000.0:0000:000.0:026.0:000.0:Normal  :No Charge :053:0016.4:0018.6:
$raw = exec('/usr/bin/curl -s --max-time 10 "'.$address.'/RTMonitor?id="');
//echo $raw;
if (preg_match('/(\d\d\d\.\d):(\d\d\d.\d):(\d\d\d.\d):(\d\d\d\d):(\d\d\d.\d):(\d\d\d.\d):(\d\d\d.\d):(\S+)\s*:([^:]+)\s*:(\d\d\d):(\d\d\d\d.\d):(\d\d\d\d.\d):/',$raw,$m)) {
    $mysql=@mysql_pconnect("localhost","solar","w83pm2jhD48T");
    mysql_select_db("solar") or die("Adatbázis hiba!");
    mysql_query("SET NAMES utf8");
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
#    echo $sql;
    mysql_query($sql) or print(mysql_error());
}
?>
