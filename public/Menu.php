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
        return $this->show($menu,$class);

    }

    public function showVert()
    {
        $menu = $this;
        $class = 'flex-column';
        return $this->show($menu,$class);
    }

    private function show($menu,$class){
        $contenido = "<nav class='navbar'><ul class='nav $class'><li class=\"nav-item active\"><a class=\"nav-link\" href='#'>$menu->title</a></li>";
        foreach ($menu->options as $option)
            $contenido .= "<li class='nav-item'><a class='nav-link' href='".$option['link']."'>".$option['show']."</a></li>";
         return $contenido;
    }
}