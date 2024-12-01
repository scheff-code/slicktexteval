<?php

namespace App\Models;

use App\Route;
use App\Validation;

class User
{
    use Validation;

    public int $id = 0;
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $mobile_number = '';
    public string $address = '';
    public string $city = '';
    public string $state = '';
    public int $zip = 0;
    public string $created;
    public string $last_updated;

    protected array $rules = [
        'first_name' => [
            'required' => true,
            'type' => 's',
            'maxlength' => 128,
        ],
        'last_name' => [
            'required' => true,
            'type' => 's',
            'maxlength' => 128,
        ],
        'email' => [
            'required' => true,
            'type' => 'email',
            'maxlength' => 128,
        ],
        'mobile_number' => [
            'required' => true,
            'type' => 's',
            'maxlength' => 32,
        ],
        'address' => [
            'required' => true,
            'type' => 's',
            'maxlength' => 128,
        ],
        'city' => [
            'required' => true,
            'type' => 's',
            'maxlength' => 128,
        ],
        'state' => [
            'required' => true,
            'type' => 's',
            'maxlength' => 2,
        ],
        'zip' => [
            'required' => true,
            'type' => 'i',
        ]
    ];

    private DB $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMobileNumber(): string
    {
        return $this->mobile_number;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getZip(): int
    {
        return $this->zip;
    }

    /**
     * @param int|null $id
     * @return User|array|false|null
     */
    public function getUser(int $id = null): User|array|false|null
    {
        try {
            if (!is_null($id)) {
                $this->setUser($id);
                return $this;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param array $params - adding for a future feature, and/or pagination should the need arise
     * @return array
     *
     * @todo - add pagination, filtering using optional parameters
     */
    public function getUsers(array $params = []): array
    {
        return $this->db::query('SELECT * FROM users ORDER BY id')->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @return void
     */
    public function createUser(): void
    {
        $post = $_POST;
        $errors = $this->validate();
        if (!empty($errors)) {
            $_SESSION['errors'] = $this->errors;
            $location = '/users/create/' . $post['id'];
        } else {
            $sql = "INSERT INTO users (first_name, last_name, email, mobile_number, address, city, state, zip, created) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, '" . date('Y-m-d h:i:s') . "')";

            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sssssssi", $post['first_name'], $post['last_name'], $post['email'], $post['mobile_number'], $post['address'], $post['city'], $post['state'], $post['zip']);
            $stmt->execute();
            $stmt->close();

            $location = '/';
        }
        Route::redirect('/');
    }

    /**
     * @return void
     */
    public function updateUser(): void
    {
        $post = $_POST;
        $errors = $this->validate();
        if (!empty($errors)) {
            $_SESSION['errors'] = $this->errors;
            $location = '/users/edit/' . $post['id'];
        } else {
            $sql = "
            UPDATE
                users 
            SET 
                  first_name=?, 
                  last_name=?, 
                  email=?, 
                  mobile_number=?, 
                  address=?, 
                  city=?, 
                  state=?, 
                  zip=? 
            WHERE id=?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param(
                "sssssssii",
                $post['first_name'],
                $post['last_name'],
                $post['email'],
                $post['mobile_number'],
                $post['address'],
                $post['city'],
                $post['state'],
                $post['zip'],
                $post['id']
            );
            $stmt->execute();
            $stmt->close();

            $location = '/';
        }
        Route::redirect($location);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id): void
    {
        $sql = "DELETE FROM users WHERE id =?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        Route::redirect('/');
    }

    /**
     * @param int $id
     * @return void
     */
    protected function setUser($id): void
    {
        $record = $this->db::query('SELECT * FROM users WHERE id = ' . $id)->fetch_assoc();
        $this->id = $record['id'];
        $this->first_name = $record['first_name'];
        $this->last_name = $record['last_name'];
        $this->email = $record['email'];
        $this->mobile_number = $record['mobile_number'];
        $this->address = $record['address'];
        $this->city = $record['city'];
        $this->state = $record['state'];
        $this->zip = $record['zip'];
        $this->created = $record['created'];
        $this->last_updated = ($record['last_updated']) ?? '';
    }

}
