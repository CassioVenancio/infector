<?php

namespace Infector\Scripts;

class StartScan
{
    private string $urls;
    public function __construct()
    {
        $this->urls = require(__DIR__ . "/../../urls-routes.txt");
    }
    public function exec(): void
    {
        $envUrl = $this->getUrls($this->urls);
        
        $this->createEnv($envUrl);
        
        shell_exec('./sacan.sh');
    }

    private function getUrls(string $urls): array
    {
        $urlsList = array_filter(explode("\n", $urls));

        return $urlsList;
    }

    private function createEnv(array $urlsList): void
    {
        foreach ($urlsList as $urls){
            $url = $urls[0];
            shell_exec("export URL_ROUTE={$url}");
        }
        # definir logica para varios urls
        
    }
}