<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Category cell
 */
class CategoryCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel("Categories");
        $categories = $this->Categories->find("all")
            ->select(['name','id']);
        $this->set("categories",$categories);
    }
}
