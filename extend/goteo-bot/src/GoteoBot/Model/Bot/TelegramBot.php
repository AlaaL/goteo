<?php
/*
 * This file is part of the Goteo Package.
 *
 * (c) Platoniq y Fundación Goteo <fundacion@goteo.org>
 *
 * For the full copyright and license information, please view the README.md
 * and LICENSE files that was distributed with this source code.
 */

namespace GoteoBot\Model\Bot;

use \React\EventLoop\Factory;
use \unreal4u\TelegramAPI\HttpClientRequestHandler;
use \unreal4u\TelegramAPI\TgLog;
use \unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
use \unreal4u\TelegramAPI\Telegram\Methods\SendPhoto;
use \unreal4u\TelegramAPI\Telegram\Methods\SetWebhook;
use Goteo\Application\Config;
use unreal4u\TelegramAPI\Telegram\Methods\SendAnimation;
use Goteo\Model\Image;

Class TelegramBot implements \GoteoBot\Model\Bot {

    const PLATFORM = "telegram";
    const URL = "t.me";

    private
        $loop,
        $handler,
        $tgLog;

    public function createBot() {
        $this->loop = Factory::create();
        $this->handler = new HttpClientRequestHandler($this->loop);
        try {
            $this->tgLog = new TgLog(Config::get('bot.telegram.token'), $this->handler);
        } catch(ConfigException $e) {
            Message::error($e->getMessage());
        }
    }

    public function sendMessage($chatId, $text) {
        $sendMessage = new SendMessage();
        $sendMessage->chat_id = $chatId;
        $sendMessage->text = $text;
        $this->tgLog->performApiRequest($sendMessage);
        $this->loop->run();
    }

    public function sendImage($chatId, $image, $caption) {
        $sendImage = new SendPhoto();
        $sendImage->chat_id = $chatId;
        $sendImage->photo = $image->getLink(300,300,true);
        $sendImage->caption = $caption;
        $this->tgLog->performApiRequest($sendImage);
        $this->loop->run();
    }

    public function sendAnimation($chatId, $animation, $caption) {
        $sendAnimation = new SendAnimation();
        $sendAnimation->chat_id = $chatId;
        $sendAnimation->animation = $animation->getLink(300,300, true);
        $sendAnimation->caption = $caption;
        $this->tgLog->performApiRequest($sendAnimation);
        $this->loop->run();
    }

    public function setWebhook() {
        $setWebhook = new SetWebhook();
        $setWebhook->url = 'https:' . Config::get('url.main') . '/goteobot/api/telegram/' . Config::get('bot.telegram.token');

        $this->tgLog = new TgLog(Config::get('bot.telegram.token'), new HttpClientRequestHandler($this->loop));
        $this->tgLog->performApiRequest($setWebhook);
        $this->loop->run();
    }

    public static function getName() {
        return Config::get('bot.telegram.name');
    }
}
