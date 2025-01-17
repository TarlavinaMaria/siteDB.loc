<h3>Registration Form</h3>
<?php
if (!isset($_POST['reg_btn'])) {
    require_once("pages/regform.php");
} else {
    registerUser($_POST ['login'], $_POST['email'], $_POST ['password'], $_POST ['password_confirmation']) ;
}
?>