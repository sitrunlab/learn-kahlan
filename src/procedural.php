<?php
namespace App;

/**
 * Echos string inside a `script` element
 *
 * @link http://devdocs.io/html/element/script
 * @param string $string The string to echo
 * @return Function echoing a string inside a script tag
 */
function echoScript( $string ) {
    return echoString("<script>{$string}</string>");
};

/**
 * Echos a string as a side-effect/mutation
 *
 * @todo https://wiki.php.net/rfc/void_return_type
 * @param string $string The string to echo
 */
function echoString( $string ) {
    echo $string;
};
