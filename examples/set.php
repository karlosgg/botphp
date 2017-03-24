<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = 'bot276122011:AAFj_3j1_VeVsyKNzyYQYyYcV9lqqg9prto';
$BOT_NAME = 'TlMovilAppBot';
$hook_url = 'https://jcggphp.herokuapp.com/';
try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);

    // Uncomment to use certificate
    $result = $telegram->setWebhook($hook_url, ['certificate' => 'cert.pem']);

    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e;
}
