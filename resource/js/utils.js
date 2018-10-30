// JavaScript Document
/**
 * 前端公共库
 * @description 供前端应用调用的通用代码方法
 * @author David Ding
 * @copyright 2012-2018 DingStudio Technology
 */

/**
 * getUrlParam Url参数获取
 * @param String name 参数字段名
 */
function getUrlParam(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if (r != null) return unescape(r[2]); return null;
}

/**
 * getCookie 获取客户端Cookie信息
 * @param String name Cookie名称
 */
function getCookie(name) {
	if (document.cookie.length > 0) {
		var c_start = document.cookie.indexOf(name + "=");
		if (c_start != -1) {
			c_start = c_start + name.length + 1;
			var c_end = document.cookie.indexOf(";", c_start);
			if (c_end == -1) c_end = document.cookie.length;
			return unescape(document.cookie.substring(c_start, c_end));
		}
	}
	return null;
}

/**
 * setCookie 设置客户端Cookie信息
 * @param String name Cookie名称
 * @param String value Cookie数据值
 */
function setCookie(name, value) {
	var days = 15;
	var expire = new Date();
	expire.setTime(expire.getTime() + days * 24 * 60 * 60 * 1000);
	document.cookie = name + "="+ escape (value) + ";expires=" + expire.toGMTString();
}

/**
 * delCookie 移除客户端Cookie信息
 * @param String name Cookie名称
 */
function delCookie(name) {
	var expire = new Date();
	expire.setTime(expire.getTime() - 1);
	if (getCookie(name) != null) document.cookie = name + "=" + getCookie(name) + ";expires=" + expire.toGMTString();
}