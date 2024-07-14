<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($username, $email, $password_1, $password_2) {
        $errors = [];

        if (empty($username)) { $errors[] = "Username is required"; }
        if (empty($email)) { $errors[] = "Email is required"; }
        if (empty($password_1)) { $errors[] = "Password is required"; }
        if ($password_1 != $password_2) {
            $errors[] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1";
        $stmt = $this->db->prepare($user_check_query);
        $stmt->execute([$username, $email]);
        $user = $stmt->fetch();

        if ($user) {
            if ($user['username'] === $username) {
                $errors[] = "Username already exists";
            }

            if ($user['email'] === $email) {
                $errors[] = "Email already exists";
            }
        }

        if (count($errors) == 0) {
            $password = password_hash($password_1, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$username, $email, $password]);

            $_SESSION['username'] = $username;
            //$_SESSION['success'] = "You are now logged in";
            header('Location: Navigation/index.php');
            exit();
        }

        return $errors;
    }

    public function login($username, $password) {
        $errors = [];

        if (empty($username)) { $errors[] = "Username is required"; }
        if (empty($password)) { $errors[] = "Password is required"; }

        if (count($errors) == 0) {
            $query = "SELECT * FROM users WHERE username = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('Location:Navigation/index.php');
                exit();
            } else {
                $errors[] = "Wrong username/password combination";
            }
        }

        return $errors;
    }
}
?>
