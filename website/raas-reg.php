<?php
/**
 * Created by PhpStorm.
 * User: Yaniv Aran-Shamir
 * Date: 9/8/14
 * Time: 2:34 PM
 */

require_once 'GSSDK.php';

if (!empty($_POST)) {
    if ($_POST['action'] == 'login') {
        $apiKey        = "<ENTER_YOUR_DOMAINS_API_KEY_HERE>";
        $secret        = "<ENTER_YOUR_GIGYA-ACCOUNT_SECRET_KEY_HERE>";
        $uid           = $_POST['UID'];
        $userSignature = $_POST['UIDSignature'];
        $timestamp     = $_POST['signatureTimestamp'];
        if (SigUtils::validateUserSignature($uid, $timestamp, $secret, $userSignature)) {
            if (session_start()) {
                $_SESSION['username'] = $_POST['user']['firstName'];
                echo(json_encode(array('result' => 'success')));
            }
        } else {
            echo(json_encode(array('result' => 'error', 'message' => 'signature not valid')));
        }
    } elseif ($_POST['action'] == 'logout') {
        //session_destroy();
        echo(json_encode(array('result' => 'success')));
    }
    exit();
}

function getLoggedInHtml($info) {
$userdetails = $info['user'];
return '<div id="div_LoggedIn" class="logged-in">
        <div class="loginBar-item loginBar-image"><img class="userimage" src="' . $userdetails["thumbnailURL"] . '"/></div>
<div class="login-text loginBar-item ">
    <div class="user-name">' . $userdetails["firstName"] . ' ' . $userdetails['lastName'] . '</div>
    <div class="logout"><a href="#">Logout</a></div>
</div>';
}

function getLoggedOutHtml() {
    return '
    <div id="div_notLoggedIn" class="logged-out">
            <div class="loginBar-item hello">Hello Guest!</div>
            <div class="actions">
                <div class="loginBar-item login">
                    <a href="#">Login</a>
                </div>
                <div class="loginBar-item register">
                    <a href="#">Register</a>
                </div>
            </div>
        </div>';
}
