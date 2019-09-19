<?php

namespace Core;

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    private $data = array();

    /**
     * @param null $key
     * @return array|mixed
     */
    public function getData($key = null)
    {
        if (is_null($key)) {
            return $this->data;
        } elseif (isset($this->data[$key])) {
            return $this->data[$key];
        }
    }

    /**
     * @param $key
     * @param $value
     */
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

}
