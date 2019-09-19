<?php

namespace Services\Factory;

interface StorageFormat
{
    public function saveData($name, $phone, $content);
}