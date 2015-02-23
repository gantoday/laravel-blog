<?php

function setting($name)
{
    $settings=\App\Setting::getSettingsArr();
    return $settings[$name];
}

function cdn($path)
{
    $cdnDomain = 'http://source.90door.com';
    $cdnDomain = '';

    return $cdnDomain.$path;
}