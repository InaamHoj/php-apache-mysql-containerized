<?php
namespace Adherant;

class Adherant {
    public $id;
    // private $prospectId;
    // private $numAdhesion;
    // private $firstName;
    // private $lastName;
    // private $mobile;
    // private $email;
    // private $createdAt;
    // private $updatedAt;


    public function __construct($id) 
    {
        $this->id = rand();
    }

      public function getId() {
        return $this->id;
    }

    public function getProspectId() {
        return $this->prospectId;
    }

    public function setProspectId($prospectId) {
        $this->prospectId = $prospectId;
    }

    public function getNumAdhesion() {
        return $this->numAdhesion;
    }

    public function setNumAdhesion($numAdhesion) {
        $this->numAdhesion = $numAdhesion;
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

    public function addadheranttodb(){
    }

    public function findadherant(){}

}