Telegram bot base on Yii2 basic project template. See [about yii2](https://github.com/yiisoft/yii2-app-basic).

## Changes other than the basic template

### commands
- Removed HelloController
- Added SetWebhookController

### config
- Added bot-config.php.dist (you should create bot-config.php from bot-config.php.dist template)
- Added TelegramBot component to web.php
- Configured translations in web.php

### controllers
- Removed SiteController
- Added TelegramBotController

### models
#### New folders:
- `commands` which collected all commands of telegram bot
- `components` which collected TelegramBot component.
- `exceptions`.
- `helpers`.
- `messages`.
#### New models
- Language
- TelegramBotRequest
- User