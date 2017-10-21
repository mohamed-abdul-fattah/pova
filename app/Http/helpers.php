<?php

/**
 * Get name in specific language.
 *
 * @param  Object  $object
 * @param  String  $lang
 * @return String
 */
function name($object, $lang = 'En')
{
    $localName = "name{$lang}";
    return optional(json_decode($object->name))->$localName;
}
