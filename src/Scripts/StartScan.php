<?php

namespace Infector\Scripts;

class StartScan
{
    private SearchUrl $searchUrl;
    private int $status;
    private $body;
    public function __construct()
    {
        $this->searchUrl = new SearchUrl();
    }
    public function exec(): void
    { 
        $resp = $this->searchUrl->urlAttack();
        $this->status = $resp["status"];
        $this->body = $resp["body"];

        $this->checkStatusCode($this->status);
    }

    private function checkStatusCode(int $statusCode)
    {
        switch ($statusCode) {
            case $statusCode > 200 && $statusCode < 500:
                $this->retry();
                break;
            case $statusCode >= 500:
                $this->sqlInjectionSuccess($statusCode);
                break;
            case $statusCode >= 200 && $statusCode <= 300:
                echo "Result 200, The application was not explored. Use a new payload to infect";
                break;
        }
    }

    private function sqlInjectionSuccess($status): void
    {
        echo "Há vulnerabilidades em seu código, uma vulnerabilidade foi explorada! status code: $status";# criar escript que aponta em qual payload, foi descoberta a vulnerabilidade
    }

    private function retry(): void
    {
        $this->exec();
    }
}