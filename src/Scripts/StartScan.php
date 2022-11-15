<?php

namespace Infector\Scripts;

class StartScan
{
    private SearchUrl $searchUrl;
    public function __construct()
    {
        $this->searchUrl = new SearchUrl();
    }
    public function exec(): void
    { 
        $this->searchUrl->urlAttack();
    }
}