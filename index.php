<html>
<head><title>Egyházasfalu szolár töltésvezérlő</title></head>
<body>
<h1>Egyházasfalu szolár töltésvezérlő</h1>
<h2>Grafikonon ábrázolható értékek</h2>
<ul>
<?
$elem = array(  'battVolt',
  'pvVolt',
  'battCurr',
  'chargePower',
  'energyGen',
  'maxBattVolt',
  'minBattVolt',
//  'battState',
//  'chargeState',
  'soc',
  'remoteTemp',
  'localTemp');
foreach ($elem as $attr) {
    echo "<li><a href=\"fgraph.php?attr=$attr\">$attr</a></li><br>";
}
?>
</ul>
</body>
</html>
