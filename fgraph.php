<? header('Content-Type: text/html; charset=utf-8' ); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?
include ("db.php");
?>
<title><?=$row['location']?> <?=$field2descr[$_GET['attr']]?></title>
</head>
<body>
<div style="position:absolute; right: 5px; top: 0px;"><h2><?=$row['location']?> <?=$field2descr[$_GET['attr']]?></h2></div>
<?
$interval = 'DAY';
if (isset($_POST['interval']) && in_array($_POST['interval'],array('YESTERDAY','MONTH','WEEK','YEAR')))
    $interval = $_POST['interval'];
?>
<form id="myform" method="POST">
Intervallum:
<select name="interval" onchange="myform.submit();">
    <option value="DAY">Napi</option>
    <option value="WEEK" <?=$interval=='WEEK'?'SELECTED':''?>>Heti</option>
    <option value="MONTH" <?=$interval=='MONTH'?'SELECTED':''?>>Havi</option>
    <option value="YEAR" <?=$interval=='YEAR'?'SELECTED':''?>>Éves</option>
</select>
<a href="<?=$_GET['src']?>csvdata.php?eid=<?=$row['id']?>&attr=<?=$_GET['attr']?>&interval=<?=$interval?>">Adatok letöltése</a>
</form>
<?
if (isset($_GET['attr'])) {
?>

  <script type="text/javascript" src="amline/swfobject.js"></script>
	<div id="flashcontent">
		<strong>You need to upgrade your Flash Player</strong>
	</div>
	<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("amline/amline.swf", "amline", "100%", "90%", "8", "#000000");
		so.addVariable("path", "amline/");
		so.addVariable("settings_file", encodeURIComponent("graph_settings.xml"));
		so.addVariable("data_file", encodeURIComponent("<?=$_GET['src']?>csvdata.php?eid=<?=$row['id']?>&attr=<?=$_GET['attr']?>&interval=<?=$interval?>"));
		so.write("flashcontent");
		// ]]>
	</script>
<?
}
else 
    echo "rossz parameterszam!";
?>

</body>
</html>
