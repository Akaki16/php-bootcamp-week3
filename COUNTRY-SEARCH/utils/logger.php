<?php

/* define logger functions for debugging purposes */

function print_array(array $arr): void {
    echo '<pre>';
    print_r($arr);
    echo '<pre>';
}

function f_var_dump(mixed $data): void {
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
}