<?php

class CategoryController extends AppContoller
{
    public function actionIndex()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'hit = 1';
        $criteria->limit = 6;
        $hits = Product::model()->findAll($criteria);
//        debug($hits);
        $this->setMeta('E-SHOPPER');
        $this->render('index', compact('hits'));
    }

    public function actionView($id)
    {
//        $id = Yii::app()->request->getQuery('id');

        $category = Category::model()->findByPk($id);
        if (empty($category))
            throw new CHttpException(404, 'Такой категории нет');

        $criteria = new CDbCriteria();
        $criteria->condition = "category_id = $id";

//        $products = Product::model()->findAll($criteria);

        //Добавление пагинации на страницу с товарами
        $count = Product::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 3;
        $pages->applyLimit($criteria);
        $products = Product::model()->findAll($criteria);


        $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
        $this->render('view', compact('products', 'pages', 'category'));

        //        debug($products);

    }

    //Реализация поиска
    public function actionSearch()
    {
       $q = trim(Yii::app()->request->getQuery('q'));
        $this->setMeta('E-SHOPPER | Поиск:' . $q);
        if (!q)
           $this->render('search');

        $criteria = new CDbCriteria();

        $criteria->condition = 'name LIKE :q';
        $criteria->params = array(':q' => "%$q%");


        //Добавление пагинации на страницу с товарами
        $count = Product::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 3;
        $pages->applyLimit($criteria);
        $products = Product::model()->findAll($criteria);

        $this->render('search', compact('products', 'pages', 'q'));


    }
}