<?php

class MenuWidget extends CWidget
{
    public $tpl;
    public $data; // будут храниться все записи категорий из базы данных таблицы category
    public $tree; // будет строить их обычного массива, дерево массива
    public $menuHtml; // будет храниться готовый html, в зависимости от шаблона, который сохранится в св-ве tpl

    public function init()
    {
        parent::init();
        if ($this->tpl == null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        //get cache
//        $menu = Yii::app()->cache->get('menu'); 
//        if($menu != null) return $menu;
        
        $this->data = Category::model()->findAll();


        //Преобразование объекта объектов в массив массивов
        $this->data= toArray($this->data);
       
        //Присвоение каждому массиву id равный внутренему id элемента массива
        $this->data = toId($this->data);
        
        $this->tree = $this->getTree();
        
        $this->menuHtml = $this->getMenuHtml($this->tree);
        
//        debug($this->tree);
//        echo $this->tpl;
        
        // set cache
//       Yii::app()->cache->set('menu', $this->menuHtml, 60);

       echo $this->menuHtml;
    }
    
    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}