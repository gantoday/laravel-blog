<?php

function setting($name)
{
    return \App\Setting::getSettingValue($name);
}

function cdn($path)
{
    if (setting('cdn_on') == '1') {
        return setting('cdn_domain').$path;
    } else {
        return $path;
    }
}

function description_trim($description, $limit = 500, $end = '...')
{
    $description = strip_tags(str_limit($description, $limit, $end));
    $description = str_replace("  ", "", $description);
    $description = str_replace("\n", "", $description);

    return $description;
}
