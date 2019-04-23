<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="busca"; // Database name


	$con = mysql_connect($host,$username,$password)   or die(mysql_error());
	mysql_select_db($db_name, $con)  or die(mysql_error());

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT nome from usuarios where nome LIKE '%$q%'";
$rsd = mysql_query($sql);

 foreach ($associados->findAll() as $key => $value) {
	$cname = $rs['nome'];
	echo "$cname\n";
  }

while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['nome'];
	echo "$cname\n";
}
?>