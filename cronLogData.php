<?
$address = "http://213.16.87.105";
//00138:00138:4:2015-03-23 09-31-00:28.7:030.9:05.6:0161:000.2:0016.0:0019.4:090:Normal  :  Boost   :2015-03-23 09-46-00:29.0:031.0:05.6:0165:000.3:0016.2:0019.5:093:Normal  :  Boost   :2015-03-23 10-01-00:29.1:031.2:05.3:0156:000.3:0016.2:0019.7:095:Normal  :  Boost   :2015-03-23 10-16-00:28.4:030.4:06.1:0174:000.4:0016.4:0019.8:085:Normal  :  Boost   :
//Date:Batt Voltage (V):PV Voltage (V):Charge Current (A):Charge Power (W):Charge Energy (KWH):RS Temp (°C):Local Temp (°C):SOC (%):Batt State:Charge State:

for ($i=138;$i<139;$i++) {
    include_once("db.php");
    $raw = exec('/usr/bin/curl -s --max-time 10 "'.$address."/LogData?value=0:$i:\"");
    $arr = explode(":",$raw);
    for ($row=0;$row<$arr[2];$row++) {
        $m = array();
        for ($field=0;$field<11;$field++) {
            $m[] = $arr[3+$row*11+$field];
//            echo $arr[3+$row*11+$field]."=";
        }

    $sql = "REPLACE INTO `log` (
      `time`,
      `battVolt`,
      `pvVolt`,
      `battCurr`,
      `chargePower`,
      `energyGen`,
      `remoteTemp`,
      `localTemp`,
      `soc`,
      `battState`,
      `chargeState`) VALUES ('".join("','",$m)."');";
        mysql_query($sql) or print(mysql_error());
    }
}
?>
