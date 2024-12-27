<?php

class AuthController {
    private $conn;
    private $errorMsg = '';
    
    // Validation constants
    private const PASSWORD_MIN_LENGTH = 8;
    private const NAME_MIN_LENGTH = 2;
    private const NAME_MAX_LENGTH = 50;

    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    /**
     * Validate and handle login form submission
     * @param string $email User email
     * @param string $password User password
     * @return bool Success status
     */
    public function login(string $email, string $password): bool {
        // Validate email
        if (!$this->validateEmail($email)) {
            return false;
        }

        // Validate password format
        if (!$this->validatePasswordFormat($password)) {
            return false;
        }

        // Sanitize email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $sql = "SELECT user_id, password, name FROM user WHERE email = ?";
        
        try {
            $stmt = mysqli_prepare($this->conn, $sql);
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($user = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['logged_in'] = true;
                    
                    return true;
                }
            }
            
            $this->errorMsg = "Invalid email or password";
            return false;
            
        } catch (Exception $e) {
            error_log("Login error: " . $e->getMessage());
            $this->errorMsg = "An error occurred during login";
            return false;
        }
    }

    /**
     * Validate and handle user registration
     * @param array $userData User registration data
     * @return bool Success status
     */
    public function register(array $userData): bool {
        // Validate all input fields
        if (!$this->validateRegistrationData($userData)) {
            return false;
        }

        // Sanitize inputs
        $sanitizedData = $this->sanitizeRegistrationData($userData);

        // Check if email already exists
        if ($this->emailExists($sanitizedData['email'])) {
            $this->errorMsg = "Email already registered";
            return false;
        }

        // Hash password
        $hashedPassword = password_hash($sanitizedData['password'], PASSWORD_DEFAULT);

        // Insert new user
        $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
        
        try {
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, 'sss', 
                $sanitizedData['name'],
                $sanitizedData['email'],
                $hashedPassword
            );
            
            if (mysqli_stmt_execute($stmt)) { //successful insertion
                echo "function executed";
                // set session variables:
                $user_id = mysqli_insert_id($this->conn);
                $_SESSION['user_id'] = $user_id;
                $_SESSION['logged_in'] = true;
                $_SESSION['name'] = $sanitizedData['name'];
                //create streak for the user
                try{
                    insert_streak($this->conn,$user_id);
                    return true;
                }catch(Exception $e){
                    throw new Exception("Error in creating the streak: " . $e->getMessage());
                }
            }
            
            $this->errorMsg = "Registration failed";
            return false;
            
        } catch (Exception $e) {
            error_log("Registration error: " . $e->getMessage());
            $this->errorMsg = $e->getMessage();
            return false;
        }
    }

    /**
     * Validate registration data
     * @param array $data Registration data to validate
     * @return bool Validation status
     */
    private function validateRegistrationData(array $data): bool {
        // Check required fields
        $required = ['name', 'email', 'password', 'confirm_password'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                $this->errorMsg = "All fields are required";
                return false;
            }
        }

        // Validate name
        if (!$this->validateName($data['name'])) {
            return false;
        }

        // Validate email
        if (!$this->validateEmail($data['email'])) {
            return false;
        }

        // Validate password
        if (!$this->validatePassword($data['password'], $data['confirm_password'])) {
            return false;
        }


        return true;
    }

    /**
     * Validate name
     * @param string $name Name to validate
     * @return bool Validation status
     */
    private function validateName(string $name): bool {
        if (strlen($name) < self::NAME_MIN_LENGTH || strlen($name) > self::NAME_MAX_LENGTH) {
            $this->errorMsg = "Name must be between " . self::NAME_MIN_LENGTH . " and " . self::NAME_MAX_LENGTH . " characters";
            return false;
        }

        if (!preg_match('/^[a-zA-Z\s\'-]+$/', $name)) {
            $this->errorMsg = "Name can only contain letters, spaces, hyphens, and apostrophes";
            return false;
        }

        return true;
    }

    /**
     * Validate email
     * @param string $email Email to validate
     * @return bool Validation status
     */
    private function validateEmail(string $email): bool {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMsg = "Invalid email format";
            return false;
        }

        // Check email length
        if (strlen($email) > 254) {
            $this->errorMsg = "Email is too long";
            return false;
        }

        return true;
    }

    /**
     * Validate password format
     * @param string $password Password to validate
     * @return bool Validation status
     */
    private function validatePasswordFormat(string $password): bool {
        if (strlen($password) < self::PASSWORD_MIN_LENGTH) {
            $this->errorMsg = "Password must be at least " . self::PASSWORD_MIN_LENGTH . " characters";
            return false;
        }

        return true;
    }

    /**
     * Validate password and confirmation
     * @param string $password Password to validate
     * @param string $confirmPassword Password confirmation
     * @return bool Validation status
     */
    private function validatePassword(string $password, string $confirmPassword): bool {
        if (!$this->validatePasswordFormat($password)) {
            return false;
        }

        if ($password !== $confirmPassword) {
            $this->errorMsg = "Passwords do not match";
            return false;
        }

        // Check for password complexity
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/', $password)) {
            $this->errorMsg = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character";
            return false;
        }

        return true;
    }

    /**
     * Validate age
     * @param mixed $age Age to validate
     * @return bool Validation status
     */
    private function validateAge($age): bool {
        $age = filter_var($age, FILTER_VALIDATE_INT);
        
        if ($age === false || $age < self::AGE_MIN || $age > self::AGE_MAX) {
            $this->errorMsg = "Age must be between " . self::AGE_MIN . " and " . self::AGE_MAX;
            return false;
        }

        return true;
    }

    /**
     * Sanitize registration data
     * @param array $data Data to sanitize
     * @return array Sanitized data
     */
    private function sanitizeRegistrationData(array $data): array {
        return [
            'name' => htmlspecialchars(trim($data['name']), ENT_QUOTES, 'UTF-8'),
            'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
            'password' => $data['password']
        ];
    }

    /**
     * Check if email already exists
     * @param string $email Email to check
     * @return bool True if email exists
     */
    private function emailExists(string $email): bool {
        $sql = "SELECT user_id FROM user WHERE email = ?";
        
        try {
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            return mysqli_stmt_num_rows($stmt) > 0;
        } catch (Exception $e) {
            error_log("Email check error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Logout user and destroy session
     */
    public function logout(): void {
        session_unset();
        session_destroy();
    }

    /**
     * Get the last error message
     * @return string Error message
     */
    public function getError(): string {
        return $this->errorMsg;
    }

    /**
     * Check if user is logged in
     * @return bool Login status
     */
    public function isLoggedIn(): bool {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
}