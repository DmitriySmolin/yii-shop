<?php


class ProductController extends AppContoller
{
    public function actionView($id)
    {
        $id = Yii::app()->request->getQuery('id');
        $product = Product::model()->findByPk($id);
        $product = Product::model()->with('category')->findByPk($id);

        return $this->render('view', compact('product'));
    }
}