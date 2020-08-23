<?php
class User
{

    // Connection
    private $conn;

    // Table
    private $db_table = "users";

    // Columns
    public $id;
    public $name;
    public $email;
    public $mobile;
    public $details;
    public $created;

    // Database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Fetch user single data
    public function getEmail()
    {
        $sqlQuery = "SELECT id FROM " . $this->db_table . " WHERE email = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->email);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
    }
    // Fetch user data
    public function getUsers()
    {
        $sqlQuery = "SELECT id, name, email, mobile, details, created FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // Create user
    public function createUser()
    {
        $sqlQuery = "INSERT INTO
                        " . $this->db_table . "
                    SET
                        name = :name, 
                        email = :email, 
                        mobile = :mobile, 
                        details = :details, 
                        created = :created";

        $stmt = $this->conn->prepare($sqlQuery);

        // Sanitize data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->mobile = htmlspecialchars(strip_tags($this->mobile));
        $this->details = htmlspecialchars(strip_tags($this->details));
        $this->created = htmlspecialchars(strip_tags($this->created));

        // Bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":details", $this->details);
        $stmt->bindParam(":created", $this->created);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
