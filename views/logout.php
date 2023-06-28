<?php
session_start();

unset($_SESSION["nome_usuario"]);
unset($_SESSION["login_usuario"]);
unset($_SESSION["id_usuario"]);
header("Location: views/form_login.php");
