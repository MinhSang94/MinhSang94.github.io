<!DOCTYPE html>
<html>
<head>
	<title>Misa Framework Admin</title>
	<link rel="stylesheet" type="text/css" href="../public/admin/css/style.css">
</head>
<body>
	<div class="login-page">

	  	<div class="form">
	  		<h2 style="text-align: left; color: #666">Đăng nhập</h2>
	    	<form class="register-form">
	     	 	<input type="text" placeholder="name"/>
	      		<input type="password" placeholder="password"/>
	      		<input type="text" placeholder="email address"/>
	      		<button>create</button>
	     	<p class="message">Already registered? <a href="#">Sign In</a></p>
	   		</form>
	  		<form class="login-form" method="post">
	      		<input type="text" placeholder="username" name="user[username]" />
      			<input type="password" placeholder="password" name="user[password]" />
      			<p>{$error}</p>
	      		<button>login</button>
	      	<p class="message">Not registered? <a href="#">Create an account</a></p>
	    </form>
	  </div>
	</div>
	<script type="text/javascript" src="public/admin/js/loginForm.js"></script>
</body>
</html>