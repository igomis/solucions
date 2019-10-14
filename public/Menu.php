<?php


class Menu
{
    private $options;
    private $title;


    /**
     * Menu constructor.
     * @param $class
     */
    public function __construct($title)
    {
        $this->title = $title;
        $this->options = array();
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $option)
    {
        $this->options[] = $option;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    public function showHorit()
    {
        $menu = $this;
        $class = 'justify-content-center';
        include('./../view/menu.php');
    }

    public function showVert()
    {
        $menu = $this;
        $class = 'flex-column';
        include('./../view/menu.php');
    }


}