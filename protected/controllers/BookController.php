<?php

//class BookController extends Controller {

//    public function actionIndex() {
       
//        $model = new Book(); // создание экземпляра модели Book
        
        //Запись в колонку title
//        $model->title = 'Анна Каренина';
        
        //Запись в колонку author
//        $model->author = 'Л. Толстой';
        
        //Запись в колонку year
//        $model->year = '4444';
        
        // Сохранение в БД
//        $model->save(false); 
        
          //1. <--findByPk-->
          // Получаем книгу по id
//        $a = Book::model()->findByPk(4); 
//        echo $a->title;
        
          //2. <--findAllByPk-->
//          $array = array(4,5,6,7);
          // Получаем массив книг по массиву с id-шниками
//          $a = Book::model()->findAllByPk($array);
          
//          foreach($a as $one) {
//              echo $one->title.'<hr>';
//          }
        
        // 3.<--find-->
//            $num = 4;
            //Получаем книгу по условию, где id > num, array(':num' => $num) позволяет обезопасить от SQL-иньекций
//            $a = Book::model()->find('id>:num', array(':num' => $num));
//            echo $a->title;
            
        // 4.<--findAll-->
//            $num = 5;
            //Получаем массив книг по условию, где id > num, array(':num' => $num) позволяет обезопасить от SQL-иньекций
//            $a = Book::model()->findAll('id>:num', array(':num' => $num));
//            foreach($a as $one) {
//                echo $one->title.'<hr>';
//            }
        //5.<--findByAttributes-->
            //Получаем книгу по заданным атрибутам, если передан массив в атрибуте, возвращает первый попавшийся элемент
//            $a = Book::model()->findByAttributes(array('id'=>array(4,5,6),'title'=>'Война и мир'));
//            echo $a->title;
//    }
    
       //6.<--findAllByAttributes-->
            //Получаем книгу по заданным атрибутам, если передан массив в атрибуте, возвращает первый попавшийся элемент
//            $a = Book::model()->findAllByAttributes(array('id'=>array(4,5,6),'title'=>'Война и мир'));
            
        
//    }
    
    /**
     * Поиск
     
     * findByPk поиск по ключу, возвращает одну запись
     * findAllByPk поиск по массиву ключей, возвращает массив записей
     * find
     * findAll
     * findByAttributes
     * findAllByAttributes
     * findBySQL
     * findAllBySQL
     * count
     * countBySQL
     * exists
     
     * Обновление
     * updateAll
     * updateByPk
     
     * Удаление
     * deleteAll
     * deleteByPk 
     
     */

//}
