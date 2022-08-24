<?php
include "Database.php";
date_default_timezone_set('Europe/Istanbul');

class Formule extends Database {
    private $id;
    private $name;
    private $code;
    private $description;
    private $createdAt;
    private $updatedAt;
    private $productId;

    private $db = null;

    public function __construct() {
      $database = new Database();
      $this->db = $database->connect();

        $this->setUpdatedAt(new \DateTime('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($this->getUpdatedAt());
        }

    }


    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function addproducttodb(){
    }

    public function findproduct(){
    }
}
