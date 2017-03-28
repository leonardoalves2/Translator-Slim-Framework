<?php

use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Filesystem\Filesystem;

require_once 'vendor/autoload.php';

$app = new \Slim\App;

$app->add(new Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware);

$app->get('/', function () {
    // Prepare the FileLoader
    $loader = new FileLoader(new Filesystem(), './lang');
    // Register the English translator
    $transEnglish = new Translator($loader, "en");
    // Register the Dutch translator
    $transDutch = new Translator($loader, "pt-BR");
    echo "<h1>Translations</h1><pre>";
    echo "English: " . $transEnglish->get('talk.conclusion') . "\n";
    echo "Portugues:   " . $transDutch->get('talk.conclusion');
});
$app->run();
