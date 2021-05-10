<?php

namespace app\models;

class Links extends \app\models\base\Links
{
    public function getFullShortLink()
    {
        $main = '';
        $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $parsedUrl = parse_url($actualLink);

        $main .= $parsedUrl['host'];

        if (!is_null($parsedUrl['port'])) {
            $main .= ':'.$parsedUrl['port'];
        }

        return  "http://" . $main . "/" . $this->short;
    }
}