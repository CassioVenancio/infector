<?php

$init = require_once(__DIR__ . "/../scripts-sh/init.sh");
$start = require_once(__DIR__ . "/../scripts-sh/start-scan.sh");
$urls = require_once( __DIR__ . "/Urls.php");

shell_exec($init);

foreach ($urls as $url){
    shell_exec("export URL_ROUTE={$url}");
}

shell_exec($start);

# Iniciar o build da imagem
# enviar variaveis de ambiente com url
# executar o run com as variaveis de ambiente