<?php


class AppContoller extends Controller
{
    public $title;

    public function setMeta($title = null, $keywords = null, $description = null)
    {
        //Добавление заголовка для вида
        $this->title = $title;

        //Добавление метатегов
        Yii::app()->clientScript->registerMetaTag($keywords, 'keywords');
        Yii::app()->clientScript->registerMetaTag($description, 'description');

    }
}