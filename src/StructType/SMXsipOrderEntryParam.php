<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for xsipOrderEntryParam StructType
 * @package SM
 * @subpackage Structs
 */
class SMXsipOrderEntryParam extends AbstractStructBase
{
    /**
     * The TransactionCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $TransactionCode;
    /**
     * The UniqueRefNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UniqueRefNo;
    /**
     * The SchemeCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SchemeCode;
    /**
     * The MemberCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MemberCode;
    /**
     * The ClientCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ClientCode;
    /**
     * The UserId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UserId;
    /**
     * The InternalRefNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $InternalRefNo;
    /**
     * The TransMode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $TransMode;
    /**
     * The DpTxnMode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DpTxnMode;
    /**
     * The StartDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $StartDate;
    /**
     * The FrequencyType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FrequencyType;
    /**
     * The FrequencyAllowed
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FrequencyAllowed;
    /**
     * The InstallmentAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $InstallmentAmount;
    /**
     * The NoOfInstallment
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $NoOfInstallment;
    /**
     * The Remarks
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Remarks;
    /**
     * The FolioNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FolioNo;
    /**
     * The FirstOrderFlag
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FirstOrderFlag;
    /**
     * The Brokerage
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Brokerage;
    /**
     * The MandateID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MandateID;
    /**
     * The SubberCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SubberCode;
    /**
     * The Euin
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Euin;
    /**
     * The EuinVal
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EuinVal;
    /**
     * The DPC
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DPC;
    /**
     * The XsipRegID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $XsipRegID;
    /**
     * The IPAdd
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $IPAdd;
    /**
     * The Password
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Password;
    /**
     * The PassKey
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PassKey;
    /**
     * The Param1
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Param1;
    /**
     * The Param2
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Param2;
    /**
     * The Param3
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Param3;
    /**
     * Constructor method for xsipOrderEntryParam
     * @uses SMXsipOrderEntryParam::setTransactionCode()
     * @uses SMXsipOrderEntryParam::setUniqueRefNo()
     * @uses SMXsipOrderEntryParam::setSchemeCode()
     * @uses SMXsipOrderEntryParam::setMemberCode()
     * @uses SMXsipOrderEntryParam::setClientCode()
     * @uses SMXsipOrderEntryParam::setUserId()
     * @uses SMXsipOrderEntryParam::setInternalRefNo()
     * @uses SMXsipOrderEntryParam::setTransMode()
     * @uses SMXsipOrderEntryParam::setDpTxnMode()
     * @uses SMXsipOrderEntryParam::setStartDate()
     * @uses SMXsipOrderEntryParam::setFrequencyType()
     * @uses SMXsipOrderEntryParam::setFrequencyAllowed()
     * @uses SMXsipOrderEntryParam::setInstallmentAmount()
     * @uses SMXsipOrderEntryParam::setNoOfInstallment()
     * @uses SMXsipOrderEntryParam::setRemarks()
     * @uses SMXsipOrderEntryParam::setFolioNo()
     * @uses SMXsipOrderEntryParam::setFirstOrderFlag()
     * @uses SMXsipOrderEntryParam::setBrokerage()
     * @uses SMXsipOrderEntryParam::setMandateID()
     * @uses SMXsipOrderEntryParam::setSubberCode()
     * @uses SMXsipOrderEntryParam::setEuin()
     * @uses SMXsipOrderEntryParam::setEuinVal()
     * @uses SMXsipOrderEntryParam::setDPC()
     * @uses SMXsipOrderEntryParam::setXsipRegID()
     * @uses SMXsipOrderEntryParam::setIPAdd()
     * @uses SMXsipOrderEntryParam::setPassword()
     * @uses SMXsipOrderEntryParam::setPassKey()
     * @uses SMXsipOrderEntryParam::setParam1()
     * @uses SMXsipOrderEntryParam::setParam2()
     * @uses SMXsipOrderEntryParam::setParam3()
     * @param string $transactionCode
     * @param string $uniqueRefNo
     * @param string $schemeCode
     * @param string $memberCode
     * @param string $clientCode
     * @param string $userId
     * @param string $internalRefNo
     * @param string $transMode
     * @param string $dpTxnMode
     * @param string $startDate
     * @param string $frequencyType
     * @param string $frequencyAllowed
     * @param string $installmentAmount
     * @param string $noOfInstallment
     * @param string $remarks
     * @param string $folioNo
     * @param string $firstOrderFlag
     * @param string $brokerage
     * @param string $mandateID
     * @param string $subberCode
     * @param string $euin
     * @param string $euinVal
     * @param string $dPC
     * @param string $xsipRegID
     * @param string $iPAdd
     * @param string $password
     * @param string $passKey
     * @param string $param1
     * @param string $param2
     * @param string $param3
     */
    public function __construct($transactionCode = null, $uniqueRefNo = null, $schemeCode = null, $memberCode = null, $clientCode = null, $userId = null, $internalRefNo = null, $transMode = null, $dpTxnMode = null, $startDate = null, $frequencyType = null, $frequencyAllowed = null, $installmentAmount = null, $noOfInstallment = null, $remarks = null, $folioNo = null, $firstOrderFlag = null, $brokerage = null, $mandateID = null, $subberCode = null, $euin = null, $euinVal = null, $dPC = null, $xsipRegID = null, $iPAdd = null, $password = null, $passKey = null, $param1 = null, $param2 = null, $param3 = null)
    {
        $this
            ->setTransactionCode($transactionCode)
            ->setUniqueRefNo($uniqueRefNo)
            ->setSchemeCode($schemeCode)
            ->setMemberCode($memberCode)
            ->setClientCode($clientCode)
            ->setUserId($userId)
            ->setInternalRefNo($internalRefNo)
            ->setTransMode($transMode)
            ->setDpTxnMode($dpTxnMode)
            ->setStartDate($startDate)
            ->setFrequencyType($frequencyType)
            ->setFrequencyAllowed($frequencyAllowed)
            ->setInstallmentAmount($installmentAmount)
            ->setNoOfInstallment($noOfInstallment)
            ->setRemarks($remarks)
            ->setFolioNo($folioNo)
            ->setFirstOrderFlag($firstOrderFlag)
            ->setBrokerage($brokerage)
            ->setMandateID($mandateID)
            ->setSubberCode($subberCode)
            ->setEuin($euin)
            ->setEuinVal($euinVal)
            ->setDPC($dPC)
            ->setXsipRegID($xsipRegID)
            ->setIPAdd($iPAdd)
            ->setPassword($password)
            ->setPassKey($passKey)
            ->setParam1($param1)
            ->setParam2($param2)
            ->setParam3($param3);
    }
    /**
     * Get TransactionCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getTransactionCode()
    {
        return isset($this->TransactionCode) ? $this->TransactionCode : null;
    }
    /**
     * Set TransactionCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $transactionCode
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setTransactionCode($transactionCode = null)
    {
        // validation for constraint: string
        if (!is_null($transactionCode) && !is_string($transactionCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($transactionCode, true), gettype($transactionCode)), __LINE__);
        }
        if (is_null($transactionCode) || (is_array($transactionCode) && empty($transactionCode))) {
            unset($this->TransactionCode);
        } else {
            $this->TransactionCode = $transactionCode;
        }
        return $this;
    }
    /**
     * Get UniqueRefNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getUniqueRefNo()
    {
        return isset($this->UniqueRefNo) ? $this->UniqueRefNo : null;
    }
    /**
     * Set UniqueRefNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $uniqueRefNo
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setUniqueRefNo($uniqueRefNo = null)
    {
        // validation for constraint: string
        if (!is_null($uniqueRefNo) && !is_string($uniqueRefNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($uniqueRefNo, true), gettype($uniqueRefNo)), __LINE__);
        }
        if (is_null($uniqueRefNo) || (is_array($uniqueRefNo) && empty($uniqueRefNo))) {
            unset($this->UniqueRefNo);
        } else {
            $this->UniqueRefNo = $uniqueRefNo;
        }
        return $this;
    }
    /**
     * Get SchemeCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSchemeCode()
    {
        return isset($this->SchemeCode) ? $this->SchemeCode : null;
    }
    /**
     * Set SchemeCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $schemeCode
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setSchemeCode($schemeCode = null)
    {
        // validation for constraint: string
        if (!is_null($schemeCode) && !is_string($schemeCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($schemeCode, true), gettype($schemeCode)), __LINE__);
        }
        if (is_null($schemeCode) || (is_array($schemeCode) && empty($schemeCode))) {
            unset($this->SchemeCode);
        } else {
            $this->SchemeCode = $schemeCode;
        }
        return $this;
    }
    /**
     * Get MemberCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMemberCode()
    {
        return isset($this->MemberCode) ? $this->MemberCode : null;
    }
    /**
     * Set MemberCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $memberCode
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setMemberCode($memberCode = null)
    {
        // validation for constraint: string
        if (!is_null($memberCode) && !is_string($memberCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($memberCode, true), gettype($memberCode)), __LINE__);
        }
        if (is_null($memberCode) || (is_array($memberCode) && empty($memberCode))) {
            unset($this->MemberCode);
        } else {
            $this->MemberCode = $memberCode;
        }
        return $this;
    }
    /**
     * Get ClientCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getClientCode()
    {
        return isset($this->ClientCode) ? $this->ClientCode : null;
    }
    /**
     * Set ClientCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $clientCode
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setClientCode($clientCode = null)
    {
        // validation for constraint: string
        if (!is_null($clientCode) && !is_string($clientCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($clientCode, true), gettype($clientCode)), __LINE__);
        }
        if (is_null($clientCode) || (is_array($clientCode) && empty($clientCode))) {
            unset($this->ClientCode);
        } else {
            $this->ClientCode = $clientCode;
        }
        return $this;
    }
    /**
     * Get UserId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getUserId()
    {
        return isset($this->UserId) ? $this->UserId : null;
    }
    /**
     * Set UserId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $userId
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setUserId($userId = null)
    {
        // validation for constraint: string
        if (!is_null($userId) && !is_string($userId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($userId, true), gettype($userId)), __LINE__);
        }
        if (is_null($userId) || (is_array($userId) && empty($userId))) {
            unset($this->UserId);
        } else {
            $this->UserId = $userId;
        }
        return $this;
    }
    /**
     * Get InternalRefNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getInternalRefNo()
    {
        return isset($this->InternalRefNo) ? $this->InternalRefNo : null;
    }
    /**
     * Set InternalRefNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $internalRefNo
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setInternalRefNo($internalRefNo = null)
    {
        // validation for constraint: string
        if (!is_null($internalRefNo) && !is_string($internalRefNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($internalRefNo, true), gettype($internalRefNo)), __LINE__);
        }
        if (is_null($internalRefNo) || (is_array($internalRefNo) && empty($internalRefNo))) {
            unset($this->InternalRefNo);
        } else {
            $this->InternalRefNo = $internalRefNo;
        }
        return $this;
    }
    /**
     * Get TransMode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getTransMode()
    {
        return isset($this->TransMode) ? $this->TransMode : null;
    }
    /**
     * Set TransMode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $transMode
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setTransMode($transMode = null)
    {
        // validation for constraint: string
        if (!is_null($transMode) && !is_string($transMode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($transMode, true), gettype($transMode)), __LINE__);
        }
        if (is_null($transMode) || (is_array($transMode) && empty($transMode))) {
            unset($this->TransMode);
        } else {
            $this->TransMode = $transMode;
        }
        return $this;
    }
    /**
     * Get DpTxnMode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDpTxnMode()
    {
        return isset($this->DpTxnMode) ? $this->DpTxnMode : null;
    }
    /**
     * Set DpTxnMode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dpTxnMode
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setDpTxnMode($dpTxnMode = null)
    {
        // validation for constraint: string
        if (!is_null($dpTxnMode) && !is_string($dpTxnMode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($dpTxnMode, true), gettype($dpTxnMode)), __LINE__);
        }
        if (is_null($dpTxnMode) || (is_array($dpTxnMode) && empty($dpTxnMode))) {
            unset($this->DpTxnMode);
        } else {
            $this->DpTxnMode = $dpTxnMode;
        }
        return $this;
    }
    /**
     * Get StartDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getStartDate()
    {
        return isset($this->StartDate) ? $this->StartDate : null;
    }
    /**
     * Set StartDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $startDate
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setStartDate($startDate = null)
    {
        // validation for constraint: string
        if (!is_null($startDate) && !is_string($startDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($startDate, true), gettype($startDate)), __LINE__);
        }
        if (is_null($startDate) || (is_array($startDate) && empty($startDate))) {
            unset($this->StartDate);
        } else {
            $this->StartDate = $startDate;
        }
        return $this;
    }
    /**
     * Get FrequencyType value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFrequencyType()
    {
        return isset($this->FrequencyType) ? $this->FrequencyType : null;
    }
    /**
     * Set FrequencyType value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $frequencyType
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setFrequencyType($frequencyType = null)
    {
        // validation for constraint: string
        if (!is_null($frequencyType) && !is_string($frequencyType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($frequencyType, true), gettype($frequencyType)), __LINE__);
        }
        if (is_null($frequencyType) || (is_array($frequencyType) && empty($frequencyType))) {
            unset($this->FrequencyType);
        } else {
            $this->FrequencyType = $frequencyType;
        }
        return $this;
    }
    /**
     * Get FrequencyAllowed value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFrequencyAllowed()
    {
        return isset($this->FrequencyAllowed) ? $this->FrequencyAllowed : null;
    }
    /**
     * Set FrequencyAllowed value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $frequencyAllowed
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setFrequencyAllowed($frequencyAllowed = null)
    {
        // validation for constraint: string
        if (!is_null($frequencyAllowed) && !is_string($frequencyAllowed)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($frequencyAllowed, true), gettype($frequencyAllowed)), __LINE__);
        }
        if (is_null($frequencyAllowed) || (is_array($frequencyAllowed) && empty($frequencyAllowed))) {
            unset($this->FrequencyAllowed);
        } else {
            $this->FrequencyAllowed = $frequencyAllowed;
        }
        return $this;
    }
    /**
     * Get InstallmentAmount value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getInstallmentAmount()
    {
        return isset($this->InstallmentAmount) ? $this->InstallmentAmount : null;
    }
    /**
     * Set InstallmentAmount value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $installmentAmount
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setInstallmentAmount($installmentAmount = null)
    {
        // validation for constraint: string
        if (!is_null($installmentAmount) && !is_string($installmentAmount)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($installmentAmount, true), gettype($installmentAmount)), __LINE__);
        }
        if (is_null($installmentAmount) || (is_array($installmentAmount) && empty($installmentAmount))) {
            unset($this->InstallmentAmount);
        } else {
            $this->InstallmentAmount = $installmentAmount;
        }
        return $this;
    }
    /**
     * Get NoOfInstallment value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getNoOfInstallment()
    {
        return isset($this->NoOfInstallment) ? $this->NoOfInstallment : null;
    }
    /**
     * Set NoOfInstallment value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $noOfInstallment
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setNoOfInstallment($noOfInstallment = null)
    {
        // validation for constraint: string
        if (!is_null($noOfInstallment) && !is_string($noOfInstallment)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($noOfInstallment, true), gettype($noOfInstallment)), __LINE__);
        }
        if (is_null($noOfInstallment) || (is_array($noOfInstallment) && empty($noOfInstallment))) {
            unset($this->NoOfInstallment);
        } else {
            $this->NoOfInstallment = $noOfInstallment;
        }
        return $this;
    }
    /**
     * Get Remarks value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getRemarks()
    {
        return isset($this->Remarks) ? $this->Remarks : null;
    }
    /**
     * Set Remarks value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $remarks
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setRemarks($remarks = null)
    {
        // validation for constraint: string
        if (!is_null($remarks) && !is_string($remarks)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($remarks, true), gettype($remarks)), __LINE__);
        }
        if (is_null($remarks) || (is_array($remarks) && empty($remarks))) {
            unset($this->Remarks);
        } else {
            $this->Remarks = $remarks;
        }
        return $this;
    }
    /**
     * Get FolioNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFolioNo()
    {
        return isset($this->FolioNo) ? $this->FolioNo : null;
    }
    /**
     * Set FolioNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $folioNo
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setFolioNo($folioNo = null)
    {
        // validation for constraint: string
        if (!is_null($folioNo) && !is_string($folioNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($folioNo, true), gettype($folioNo)), __LINE__);
        }
        if (is_null($folioNo) || (is_array($folioNo) && empty($folioNo))) {
            unset($this->FolioNo);
        } else {
            $this->FolioNo = $folioNo;
        }
        return $this;
    }
    /**
     * Get FirstOrderFlag value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFirstOrderFlag()
    {
        return isset($this->FirstOrderFlag) ? $this->FirstOrderFlag : null;
    }
    /**
     * Set FirstOrderFlag value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $firstOrderFlag
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setFirstOrderFlag($firstOrderFlag = null)
    {
        // validation for constraint: string
        if (!is_null($firstOrderFlag) && !is_string($firstOrderFlag)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($firstOrderFlag, true), gettype($firstOrderFlag)), __LINE__);
        }
        if (is_null($firstOrderFlag) || (is_array($firstOrderFlag) && empty($firstOrderFlag))) {
            unset($this->FirstOrderFlag);
        } else {
            $this->FirstOrderFlag = $firstOrderFlag;
        }
        return $this;
    }
    /**
     * Get Brokerage value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBrokerage()
    {
        return isset($this->Brokerage) ? $this->Brokerage : null;
    }
    /**
     * Set Brokerage value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $brokerage
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setBrokerage($brokerage = null)
    {
        // validation for constraint: string
        if (!is_null($brokerage) && !is_string($brokerage)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($brokerage, true), gettype($brokerage)), __LINE__);
        }
        if (is_null($brokerage) || (is_array($brokerage) && empty($brokerage))) {
            unset($this->Brokerage);
        } else {
            $this->Brokerage = $brokerage;
        }
        return $this;
    }
    /**
     * Get MandateID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMandateID()
    {
        return isset($this->MandateID) ? $this->MandateID : null;
    }
    /**
     * Set MandateID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $mandateID
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setMandateID($mandateID = null)
    {
        // validation for constraint: string
        if (!is_null($mandateID) && !is_string($mandateID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($mandateID, true), gettype($mandateID)), __LINE__);
        }
        if (is_null($mandateID) || (is_array($mandateID) && empty($mandateID))) {
            unset($this->MandateID);
        } else {
            $this->MandateID = $mandateID;
        }
        return $this;
    }
    /**
     * Get SubberCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSubberCode()
    {
        return isset($this->SubberCode) ? $this->SubberCode : null;
    }
    /**
     * Set SubberCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $subberCode
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setSubberCode($subberCode = null)
    {
        // validation for constraint: string
        if (!is_null($subberCode) && !is_string($subberCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($subberCode, true), gettype($subberCode)), __LINE__);
        }
        if (is_null($subberCode) || (is_array($subberCode) && empty($subberCode))) {
            unset($this->SubberCode);
        } else {
            $this->SubberCode = $subberCode;
        }
        return $this;
    }
    /**
     * Get Euin value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEuin()
    {
        return isset($this->Euin) ? $this->Euin : null;
    }
    /**
     * Set Euin value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $euin
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setEuin($euin = null)
    {
        // validation for constraint: string
        if (!is_null($euin) && !is_string($euin)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($euin, true), gettype($euin)), __LINE__);
        }
        if (is_null($euin) || (is_array($euin) && empty($euin))) {
            unset($this->Euin);
        } else {
            $this->Euin = $euin;
        }
        return $this;
    }
    /**
     * Get EuinVal value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEuinVal()
    {
        return isset($this->EuinVal) ? $this->EuinVal : null;
    }
    /**
     * Set EuinVal value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $euinVal
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setEuinVal($euinVal = null)
    {
        // validation for constraint: string
        if (!is_null($euinVal) && !is_string($euinVal)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($euinVal, true), gettype($euinVal)), __LINE__);
        }
        if (is_null($euinVal) || (is_array($euinVal) && empty($euinVal))) {
            unset($this->EuinVal);
        } else {
            $this->EuinVal = $euinVal;
        }
        return $this;
    }
    /**
     * Get DPC value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDPC()
    {
        return isset($this->DPC) ? $this->DPC : null;
    }
    /**
     * Set DPC value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dPC
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setDPC($dPC = null)
    {
        // validation for constraint: string
        if (!is_null($dPC) && !is_string($dPC)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($dPC, true), gettype($dPC)), __LINE__);
        }
        if (is_null($dPC) || (is_array($dPC) && empty($dPC))) {
            unset($this->DPC);
        } else {
            $this->DPC = $dPC;
        }
        return $this;
    }
    /**
     * Get XsipRegID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getXsipRegID()
    {
        return isset($this->XsipRegID) ? $this->XsipRegID : null;
    }
    /**
     * Set XsipRegID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $xsipRegID
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setXsipRegID($xsipRegID = null)
    {
        // validation for constraint: string
        if (!is_null($xsipRegID) && !is_string($xsipRegID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($xsipRegID, true), gettype($xsipRegID)), __LINE__);
        }
        if (is_null($xsipRegID) || (is_array($xsipRegID) && empty($xsipRegID))) {
            unset($this->XsipRegID);
        } else {
            $this->XsipRegID = $xsipRegID;
        }
        return $this;
    }
    /**
     * Get IPAdd value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getIPAdd()
    {
        return isset($this->IPAdd) ? $this->IPAdd : null;
    }
    /**
     * Set IPAdd value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $iPAdd
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setIPAdd($iPAdd = null)
    {
        // validation for constraint: string
        if (!is_null($iPAdd) && !is_string($iPAdd)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($iPAdd, true), gettype($iPAdd)), __LINE__);
        }
        if (is_null($iPAdd) || (is_array($iPAdd) && empty($iPAdd))) {
            unset($this->IPAdd);
        } else {
            $this->IPAdd = $iPAdd;
        }
        return $this;
    }
    /**
     * Get Password value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPassword()
    {
        return isset($this->Password) ? $this->Password : null;
    }
    /**
     * Set Password value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $password
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setPassword($password = null)
    {
        // validation for constraint: string
        if (!is_null($password) && !is_string($password)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($password, true), gettype($password)), __LINE__);
        }
        if (is_null($password) || (is_array($password) && empty($password))) {
            unset($this->Password);
        } else {
            $this->Password = $password;
        }
        return $this;
    }
    /**
     * Get PassKey value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPassKey()
    {
        return isset($this->PassKey) ? $this->PassKey : null;
    }
    /**
     * Set PassKey value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $passKey
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setPassKey($passKey = null)
    {
        // validation for constraint: string
        if (!is_null($passKey) && !is_string($passKey)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($passKey, true), gettype($passKey)), __LINE__);
        }
        if (is_null($passKey) || (is_array($passKey) && empty($passKey))) {
            unset($this->PassKey);
        } else {
            $this->PassKey = $passKey;
        }
        return $this;
    }
    /**
     * Get Param1 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getParam1()
    {
        return isset($this->Param1) ? $this->Param1 : null;
    }
    /**
     * Set Param1 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $param1
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setParam1($param1 = null)
    {
        // validation for constraint: string
        if (!is_null($param1) && !is_string($param1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($param1, true), gettype($param1)), __LINE__);
        }
        if (is_null($param1) || (is_array($param1) && empty($param1))) {
            unset($this->Param1);
        } else {
            $this->Param1 = $param1;
        }
        return $this;
    }
    /**
     * Get Param2 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getParam2()
    {
        return isset($this->Param2) ? $this->Param2 : null;
    }
    /**
     * Set Param2 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $param2
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setParam2($param2 = null)
    {
        // validation for constraint: string
        if (!is_null($param2) && !is_string($param2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($param2, true), gettype($param2)), __LINE__);
        }
        if (is_null($param2) || (is_array($param2) && empty($param2))) {
            unset($this->Param2);
        } else {
            $this->Param2 = $param2;
        }
        return $this;
    }
    /**
     * Get Param3 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getParam3()
    {
        return isset($this->Param3) ? $this->Param3 : null;
    }
    /**
     * Set Param3 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $param3
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public function setParam3($param3 = null)
    {
        // validation for constraint: string
        if (!is_null($param3) && !is_string($param3)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($param3, true), gettype($param3)), __LINE__);
        }
        if (is_null($param3) || (is_array($param3) && empty($param3))) {
            unset($this->Param3);
        } else {
            $this->Param3 = $param3;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMXsipOrderEntryParam
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
