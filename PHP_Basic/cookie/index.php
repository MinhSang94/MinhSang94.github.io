<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="run()">
	<?php
		$cookieName = "userPHP";
		$cookieValue = "ms";
		//create cookie
		setcookie($cookieName, $cookieValue, time() + 86400, "/");
		//check cookie is set
		if (isset($_COOKIE[$cookieName])) {
			echo "Cookie is already exist. PHP";
		} else {
			echo "Cookie is not set. PHP";
		}
		//delete cookie
		setcookie($cookieName, $cookieValue, time() - 86400, "/");
		//check cookie was deleted
		if (isset($_COOKIE[$cookieName])) {
			echo "Cookie is already exist. PHP";
		} else {
			echo "Cookie is not set. PHP";
		}
	?>
	<p id="alert"></p>
	<script type="text/javascript">
		/**
			* Function run all function inside that script
		*/
		function run() {
			var date = new Date();
			date.setTime(date.getTime() + (24*60*60*1000));
			document.cookie = "user = ms; expires=" + date.toUTCString() + "; path=/;";
			var cookie = getCookie("user");
			alert(document.cookie);
			if (cookie != '') {
				document.getElementById('alert').innerHTML = "Cookie is already exist. JS";
			} else {
				document.getElementById('alert').innerHTML = "Cookie is not set. JS";
			}
		}
		/**
			* Function delete Cookie
			* @param {string} cname
		*/
		function deleteCookie(cname) {
			document.setCookie = "user = ms; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		}
		/**
			* Function get Cookie data
			* @param {string} cname
		*/
		function getCookie(cname) {
		    var name = cname + "=";
		    var decodedCookie = decodeURIComponent(document.cookie);
		    var ca = decodedCookie.split(';');
		    for(var i = 0; i <ca.length; i++) {
		        var c = ca[i];
		        while (c.charAt(0) == ' ') {
		            c = c.substring(1);
		        }
		        if (c.indexOf(name) == 0) {
		            return c.substring(name.length, c.length);
		        }
		    }
		    return "";
		}
	</script>
</body>
</html>