<?php
/**
 * @author       Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link         https://masterking32.com
 * @Github       https://github.com/masterking32/wow-telegram
 * @Description  It's not masterking32 framework !
 */

define('TelegramBotToken', '123:123-12-1234'); // Your telegram bot Token.

define('Debug_Mode', false); // Change it to true if want enable debug mode.

/**
 * Your soap connection information
 */
$soap_connection_info = array(
    'soap_uri' => 'urn:TC',
    'soap_host' => '127.0.0.1',
    'soap_port' => '7878'
);

/**
 * Connect to the bot with your telegram account.
 * Then send a message to bot, then bot will be send your telegram user id.
 * for example if your telegram ID is 123456
 * $clients["123456"] = array('soap_user' => "InGameUser99", 'soap_pass' => "InGamePassword00");
 * Can add few user id with few accounts (GM ranks can be different for each user.)
 */

$clients['TgUserID1'] = array('soap_user' => 'username', 'soap_pass' => 'password');

/**
 * $clients['TgUserID1'] = array('soap_user' => "username", 'soap_pass' => "username");
 * $clients['TgUserID2'] = array('soap_user' => "username", 'soap_pass' => "username");
 * $clients['TgUserID3'] = array('soap_user' => "username", 'soap_pass' => "username");
 * $clients['TgUserID4'] = array('soap_user' => "username", 'soap_pass' => "username");
 * $clients['TgUserID5'] = array('soap_user' => "username", 'soap_pass' => "username");
 * ...
 *
 * Add more client if needed.
 */

