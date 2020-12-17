<?php

namespace App\Interfaces;

interface UrlShortInterface
{
    public function saveAndGetId($url_data);

    public function getLink($code);

    public function getShort($id);
}
