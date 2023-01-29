<?php
use guestbook\Error;
session_start();
session_regenerate_id();

$magic = "0xDEADBEEF";

require_once '../../../configuration.php';

if (@is_dir("../../../setup")) {
	$error = new Error("Setup directory exists. You either haven't installed your guestbook, or forgot to delete the setup folder.");
	die($error->showError());
}

if (!file_exists("../../../data.php")) {
	$error = new Error("Data file doesn't exist. Have you installed your guestbook yet?");
	die($error->showError());
}

require_once '../iden.php';

if (@$magicBackup != "0xNOWALLEALLOWED")
	die("This file cannot be executed directly");

unset($magicBackup);

include_once '../../../classes/database/mysql_dump.inc.php';
				
$mysql_dump = new MYSQL_DUMP(base64_decode($data['dbHost']), 
base64_decode($data['dbUsername']), 
base64_decode($data['dbPassword']));

$data['dbDatabaseDecoded'] = base64_decode($data['dbDatabase']);
$sql1 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['config'], HAR_ALL_OPTIONS);
$sql2 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['admin'], HAR_ALL_OPTIONS);
$sql3 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['posts'], HAR_ALL_OPTIONS);
$sql4 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['ip'], HAR_ALL_OPTIONS);
$sql5 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['censored'], HAR_ALL_OPTIONS);
$sql6 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['smilies'], HAR_ALL_OPTIONS);
$sql7 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['trash'], HAR_ALL_OPTIONS);
$sql8 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['reply'], HAR_ALL_OPTIONS);
$sql9 = $mysql_dump->dumpDB($data['dbDatabaseDecoded'], $dbTables['backupLog'], HAR_ALL_OPTIONS);
unset($data['dbDatabaseDecoded']);

$sql = $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 . $sql8 . $sql9;
$sql_file = "angora_" . time() . ".sql";
$mysql_dump->download_sql($sql, $sql_file);

include_once '../../../classes/functions.php';
$queryMsg = "insert into " . $dbTables['backupLog'] . " (id, date, operation) values (NULL, '" . secureVar(time(), 'sql') . "', '" . secureVar('b', 'sql') . "');";
$con->modify($queryMsg);

$magic = "";
unset($magic);

exit();

echo "<script language=\"javascript\">window.close();</script>";

?>
