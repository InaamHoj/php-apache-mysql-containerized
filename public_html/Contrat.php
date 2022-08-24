<?php
include "Database.php";
date_default_timezone_set('Europe/Istanbul');

class Contrat extends Database {
    private $id;
    private $startDate;
    private $endDate;
    private $createdAt;
    private $updatedAt;
    private $quotationId;
    private $adherantId;

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

    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
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

    public function getQuotationId() {
        return $this->quotationId;
    }

    public function setQuotationId($quotationId) {
        $this->quotationId = $quotationId;
    }

    public function getAdherantId() {
        return $this->adherantId;
    }

    public function setAdherantId($adherantId) {
        $this->adherantId = $adherantId;
    }

    public function addcontrattodb(){
    }

    public function findcontrat(){}

}