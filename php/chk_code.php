<?php
session_start();

$action = $_GET['act'];
$code = trim($_POST['code']);
if ($action == 'num') { //检验数字验证码
    if ($code == $_SESSION["helloweba_num"]) {
        echo '1';
    }
} elseif ($action == 'char') {
    if (strtolower($code) == strtolower($_SESSION["helloweba_char"])) {
        echo '1';
    }
}

?>
