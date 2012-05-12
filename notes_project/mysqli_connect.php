<?php
/*
 * Used to provide a connection to the database
 */

define('DB_USER', 'redavni_admin');
define('DB_PASS', '4dvx_TSb5.wP');
define('DB_HOST', 'bitknight.com');
define('DB', 'redavni_notes');
define('DB_PORT', 3306); // no reason to supply unless changed from 3306
// Connect
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

// Verify
if (!$dbc) 
{
  die('Connect error: (' . mysqli_connect_errorno() . ') ' . mysqli_connect_error());
}
?>
