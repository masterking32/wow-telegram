# TrinityCore/AzerothCore/Mangos Telegram Bot

This is a Telegram bot that execute commands in [TrinityCore](https:/trinitycore.org) or [AzerothCore](http://www.azerothcore.org/) console via SOAP.

# Installation

 - Download project & unzip into your `htdocs` or `public_html` or `www` folder.
 - Install Telegram. then start working with [BotFather](https://telegram.me/BotFather "BotFather")
 - Enter `/newbot` then Enter your bot name.
 - After creating your bot you will get an HTTP API token. ![New Telegram bot](https://raw.githubusercontent.com/masterking32/wow-telegram/master/screenshots/1.jpg)
 - Go to `application/tg_config/` folder and open `config.php` with a text editor.
 - Open config file and set your server data, Also need to add HTTP API token to `TelegramBotToken` in the config file.
 - Now open this link with your browser `https://api.telegram.org/bot<token>/setwebhook?url=HTTPS://YOU.COM/ProjectFolder/telegram.php`  for our example it's like: `https://api.telegram.org/bot888037843:AAFHA8j4jXvao6_KiWv0ePdozLw6ZDzJtDk/setwebhook?url=https://DOMAIN.COM/telegramAPI/telegram.php` then you will see: ![Telegram set webhook sucessful](https://raw.githubusercontent.com/masterking32/wow-telegram/master/screenshots/2.jpg)
 - Then send a message to your bot. The bot will be sending your chat id. ![Telegram bot](https://raw.githubusercontent.com/masterking32/wow-telegram/master/screenshots/3.jpg)
 - Add chat ID with soap username and password into the config file. (Can support multi-user).
 - Type `.commands` to see command lists.
 - Enjoy that.
 
 [Telegram bots API documents](https://core.telegram.org/bots/api "Telegram bots API documents")
 

## Requirement : PHP >= 7.0
- PHP soap
- Enable Core soap
- Valid HTTPS.


## Screenshots

![Usage](https://raw.githubusercontent.com/masterking32/wow-telegram/master/screenshots/4.jpg)
![Usage](https://raw.githubusercontent.com/masterking32/wow-telegram/master/screenshots/5.jpg)

## Programmers

Author : [Amin.MasterkinG](https://masterking32.com)
