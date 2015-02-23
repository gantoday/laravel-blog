<?php

function setting($name)
{
    return \App\Setting::getSettingValue($name);
}

function cdn($path)
{
    $cdnDomain = setting($cdn_domain);
    $cdnDomain = '';

    return $cdnDomain.$path;
}