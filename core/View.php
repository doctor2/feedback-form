<?php

namespace Core;

class View
{

    private $data = array();

    /**
     * @param null $key
     * @return array|mixed
     */
    public function getData($key = null)
    {
        if (is_null($key))
        {
            return $this->data;
        }
        elseif (isset($this->data[$key]))
        {
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

    /**
     * @param $title - заголовок страницы
     * @param string $template - имя шаблона страницы
     */
    public function generate($title, $template)
    {
        require_once './views/template.php';
    }
}
