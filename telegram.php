<?php
/**
 * @author       Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link         https://masterking32.com
 * @Github       https://github.com/masterking32/wow-telegram
 * @Description  It's not masterking32 framework !
 */

// Load required files.
require_once './tg_config/config.php';

if (!empty(Debug_Mode)) {
    @error_reporting(-1);
    @ini_set('display_errors', 1);
} else {
    @ini_set('display_errors', 0);
    if (version_compare(PHP_VERSION, '5.3', '>=')) {
        @error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
    } else {
        @error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
    }
}

require_once './tg_include/vendor/autoload.php';

function RemoteCommandWithSOAP($username, $password, $COMMAND)
{
    global $soap_connection_info;
    $result = '';
    $conn = new SoapClient(NULL, array(
        'location' => 'http://' . $soap_connection_info['soap_host'] . ':' . $soap_connection_info['soap_port'] . '/',
        'uri' => $soap_connection_info['soap_uri'],
        'style' => SOAP_RPC,
        'login' => $username,
        'password' => $password
    ));
    try {
        $result = $conn->executeCommand(new SoapParam($COMMAND, 'command'));
    } catch (Exception $e) {

        if (!empty(Debug_Mode)) {
            $result = $e;
        } else {
            $result = 'Have error on soap!';
        }

        if (strpos($e, 'There is no such command') !== false) {
            $result = 'There is no such command!';
        }
    }
    unset($conn);
    return $result;
}


// Make Telegram API
$telegram = new Telegram(TelegramBotToken);

$TelegramData = $telegram->getData();

/**
 * Check have chat id and meesage
 */
if (empty($TelegramData['message'] ['text']) || empty($TelegramData['message']['chat']['id'])) {
    exit();
}

$text = $TelegramData['message']['text'];
$chat_id = $TelegramData['message']['chat']['id'];

if (empty($clients)) {
    echo 'No have any client!';
    exit();
}

// Check all clients
foreach ($clients as $userID => $userData) {
    if ($userID == $chat_id && !empty($userData['soap_user']) && !empty($userData['soap_pass'])) {
        $soap_user = $userData['soap_user'];
        $soap_pass = $userData['soap_pass'];
    }
}

// If Chat ID is not valid send chat ID to user.
if (empty($soap_user) || empty($soap_pass)) {
    $chat_id = $telegram->ChatID();
    $content = array('chat_id' => $chat_id, 'text' => 'Your chat id : ' . $chat_id);
    $telegram->sendMessage($content);
    exit();
}

if (strpos($text, '.') === false) {
    $chat_id = $telegram->ChatID();
    $content = array('chat_id' => $chat_id, 'text' => 'Use .commands for see command lists.');
    $telegram->sendMessage($content);
    exit();
}

$resultOfExecute = RemoteCommandWithSOAP($soap_user, $soap_pass, $text);
$chat_id = $telegram->ChatID();
$content = array('chat_id' => $chat_id, 'text' => $resultOfExecute);
$telegram->sendMessage($content);
exit();
