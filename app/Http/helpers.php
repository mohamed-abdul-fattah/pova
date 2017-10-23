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
    $localTitle = "title{$lang}";
    return optional(json_decode($object->title))->$localTitle;
}
