<?php
include "connect.php";
date_default_timezone_set('Europe/Istanbul');

class Prospect {
    private $id;
    private $firstName;
    private $lastName;
    private $password;
    private $mobile;
    private $email;
    private $createdAt;
    private $updatedAt;

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

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getMobile() {
        return $this->mobile;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
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

    public function addtodb(){

      $query = $this->db->prepare("INSERT INTO prospect (firstName, lastName, email, password, mobile, createdAt, updatedAt) VALUES (?,?,?,?,?,?,?)");
      $query->execute([
          $this->firstName,
          $this->lastName,
          $this->email,
          $this->password,
          $this->mobile,
          $this->createdAt->format('Y-m-d'),
          $this->updatedAt->format('Y-m-d')
      ]);
      return $query;
    }

    
}
