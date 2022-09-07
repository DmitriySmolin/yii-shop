<?php

class Category extends CActiveRecord
{
    public  function tableName(){
        return 'category';
    }


    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //Связали таблицу categories с таблицей products, где параметр id таблицы categories соотвествуют параметру category_id таблицы Products
            'products' => array(self::HAS_MANY,'Product','category_id')
        );
    }
    
    	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}