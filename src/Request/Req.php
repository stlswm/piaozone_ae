<?php

namespace stlswm\PiaoZoneAe\Request;

use stdClass;

/**
 * Class Req
 *
 * @package stlswm\PiaoZone\Request
 */
class Req extends stdClass
{
    /**
     * @return array
     */
    public function export(): array
    {
        $out = json_decode(json_encode($this), TRUE);
        if (!$out) {
            return [];
        }
        return $out;
    }
}