<?php

function setting($name)
{
    return \App\Setting::getSettingValue($name);
}

function cdn($path)
{
    $cdnDomain = 'http://source.90door.com';
    $cdnDomain = '';

    return $cdnDomain.$path;
}