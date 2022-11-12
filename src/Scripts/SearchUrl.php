<?php

namespace Infector\Scripts;
use GuzzleHttp\Client;

class SearchUrl
{
    private array $urls;
    private Client $client;
    public function __construct()
    {
        require(__DIR__ . "/../../urls-routes.php");
        $this->urls = $urls;
        $this->client = new Client();
    }
    public function urlAttack()
    {
        $resp = $this->connectUrl();

        var_dump($resp);
    }
    private function getUrl(array $urlList): string
    {
        $url = $urlList[0];
        
        return $url;
    }

    private function connectUrl()
    {
        $url = $this->getUrl($this->urls);
        echo $url;
        return $this->client->request('POST', $url);
    }
}