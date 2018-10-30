<?php
require_once(dirname(__FILE__).'/conn.php');
header('Content-Type: text/html; charset=UTF-8');
if (!session_id()) session_start();
$action = !empty($_REQUEST['act']) ? htmlspecialchars($_REQUEST['act']) : null;
if (is_null($action)) exit('No_Action');
switch ($action) {
    case 'queryState':
        $session = !empty($_SESSION['account']) ? $_SESSION['account'] : null;
        if (is_null($session)) exit('UnAuthorized');
        exit('verified');
        break;
    case 'getSession':
        $username = !empty($_POST['username']) ? htmlspecialchars($_POST['username']) : null;
        $password = !empty($_POST['password']) ? htmlspecialchars($_POST['password']) : null;
        if (is_null($username) || is_null($password)) exit('ParameterLose');
		$result = $sqlhandle->query('select * from users where UserName="'.trim($username).'" and PassWord="'.sha1($password).'"');
		$sqlhandle->close();
		if (is_null($result)) {
			//header('Location: ../frame/loginFrame.html');
			echo '<script>alert("抱歉，登录失败！用户名或密码不正确。");history.go(-1);</script>';
		} else if ($result->num_rows <= 0) {
			//header('Location: ../frame/loginFrame.html');
			echo '<script>alert("抱歉，登录失败！用户名或密码不正确。");history.go(-1);</script>';
		} else {
            $_SESSION['account'] = $username;
            //header('Location: ../frame/mainFrame.html');
			echo '<script>alert("登录成功，欢迎回来！关闭弹窗后如果页面没有跳转请检查是否开启了JS脚本执行权限。");location.href="../frame/mainFrame.html";</script>';
        }
        break;
    default:
        exit('Action_Not_Found');
        break;
}