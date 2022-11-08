<?php

namespace Infector\Scripts;

class StartScan
{
    private array $urls;
    public function __construct()
    {
        include(__DIR__ . "/../../urls-routes.php");
        $this->urls = $urls;
    }
    public function exec(): void
    { 
        $this->createEnv($this->urls);
        
        echo shell_exec('./scan.sh');
    }

    private function createEnv(array $urlsList): void
    {
        $url = $urlsList[0];
        putenv("URL_ROUTE=$url");
    }
}