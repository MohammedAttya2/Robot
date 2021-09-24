<?php

use App\CommandHandler;
use App\CommandParser;
use App\CommandValidator;
use App\Exceptions\InvalidCommand;
use App\Exceptions\InvalidCommandLength;
use App\Output\TextFile;
use App\Robot;

require_once __DIR__ . '/vendor/autoload.php';

if (empty($argv[1])) {
    echo "Missing Command\n";
    echo "Usage: php index.php [Command]\n";
    die;
}

$string = $argv[1];

$robot = new Robot;
$validator = new CommandValidator();

try {
    if (!$validator->validate($string)) {
        echo 'Invalid Command';
        die;
    }
} catch (InvalidCommand $e) {
    echo 'Invalid Command\n';
    echo $e->getMessage();
    die;
} catch (InvalidCommandLength $e) {
    echo 'Invalid Command Length\n';
    echo $e->getMessage();
    die;
}

$parser = new CommandParser();
$commands = $parser->parse($string);

$handler = new CommandHandler($robot, $commands);
try {
    if (!$handler->process()) {
        echo 'Cannot handle the command';
        die;
    }
} catch (InvalidCommand $e) {
    echo 'Invalid Command\n';
    echo $e->getMessage();
    die;
}

$output = new TextFile($robot);
try {
    echo $output->generateOutput($string);
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}