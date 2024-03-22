<?php
require_once('../Connections/connect2data.php');

if (isset($_REQUEST['level'])) {

	$act = !$_REQUEST['level'];

	$sql= "UPDATE data_set SET d_level=:d_level WHERE d_id=:d_id";

	$sth = $conn->prepare($sql);
	$sth->bindParam(':d_level', $act, PDO::PARAM_INT);
	$sth->bindParam(':d_id', $_REQUEST['d_id'], PDO::PARAM_STR);
	$sth->execute();

	echo $act;
}
?>