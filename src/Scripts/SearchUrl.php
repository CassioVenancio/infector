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
    public function urlAttack(): array
    {
        $resp = $this->connectUrl();

        #var_dump($resp);
        $statusCode = (int)$resp->getStatusCode();
        $body = $resp->getBody();

        $response = [
            "status" => $statusCode,
            "body" => $body
        ];

        return $response;
    }
    private function getUrl(array $urlList): string
    {
        $url = $urlList["url"];
        
        return $url;
    }

    private function getParams(array $urlsAndParams, array $payload): array
    {
        $params = $urlsAndParams["params"];

        $params["ID"] = $payload[0];
        $params["Name"] = $payload[0];
        $params["Description"] = $payload[0];
        $params["Price"] = $payload[0];
        $params["Amounts"] = $payload[0];
        var_dump($params);
        return $params;

        #Eu tenho dois arrays, preciso adicionar o conteudo do array 2 em todas as chaves do array 1
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

        echo "$url\n\n$method\n\n";
        return $this->client->request($method, $url, $params);
    }
}