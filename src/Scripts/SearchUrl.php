<?php

namespace Infector\Scripts;
use GuzzleHttp\Client;

class SearchUrl
{
    private array $urlsAndParams;
    private array $payload;
    private Client $client;
    public function __construct()
    {
        require(__DIR__ . "/../../urls-routes.php");
        require(__DIR__ . "/../../payloads.php");
        $this->urlsAndParams = $urlsAndParams;
        $this->payload = $payloads;
        $this->client = new Client();
    }
    public function urlAttack()
    {
        $resp = $this->connectUrl();

        #var_dump($resp);
        echo $resp->getStatusCode();
    }
    private function getUrl(array $urlList): string
    {
        $url = $urlList["url"];
        
        return $url;
    }

    private function getParams(array $urlsAndParams, array $payload): array
    {
        $params = $urlsAndParams["params"];

        $params["assunto"] = $payload[0];
        $params["text"] = $payload[0];
        #$params = json_encode($params);
        return $params;
    }

    private function getMethod(array $methods): string
    {
        $method = $methods["method"];
        return $method;
    }

    private function connectUrl()
    {
        $url = $this->getUrl($this->urlsAndParams);
        $params = $this->getParams($this->urlsAndParams, $this->payload);
        $method = $this->getMethod($this->urlsAndParams);

        echo "$url\n\n$method"; var_dump($params);
        return $this->client->request($method, $url, $params);
    }
}