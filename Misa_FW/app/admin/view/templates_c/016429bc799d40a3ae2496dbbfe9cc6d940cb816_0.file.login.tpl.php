<?php
/* Smarty version 3.1.30, created on 2017-02-28 08:46:54
  from "C:\xampp\htdocs\MinhSang94.github.io\Misa_FW\app\admin\view\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b4d68e8eb0f6_75722785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '016429bc799d40a3ae2496dbbfe9cc6d940cb816' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MinhSang94.github.io\\Misa_FW\\app\\admin\\view\\templates\\login.tpl',
      1 => 1488246391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b4d68e8eb0f6_75722785 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
      			<p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
	      		<button>login</button>
	      	<p class="message">Not registered? <a href="#">Create an account</a></p>
	    </form>
	  </div>
	</div>
	<?php echo '<script'; ?>
 type="text/javascript" src="public/admin/js/loginForm.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
