<?php
require_once 'AppContoller.php';

class CategoryController extends AppContoller
{
    public function actionIndex()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'hit = 1';
        $criteria->limit = 6;
        $hits = Product::model()->findAll($criteria);
//        debug($hits);
        $this->render('index', compact('hits'));
    }

    public function actionView($id)
    {
        $id = Yii::app()->request->getQuery('id');
        $criteria = new CDbCriteria();
        $criteria->condition = "category_id = $id";
        $products = Product::model()->findAll($criteria);
//        debug($products);
        $this->render('view',compact('products'));
    }
}