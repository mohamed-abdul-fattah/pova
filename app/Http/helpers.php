<?php

/**
 * Get name in specific language.
 *
 * @param  Object  $object
 * @param  String  $lang
 * @return String
 */
function nameLocale($object, $lang = 'En')
{
    $lang      = ucwords($lang);
    $nameLocale = "name{$lang}";
    return optional(json_decode($object->name))->$nameLocale;
}

/**
 * Get title in specific language.
 *
 * @param  Object  $object
 * @param  String  $lang
 * @return String
 */
function localTitle($object, $lang = 'En')
{
    $lang       = ucwords($lang);
    $localTitle = "title{$lang}";
    return optional(json_decode($object->title))->$localTitle;
}
