<?php
include "Database.php";
date_default_timezone_set('Europe/Istanbul');

class Quotation extends Database {
    private $id;
    private $dateStart;
    private $dateEnd;
    private $paid;
    private $datePayment;
    private $orderBankid;
    private $signed;
    private $dateSignature;
    private $signatureRef;
    private $tarif;
    private $ibanRefund;
    private $createdAt;
    private $updatedAt;
    private $prospectId;
    private $formuleId;

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

    public function getDateStart() {
        return $this->dateStart;
    }

    public function setDateStart($dateStart) {
        $this->dateStart = $dateStart;
    }

    public function getDateEnd() {
        return $this->dateEnd;
    }

    public function setDateEnd($dateEnd) {
        $this->dateEnd = $dateEnd;
    }

    public function getPaid() {
        return $this->paid;
    }

    public function setPaid($paid) {
        $this->paid = $paid;
    }
    
    public function getDatePayment() {
        return $this->datePayment;
    }
    
    public function setDatePayment($datePayment) {
        $this->datePayment = $datePayment;
    }

    public function getOrderBankId() {
        return $this->orderBankid;
    }

    public function setOrderBankId($orderBankid) {
        $this->orderBankid = $orderBankid;
    }

    public function getSigned() {
        return $this->signed;
    }

    public function setSigned($signed) {
        $this->signed = $signed;
    }

    public function getDateSignature() {
        return $this->dateSignature;
    }

    public function setDateSignature($dateSignature) {
        $this->dateSignature = $dateSignature;
    }

    public function getSignatureRef() {
        return $this->signatureRef;
    }

    public function setSignatureRef($signatureRef) {
        $this->signatureRef = $signatureRef;
    }

    public function getTarif() {
        return $this->tarif;
    }

    public function setTarif($tarif) {
        $this->tarif = $tarif;
    }

    public function getIbanRefund() {
        return $this->ibanRefund;
    }

    public function setIbanRefund($ibanRefund) {
        $this->ibanRefund = $ibanRefund;
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
    
    public function getProspectId() {
        return $this->prospectId;
    }

    public function setProspectId($prospectId) {
        $this->prospectId = $prospectId;
    }

    public function getFormuleId() {
        return $this->formuleId;
    }

    public function setFormuleId($formuleId) {
        $this->formuleId = $formuleId;
    }

    public function addquotationtodb(){
    }

    public function findquotation(){
    }
}
