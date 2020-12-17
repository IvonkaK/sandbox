<?php

namespace App\Repositories;

use App\Interfaces\UrlShortInterface;
use Illuminate\Support\Facades\DB;

class UrlShortRepository implements UrlShortInterface
{
    public function saveAndGetId($url_data): int
    {
        return DB::table('urls')->insertGetId($url_data);
    }

    public function getLink($code)
    {
        $result = DB::table('urls')
            ->select('link')
            ->where('short', $code)
            ->first();

        return json_decode(json_encode($result), true);
    }

    public function getShort($id)
    {
        $result = DB::table('urls')
            ->select('short')
            ->where('id', $id)
            ->first();

        return json_decode(json_encode($result), true);
    }
}
