<?php

function debug($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

//Преобразование объекта объектов в массив массивов
function toArray($obj) {
    $count_cats = count($obj);
    if ($count_cats > 0) {
        $arr_category = array();
        foreach ($obj as $cat)
            array_push($arr_category, $cat->attributes);
    }
    return $arr_category;
}

//Присвоение каждому массиву id равный внутренему id элемента массива
function toId($obj) {
    $new = array();
    foreach ($obj as $key => $val) {
        $new[$val['id']] = $val;
    }

    return $new;
}
