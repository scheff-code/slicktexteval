<?php

namespace App;

use App\Models\User;

class Route
{
    protected string $method;
    protected string $uri;
    protected static array $parts;
    protected static string $action;
    protected static int $recordId;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->setParts();
        $this->setAction();
        $this->setRecordId();

        if (strtolower($this->method) === 'post') {
            $this->handlePost();
        }

        include_once '../views/users/index.php';
    }

    public static function redirect($location = '/'): void
    {
        header('Location: ' . $location);
    }

    protected function handlePost(): void
    {
        $formName = $_POST['form-name'];
        if(str_contains($formName, 'create')) {
            $user = new User();
            $user->createUser();
        } elseif (str_contains($formName, 'delete')) {
            $user = new User();
            $user->deleteUser($_POST['id']);
        } elseif(str_contains($formName, 'edit')) {
            $user = new User();
            $user->updateUser();
        }
    }

    public static function getAction(): string
    {
        return self::$action;
    }

    public static function getRecordId(): int
    {
        return self::$recordId;
    }

    protected function setRecordId(): void
    {
        if (empty(self::$parts[3])) {
            self::$recordId = 0;
        } else {
            self::$recordId = (int) self::$parts[3];
        }
    }

    protected function setParts(): void
    {
        self::$parts = explode('/', $this->uri);
    }

    protected function setAction(): void
    {
        self::$action = (end(self::$parts) === '') ? 'index' : self::$parts[2];
    }
}
