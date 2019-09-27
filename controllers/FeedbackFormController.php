<?php

namespace Controllers;

use Core\Controller;
use Services\Factory\StorageFactory;

class FeedbackFormController extends Controller
{
    private $path = "feedback/";

    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $this->view->generate('Форма обратной связи', $this->path . 'index.php');
    }

    public function store()
    {
        $storage = (new StorageFactory())->getStorage(FEEDBACK_FORM_STORAGE_FORMAT);

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $content = $_POST['content'];

        $errors = [];
        if ($this->isValid($errors)){
            $storage->saveData($name, $phone, $content);
        }

        if ($errors) {
            echo json_encode(['errors' => $errors, 'status' => 'error']);
        } else {
            echo json_encode(['status' => 'ok']);
        }
        die();
    }

    public function isValid(&$errors)
    {
        if (empty($_POST['name'])) {
            $errors[] = "Незаполнено поле имя";
        }
        if (empty($_POST['phone']) || !preg_match('/\+\d\(\d{3}\)\s\d{3}\-\d{4}/', $_POST['phone'])) {
            $errors[] = "Незаполнено поле телефон";
        }
        if (empty($_POST['token'])
            || !hash_equals($_SESSION['token'], $_POST['token'])
        ) {
            $errors[] = 'Ошибка отправки формы!';
        }

        return empty($errors);
    }
}

?>