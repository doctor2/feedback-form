<?php

namespace Services\Factory;

class StorageFactory
{
    /**
     * @param string $type
     * @return StorageFormat
     */
    public function getStorage(string $type): StorageFormat
    {
        switch ($type) {
            case 'csv_file':
                return new CsvFileFormat();
                break;
            case 'database':
                return new DatabaseFormat();
                break;
            default:
                throw new \Exception("Wrong storage type:" + type);
        }
    }
}