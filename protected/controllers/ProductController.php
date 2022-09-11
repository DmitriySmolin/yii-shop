<?php


class ProductController extends AppContoller
{
    public function actionView($id)
    {
        $id = Yii::app()->request->getQuery('id');
        $product = Product::model()->findByPk($id);
        $product = Product::model()->with('category')->findByPk($id);
        if (empty($product))
            throw new CHttpException(404, 'Такой продукта нет');

        $criteria = new CDbCriteria();
        $criteria->condition = 'hit = 1';
        $criteria->limit = 6;
        $hits = Product::model()->findAll($criteria);
        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product','hits'));
    }
}