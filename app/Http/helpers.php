<?php

/**
 * Get name in specific language.
 *
 * @param  Object  $object
 * @param  String  $lang
 * @return String
 */
function localName($object, $lang = 'En')
{
    $lang      = ucwords($lang);
    $localName = "name{$lang}";
    return optional(json_decode($object->name))->$localName;
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
