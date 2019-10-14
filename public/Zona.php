<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-10-08
 * Time: 13:30
 */

class Zona
{
    private $tickets;
    private $title;

    /**
     * Zona constructor.
     * @param $tickets
     * @param $title
     */
    public function __construct($title, $tickets)
    {
        $this->tickets = $tickets;
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param mixed $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param $tickets
     */
    public function sellTickets($tickets)
    {

        $this->setTickets($this->getTickets() - $tickets);
    }

}