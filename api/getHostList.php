<?php
require_once(dirname(__FILE__).'/common.php');
require_once(dirname(__FILE__).'/conn.php');
$title = '<caption><strong>主机列表</strong></caption><tr><th width="67" scope="col">ID</th><th width="221" scope="col">服务器名称</th><th width="230" scope="col">服务器IP</th><th width="154" scope="col">操作系统</th><th width="85" scope="col">状态</th><th width="149" scope="col">远程控制</th></tr>';
echo $title;
$result = $sqlhandle->query('select * from hosts');
$data = array();
for ($i = 0; $i < $result->num_rows; $i++) {
	$data[$i] = $result->fetch_array(MYSQLI_ASSOC);
}
$sqlhandle->close();
if (count($data) == 0) exit('<tr><th scope="row">0</th><td align="center">当前无可用主机</td><td align="center">IP地址不可用</td><td align="center">未知</td><td align="center" style="color: #F00">不可用</td><td align="center">无可用操作</td></tr>');
for ($i = 0; $i < count($data); $i++) {
	$html = '<tr>';
	$html .= '<th scope="row">'.$data[$i]['Id'].'</th>';
	$html .= '<td align="center">'.$data[$i]['Name'].'</td>';
	$html .= '<td align="center">'.$data[$i]['IpAddr'].'</td>';
	$html .= '<td align="center">'.$data[$i]['OS'].'</td>';
	if ($data[$i]['Status'] == 1) {
		$color = '0F8';
		$status = '<strong>正常</strong>';
	} else {
		$color = 'F60';
		$status = '<strong>异常</strong>';
	}
	$html .= '<td align="center" style="color: #'.$color.'">'.$status.'</td>';
	$html .= '<td align="center"><a href="#" target="_self">重启</a> <a href="#" target="_self">RDP/SSH</a></td>';
	$html .= '</tr>';
	echo $html;
}