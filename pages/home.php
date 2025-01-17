<h3>Login Form</h3>
<?php
if (!isset($_POST['login_btn'])) {
    require_once("pages/loginform.php");
} else {
    loginUser($_POST['login'], $_POST['password']);
}
?>