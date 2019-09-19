# Feedback-form

## Установка проэкта
```
composer install

```
## Создание базы
```
CREATE DATABASE IF NOT EXISTS test_gulin; 
use test_gulin; 
CREATE TABLE IF NOT EXISTS feedbacks (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), phone varchar(50), content varchar(5000), created_at timestamp);

```

### Описание
```
В файле /settings.php настройки для соединения с базой данных и константа  FEEDBACK_FORM_STORAGE_FORMAT меняющая место хранения формы.
Фабрика находится в /services/factory/
Обработчик формы /controllers/FeedbackFormController.php
Форма создается из /resources/js/app.js на странице /views/feedback/index.php

```

