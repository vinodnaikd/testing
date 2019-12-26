<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SipOrder StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:SipOrder
 * @package SM
 * @subpackage Structs
 */
class SMSipOrder extends AbstractStructBase
{
    /**
     * The ClientCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ClientCode;
    /**
     * The DPC
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DPC;
    /**
     * The DPTxnMode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DPTxnMode;
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
     * The FirstOrderFlag
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FirstOrderFlag;
    /**
     * The FolioNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FolioNo;
    /**
     * The FrequencyAllowed
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FrequencyAllowed;
    /**
     * The FrequencyType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FrequencyType;
    /**
     * The IPAdd
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $IPAdd;
    /**
     * The InstallmentAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $InstallmentAmount;
    /**
     * The InternalRefNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $InternalRefNo;
    /**
     * The MemberCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MemberCode;
    /**
     * The NoOfInstallments
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $NoOfInstallments;
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
     * The PassKey
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PassKey;
    /**
     * The Password
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Password;
    /**
     * The RegId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $RegId;
    /**
     * The Remarks
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Remarks;
    /**
     * The SchemeCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SchemeCode;
    /**
     * The StartDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $StartDate;
    /**
     * The SubberCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SubberCode;
    /**
     * The TransMode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $TransMode;
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
     * The UserID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UserID;
    /**
     * Constructor method for SipOrder
     * @uses SMSipOrder::setClientCode()
     * @uses SMSipOrder::setDPC()
     * @uses SMSipOrder::setDPTxnMode()
     * @uses SMSipOrder::setEuin()
     * @uses SMSipOrder::setEuinVal()
     * @uses SMSipOrder::setFirstOrderFlag()
     * @uses SMSipOrder::setFolioNo()
     * @uses SMSipOrder::setFrequencyAllowed()
     * @uses SMSipOrder::setFrequencyType()
     * @uses SMSipOrder::setIPAdd()
     * @uses SMSipOrder::setInstallmentAmount()
     * @uses SMSipOrder::setInternalRefNo()
     * @uses SMSipOrder::setMemberCode()
     * @uses SMSipOrder::setNoOfInstallments()
     * @uses SMSipOrder::setParam1()
     * @uses SMSipOrder::setParam2()
     * @uses SMSipOrder::setParam3()
     * @uses SMSipOrder::setPassKey()
     * @uses SMSipOrder::setPassword()
     * @uses SMSipOrder::setRegId()
     * @uses SMSipOrder::setRemarks()
     * @uses SMSipOrder::setSchemeCode()
     * @uses SMSipOrder::setStartDate()
     * @uses SMSipOrder::setSubberCode()
     * @uses SMSipOrder::setTransMode()
     * @uses SMSipOrder::setTransactionCode()
     * @uses SMSipOrder::setUniqueRefNo()
     * @uses SMSipOrder::setUserID()
     * @param string $clientCode
     * @param string $dPC
     * @param string $dPTxnMode
     * @param string $euin
     * @param string $euinVal
     * @param string $firstOrderFlag
     * @param string $folioNo
     * @param string $frequencyAllowed
     * @param string $frequencyType
     * @param string $iPAdd
     * @param string $installmentAmount
     * @param string $internalRefNo
     * @param string $memberCode
     * @param string $noOfInstallments
     * @param string $param1
     * @param string $param2
     * @param string $param3
     * @param string $passKey
     * @param string $password
     * @param string $regId
     * @param string $remarks
     * @param string $schemeCode
     * @param string $startDate
     * @param string $subberCode
     * @param string $transMode
     * @param string $transactionCode
     * @param string $uniqueRefNo
     * @param string $userID
     */
    public function __construct($clientCode = null, $dPC = null, $dPTxnMode = null, $euin = null, $euinVal = null, $firstOrderFlag = null, $folioNo = null, $frequencyAllowed = null, $frequencyType = null, $iPAdd = null, $installmentAmount = null, $internalRefNo = null, $memberCode = null, $noOfInstallments = null, $param1 = null, $param2 = null, $param3 = null, $passKey = null, $password = null, $regId = null, $remarks = null, $schemeCode = null, $startDate = null, $subberCode = null, $transMode = null, $transactionCode = null, $uniqueRefNo = null, $userID = null)
    {
        $this
            ->setClientCode($clientCode)
            ->setDPC($dPC)
            ->setDPTxnMode($dPTxnMode)
            ->setEuin($euin)
            ->setEuinVal($euinVal)
            ->setFirstOrderFlag($firstOrderFlag)
            ->setFolioNo($folioNo)
            ->setFrequencyAllowed($frequencyAllowed)
            ->setFrequencyType($frequencyType)
            ->setIPAdd($iPAdd)
            ->setInstallmentAmount($installmentAmount)
            ->setInternalRefNo($internalRefNo)
            ->setMemberCode($memberCode)
            ->setNoOfInstallments($noOfInstallments)
            ->setParam1($param1)
            ->setParam2($param2)
            ->setParam3($param3)
            ->setPassKey($passKey)
            ->setPassword($password)
            ->setRegId($regId)
            ->setRemarks($remarks)
            ->setSchemeCode($schemeCode)
            ->setStartDate($startDate)
            ->setSubberCode($subberCode)
            ->setTransMode($transMode)
            ->setTransactionCode($transactionCode)
            ->setUniqueRefNo($uniqueRefNo)
            ->setUserID($userID);
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * Get DPTxnMode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDPTxnMode()
    {
        return isset($this->DPTxnMode) ? $this->DPTxnMode : null;
    }
    /**
     * Set DPTxnMode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dPTxnMode
     * @return \SM\StructType\SMSipOrder
     */
    public function setDPTxnMode($dPTxnMode = null)
    {
        // validation for constraint: string
        if (!is_null($dPTxnMode) && !is_string($dPTxnMode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($dPTxnMode, true), gettype($dPTxnMode)), __LINE__);
        }
        if (is_null($dPTxnMode) || (is_array($dPTxnMode) && empty($dPTxnMode))) {
            unset($this->DPTxnMode);
        } else {
            $this->DPTxnMode = $dPTxnMode;
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * Get NoOfInstallments value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getNoOfInstallments()
    {
        return isset($this->NoOfInstallments) ? $this->NoOfInstallments : null;
    }
    /**
     * Set NoOfInstallments value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $noOfInstallments
     * @return \SM\StructType\SMSipOrder
     */
    public function setNoOfInstallments($noOfInstallments = null)
    {
        // validation for constraint: string
        if (!is_null($noOfInstallments) && !is_string($noOfInstallments)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($noOfInstallments, true), gettype($noOfInstallments)), __LINE__);
        }
        if (is_null($noOfInstallments) || (is_array($noOfInstallments) && empty($noOfInstallments))) {
            unset($this->NoOfInstallments);
        } else {
            $this->NoOfInstallments = $noOfInstallments;
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * Get RegId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getRegId()
    {
        return isset($this->RegId) ? $this->RegId : null;
    }
    /**
     * Set RegId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $regId
     * @return \SM\StructType\SMSipOrder
     */
    public function setRegId($regId = null)
    {
        // validation for constraint: string
        if (!is_null($regId) && !is_string($regId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($regId, true), gettype($regId)), __LINE__);
        }
        if (is_null($regId) || (is_array($regId) && empty($regId))) {
            unset($this->RegId);
        } else {
            $this->RegId = $regId;
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * @return \SM\StructType\SMSipOrder
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
     * Get UserID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getUserID()
    {
        return isset($this->UserID) ? $this->UserID : null;
    }
    /**
     * Set UserID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $userID
     * @return \SM\StructType\SMSipOrder
     */
    public function setUserID($userID = null)
    {
        // validation for constraint: string
        if (!is_null($userID) && !is_string($userID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($userID, true), gettype($userID)), __LINE__);
        }
        if (is_null($userID) || (is_array($userID) && empty($userID))) {
            unset($this->UserID);
        } else {
            $this->UserID = $userID;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMSipOrder
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
