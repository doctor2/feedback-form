<?php

namespace Services;

class FeedbackFormCsv
{

    private $_csv_file = null;

    public function __construct()
    {
        $this->_csv_file = FEEDBACK_FORM_TEXT_FILE_PATH . '/' . date("d_m_Y") . '.csv'; //Записываем путь к файлу в переменную
    }

    public function setCSV(Array $csvData)
    {
        if (!file_exists($this->_csv_file)) {

            $handle = fopen($this->_csv_file, "w") or die("Unable to open file!");
            fputcsv($handle, ['Имя', 'Телефон', 'Контент', 'Время создания'], ";");
        } else {
            $handle = fopen($this->_csv_file, "a");
        }

        fputcsv($handle, $csvData, ";");

        fclose($handle); //Закрываем
    }

    /**
     * Метод для чтения из csv-файла. Возвращает массив с данными из csv
     * @return array;
     */
    public function getCSV()
    {
        $handle = fopen($this->_csv_file, "r"); //Открываем csv для чтения

        $array_line_full = array(); //Массив будет хранить данные из csv

        while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
            $array_line_full[] = $line; //Записываем строчки в массив
        }
        fclose($handle); //Закрываем файл
        return $array_line_full; //Возвращаем прочтенные данные
    }
}