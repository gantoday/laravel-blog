<?php

function aaa()
{
    $settings=\App\Setting::all();
    return $settings->toArray();
}

function cdn($path)
{
    $cdnDomain = 'http://source.90door.com';

    return $cdnDomain.$path;
}