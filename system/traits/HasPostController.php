<?php

namespace System\Traits;

trait HasPostController
{
    protected function imageTypeFilter($image): bool
    {
        $imagetypesRule = array('jpg', 'png', 'jpeg', 'webp', 'gif');
        if (isset($image)) {
            $imageType = explode('/', $image['type'])[1];
            if (in_array($imageType, $imagetypesRule))
                return true;
        }
        return false;
    }

    protected function timeCheck($timeValue): bool
    {
        $timeValue = $this->timeFilter($timeValue);
        $presentTime = strtotime('now') - (60 * 60 * 24);
        if ($presentTime <= $timeValue) {
            return true;
        }
        return false;
    }

    protected function timeFilter($time): string
    {
        return substr($time, 0, 10);
    }
}
