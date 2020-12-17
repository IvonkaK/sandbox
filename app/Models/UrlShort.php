<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShort extends Model
{
    use HasFactory;

    /** @var integer */
    public $id;

    /** @var string */
    public $short;

    /** @var string */
    public $link;

    /**
     * @param string $short
     */
    public function setShort($short)
    {
        $this->setAttribute('short', $short);
    }

    public function getShort()
    {
        return $this->getAttribute('short');
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->setAttribute('link', $link);
    }

    public function getLink()
    {
        return $this->getAttribute('link');
    }
}
