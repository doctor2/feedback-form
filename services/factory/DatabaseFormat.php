<?php


namespace Services\Factory;

use Models\FeedbackFormModel;

class DatabaseFormat implements StorageFormat
{

    public function saveData($name, $phone, $content)
    {
        $model = new FeedbackFormModel();

        $result = $model->add($name, $phone, $content);

        return $result;
    }
}