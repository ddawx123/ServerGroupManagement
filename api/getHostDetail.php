<?php
require_once(dirname(__FILE__).'/common.php');
require_once(dirname(__FILE__).'/conn.php');
header('Content-Type: text/plain; charset=UTF-8');
$hid = !empty($_REQUEST['hostId']) ? htmlspecialchars(intval($_REQUEST['hostId'])) : null;
if (is_null($hid)) exit('{"result":"error"}');
$result = $sqlhandle->query('select * from hosts where Id='.$hid);
$sqlhandle->close();
if (is_null($result)) exit('{"result":"fail"}');
if ($result->num_rows <= 0) exit('{"result":"none"}');
$data = array('result'=>'success','data'=>array());
for ($i = 0; $i < $result->num_rows; $i++) {
	$data['data'][$i] = $result->fetch_array(MYSQLI_ASSOC);
}
exit(json_encode($data));