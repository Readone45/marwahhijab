<?php

function site($key)
{
    $setting = \App\Models\Setting::where('key', $key)->first();
    return $setting->value;
}

function page($key)
{
    $setting = \App\Models\Page::where('key', $key)->first();
    return $setting->content;
}
