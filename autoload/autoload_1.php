<?php

function __autoload($classe) {
    if (file_exists('model/' . $classe . '.php')) {
        include_once 'model/' . $classe . '.php';
    } else if (file_exists('admin/model/config/' . $classe . '.php')) {
        include_once 'model/config/' . $classe . '.php';
    } else {
        print '<br />A classe ' . $classe . ' não existe';
    }
}
