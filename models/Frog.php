<?php 
  class Frog {
    // DB stuff
    private $conn;
    private $table = 'frog';

    // Frog Properties
    public $color;
    public $weight;
    public $length;
    public $width;
    public $sex;
    public $live_cycle;
    public $description;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get frogs
    public function read() {
      // read query
      $query = 'SELECT * FROM ' . $this->table . '
                                ORDER BY
                                  created_at DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Frog
    public function read_single() {
          // raed query
          $query = 'SELECT * FROM ' . $this->table . '
                                    WHERE
                                      frog.id = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->colore = $row['colore'];
          $this->weight = $row['weight'];
          $this->length = $row['length'];
          $this->width = $row['width'];
          $this->sex = $row['sex'];
          $this->live_cycle = $row['live_cycle'];
          $this->description = $row['description'];
    }

    // Create Frog
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET color = :color, weight = :weight,  length = :length,  width = :width, sex = :sex, live_cycle = :live_cycle,  description = :description';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->color = htmlspecialchars(strip_tags($this->color));
          $this->weight = htmlspecialchars(strip_tags($this->weight));
          $this->length = htmlspecialchars(strip_tags($this->length));
          $this->width = htmlspecialchars(strip_tags($this->width));
          $this->sex = htmlspecialchars(strip_tags($this->sex));
          $this->live_cycle = htmlspecialchars(strip_tags($this->live_cycle));
          $this->description = htmlspecialchars(strip_tags($this->description));

          // Bind data
          $stmt->bindParam(':color', $this->color);
          $stmt->bindParam(':weight', $this->weight);
          $stmt->bindParam(':length', $this->length);
          $stmt->bindParam(':width', $this->width);
          $stmt->bindParam(':sex', $this->sex);
          $stmt->bindParam(':live_cycle', $this->live_cycle);
          $stmt->bindParam(':description', $this->description);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Frog
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET color = :color, weight = :weight,  length = :length,  width = :width, sex = :sex, live_cycle = :live_cycle,  description = :description
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->color = htmlspecialchars(strip_tags($this->color));
          $this->weight = htmlspecialchars(strip_tags($this->weight));
          $this->length = htmlspecialchars(strip_tags($this->length));
          $this->width = htmlspecialchars(strip_tags($this->width));
          $this->sex = htmlspecialchars(strip_tags($this->sex));
          $this->live_cycle = htmlspecialchars(strip_tags($this->live_cycle));
          $this->description = htmlspecialchars(strip_tags($this->description));
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':color', $this->color);
          $stmt->bindParam(':weight', $this->weight);
          $stmt->bindParam(':length', $this->length);
          $stmt->bindParam(':width', $this->width);
          $stmt->bindParam(':sex', $this->sex);
          $stmt->bindParam(':live_cycle', $this->live_cycle);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Frog
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }