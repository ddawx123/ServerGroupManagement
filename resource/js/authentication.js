// JavaScript Document

document.onreadystatechange = function () {
	if (document.readyState == "complete") {
		var xhr;
		if (window.XMLHttpRequest) {
			xhr = new XMLHttpRequest();
		} else {
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhr.onreadystatechange = function () {
        	if (xhr.readyState == 4 && xhr.status == 200) {
				var res = xhr.responseText;
				if (res != "verified") {
					window.location.href = "./loginFrame.html";
				}
        	}
    	}
    	xhr.open("GET", "../api/login.php?act=queryState", true);
    	xhr.send();
	}
}
