<?php 
require_once 'vendor/autoload.php';
require_once 'stopwatch.php';
 
// connect to database
$mysqli = new mysqli('db4free.net', 'matko', 'siaw9wur', 'figapartybot');
if (!empty($mysqli->connect_errno)) {
    throw new \Exception($mysqli->connect_error, $mysqli->connect_errno);
}
 
// create a bot
$bot = new vendor\TelegramBot\Api\Client('279438339:AAE_F3jEtmrun9i1F57sf_CXWn3lPe-u6YE', '9OyWH2Ph8dk7T2aHc_OyAJzwMpBGRWyb');
// run, bot, run!
$bot->run();

$bot->command('start', function ($message) use ($bot) {
    $answer = 'Howdy! Welcome to the stopwatch. Use bot commands or keyboard to control your time.';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

$bot->command('go', function ($message) use ($bot, $mysqli) {
    $stopwatch = new Stopwatch($mysqli, $message->getChat()->getId());
    $stopwatch->start();
    $bot->sendMessage($message->getChat()->getId(), 'Stopwatch started. Go!');
});

$bot->command('status', function ($message) use ($bot, $mysqli) {
    $stopwatch = new Stopwatch($mysqli, $message->getChat()->getId());
    $answer = $stopwatch->status();
    if (empty($answer)) {
        $answer = 'Timer is not started.';
    }
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

$bot->command('stop', function ($message) use ($bot, $mysqli) {
    $stopwatch = new Stopwatch($mysqli, $message->getChat()->getId());
    $answer = $stopwatch->status();
    if (!empty($answer)) {
        $answer = 'Your time is ' . $answer . PHP_EOL;
    }
    $stopwatch->stop();
    $bot->sendMessage($message->getChat()->getId(), $answer . 'Stopwatch stopped. Enjoy your time!');
});


?>
