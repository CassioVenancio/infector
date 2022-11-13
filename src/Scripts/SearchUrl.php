<?php

namespace Infector\Scripts;
use GuzzleHttp\Client;

class SearchUrl
{
    private array $urlsAndParams;
    private Client $client;
    public function __construct()
    {
        require(__DIR__ . "/../../urls-routes.php");
        $this->urlsAndParams = $urlsAndParams;
        $this->client = new Client();
    }
    public function urlAttack()
    {
        $resp = $this->connectUrl();

        var_dump($resp);
    }
    private function getUrl(array $urlList): string
    {
        $url = $urlList["url"];
        
        return $url;
    }

    private function params(array $urlsAndParams): string
    {
        $params = $urlsAndParams["params"];
        $params = json_encode($params);
        var_dump($params);
        return $params;
    }

    private function connectUrl()
    {
        $url = $this->getUrl($this->urlsAndParams);
        $params = $this->params($this->urlsAndParams);
        echo $url;
        return $this->client->request('POST', $url);
    }
}