<?php

namespace Services\Factory;

use Services\FeedbackFormCsv;

class CsvFileFormat implements StorageFormat
{

    public function saveData($name, $phone, $content)
    {
        $file = new FeedbackFormCsv();

        $file->setCSV([
            'name' => $name,
            'phone' => $phone,
            'content' => $content,
            'created_at' => date("H:i:s")
        ]);
    }
}