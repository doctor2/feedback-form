<?php

namespace Models;

use Core\Model;

class FeedbackFormModel extends Model
{
    function __construct()
    {
        parent:: __construct();
    }

    public function add($name, $phone, $content)
    {
        $name = escapeString($this->link, $name);
        $phone = escapeString($this->link, $phone);
        $content = escapeString($this->link, $content);

        $query = sprintf("INSERT INTO feedbacks (name, phone, content) VALUES (%s, %s, %s)", $name, $phone, $content);
        return mysqli_query($this->link, $query);
    }
}

?>