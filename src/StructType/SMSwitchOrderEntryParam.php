<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for switchOrderEntryParam StructType
 * @package SM
 * @subpackage Structs
 */
class SMSwitchOrderEntryParam extends AbstractStructBase
{
    /**
     * The TransCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $TransCode;
    /**
     * The TransNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $TransNo;
    /**
     * The OrderId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $OrderId;
    /**
     * The UserId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UserId;
    /**
     * The MemberId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MemberId;
    /**
     * The ClientCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ClientCode;
    /**
     * The FromSchemeCd
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FromSchemeCd;
    /**
     * The ToSchemeCd
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ToSchemeCd;
    /**
     * The BuySell
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BuySell;
    /**
     * The BuySellType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BuySellType;
    /**
     * The DPTxn
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DPTxn;
    /**
     * The OrderVal
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $OrderVal;
    /**
     * The SwitchUnits
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SwitchUnits;
    /**
     * The AllUnitsFlag
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $AllUnitsFlag;
    /**
     * The FolioNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FolioNo;
    /**
     * The Remarks
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Remarks;
    /**
     * The KYCStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $KYCStatus;
    /**
     * The SubBrCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SubBrCode;
    /**
     * The EUIN
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EUIN;
    /**
     * The EUINVal
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $EUINVal;
    /**
     * The MinRedeem
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MinRedeem;
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
     * The Parma1
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Parma1;
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
     * Constructor method for switchOrderEntryParam
     * @uses SMSwitchOrderEntryParam::setTransCode()
     * @uses SMSwitchOrderEntryParam::setTransNo()
     * @uses SMSwitchOrderEntryParam::setOrderId()
     * @uses SMSwitchOrderEntryParam::setUserId()
     * @uses SMSwitchOrderEntryParam::setMemberId()
     * @uses SMSwitchOrderEntryParam::setClientCode()
     * @uses SMSwitchOrderEntryParam::setFromSchemeCd()
     * @uses SMSwitchOrderEntryParam::setToSchemeCd()
     * @uses SMSwitchOrderEntryParam::setBuySell()
     * @uses SMSwitchOrderEntryParam::setBuySellType()
     * @uses SMSwitchOrderEntryParam::setDPTxn()
     * @uses SMSwitchOrderEntryParam::setOrderVal()
     * @uses SMSwitchOrderEntryParam::setSwitchUnits()
     * @uses SMSwitchOrderEntryParam::setAllUnitsFlag()
     * @uses SMSwitchOrderEntryParam::setFolioNo()
     * @uses SMSwitchOrderEntryParam::setRemarks()
     * @uses SMSwitchOrderEntryParam::setKYCStatus()
     * @uses SMSwitchOrderEntryParam::setSubBrCode()
     * @uses SMSwitchOrderEntryParam::setEUIN()
     * @uses SMSwitchOrderEntryParam::setEUINVal()
     * @uses SMSwitchOrderEntryParam::setMinRedeem()
     * @uses SMSwitchOrderEntryParam::setIPAdd()
     * @uses SMSwitchOrderEntryParam::setPassword()
     * @uses SMSwitchOrderEntryParam::setPassKey()
     * @uses SMSwitchOrderEntryParam::setParma1()
     * @uses SMSwitchOrderEntryParam::setParam2()
     * @uses SMSwitchOrderEntryParam::setParam3()
     * @param string $transCode
     * @param string $transNo
     * @param string $orderId
     * @param string $userId
     * @param string $memberId
     * @param string $clientCode
     * @param string $fromSchemeCd
     * @param string $toSchemeCd
     * @param string $buySell
     * @param string $buySellType
     * @param string $dPTxn
     * @param string $orderVal
     * @param string $switchUnits
     * @param string $allUnitsFlag
     * @param string $folioNo
     * @param string $remarks
     * @param string $kYCStatus
     * @param string $subBrCode
     * @param string $eUIN
     * @param string $eUINVal
     * @param string $minRedeem
     * @param string $iPAdd
     * @param string $password
     * @param string $passKey
     * @param string $parma1
     * @param string $param2
     * @param string $param3
     */
    public function __construct($transCode = null, $transNo = null, $orderId = null, $userId = null, $memberId = null, $clientCode = null, $fromSchemeCd = null, $toSchemeCd = null, $buySell = null, $buySellType = null, $dPTxn = null, $orderVal = null, $switchUnits = null, $allUnitsFlag = null, $folioNo = null, $remarks = null, $kYCStatus = null, $subBrCode = null, $eUIN = null, $eUINVal = null, $minRedeem = null, $iPAdd = null, $password = null, $passKey = null, $parma1 = null, $param2 = null, $param3 = null)
    {
        $this
            ->setTransCode($transCode)
            ->setTransNo($transNo)
            ->setOrderId($orderId)
            ->setUserId($userId)
            ->setMemberId($memberId)
            ->setClientCode($clientCode)
            ->setFromSchemeCd($fromSchemeCd)
            ->setToSchemeCd($toSchemeCd)
            ->setBuySell($buySell)
            ->setBuySellType($buySellType)
            ->setDPTxn($dPTxn)
            ->setOrderVal($orderVal)
            ->setSwitchUnits($switchUnits)
            ->setAllUnitsFlag($allUnitsFlag)
            ->setFolioNo($folioNo)
            ->setRemarks($remarks)
            ->setKYCStatus($kYCStatus)
            ->setSubBrCode($subBrCode)
            ->setEUIN($eUIN)
            ->setEUINVal($eUINVal)
            ->setMinRedeem($minRedeem)
            ->setIPAdd($iPAdd)
            ->setPassword($password)
            ->setPassKey($passKey)
            ->setParma1($parma1)
            ->setParam2($param2)
            ->setParam3($param3);
    }
    /**
     * Get TransCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getTransCode()
    {
        return isset($this->TransCode) ? $this->TransCode : null;
    }
    /**
     * Set TransCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $transCode
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setTransCode($transCode = null)
    {
        // validation for constraint: string
        if (!is_null($transCode) && !is_string($transCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($transCode, true), gettype($transCode)), __LINE__);
        }
        if (is_null($transCode) || (is_array($transCode) && empty($transCode))) {
            unset($this->TransCode);
        } else {
            $this->TransCode = $transCode;
        }
        return $this;
    }
    /**
     * Get TransNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getTransNo()
    {
        return isset($this->TransNo) ? $this->TransNo : null;
    }
    /**
     * Set TransNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $transNo
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setTransNo($transNo = null)
    {
        // validation for constraint: string
        if (!is_null($transNo) && !is_string($transNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($transNo, true), gettype($transNo)), __LINE__);
        }
        if (is_null($transNo) || (is_array($transNo) && empty($transNo))) {
            unset($this->TransNo);
        } else {
            $this->TransNo = $transNo;
        }
        return $this;
    }
    /**
     * Get OrderId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderId()
    {
        return isset($this->OrderId) ? $this->OrderId : null;
    }
    /**
     * Set OrderId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderId
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setOrderId($orderId = null)
    {
        // validation for constraint: string
        if (!is_null($orderId) && !is_string($orderId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($orderId, true), gettype($orderId)), __LINE__);
        }
        if (is_null($orderId) || (is_array($orderId) && empty($orderId))) {
            unset($this->OrderId);
        } else {
            $this->OrderId = $orderId;
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * Get MemberId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMemberId()
    {
        return isset($this->MemberId) ? $this->MemberId : null;
    }
    /**
     * Set MemberId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $memberId
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setMemberId($memberId = null)
    {
        // validation for constraint: string
        if (!is_null($memberId) && !is_string($memberId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($memberId, true), gettype($memberId)), __LINE__);
        }
        if (is_null($memberId) || (is_array($memberId) && empty($memberId))) {
            unset($this->MemberId);
        } else {
            $this->MemberId = $memberId;
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * Get FromSchemeCd value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFromSchemeCd()
    {
        return isset($this->FromSchemeCd) ? $this->FromSchemeCd : null;
    }
    /**
     * Set FromSchemeCd value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $fromSchemeCd
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setFromSchemeCd($fromSchemeCd = null)
    {
        // validation for constraint: string
        if (!is_null($fromSchemeCd) && !is_string($fromSchemeCd)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($fromSchemeCd, true), gettype($fromSchemeCd)), __LINE__);
        }
        if (is_null($fromSchemeCd) || (is_array($fromSchemeCd) && empty($fromSchemeCd))) {
            unset($this->FromSchemeCd);
        } else {
            $this->FromSchemeCd = $fromSchemeCd;
        }
        return $this;
    }
    /**
     * Get ToSchemeCd value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getToSchemeCd()
    {
        return isset($this->ToSchemeCd) ? $this->ToSchemeCd : null;
    }
    /**
     * Set ToSchemeCd value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $toSchemeCd
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setToSchemeCd($toSchemeCd = null)
    {
        // validation for constraint: string
        if (!is_null($toSchemeCd) && !is_string($toSchemeCd)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($toSchemeCd, true), gettype($toSchemeCd)), __LINE__);
        }
        if (is_null($toSchemeCd) || (is_array($toSchemeCd) && empty($toSchemeCd))) {
            unset($this->ToSchemeCd);
        } else {
            $this->ToSchemeCd = $toSchemeCd;
        }
        return $this;
    }
    /**
     * Get BuySell value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBuySell()
    {
        return isset($this->BuySell) ? $this->BuySell : null;
    }
    /**
     * Set BuySell value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $buySell
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setBuySell($buySell = null)
    {
        // validation for constraint: string
        if (!is_null($buySell) && !is_string($buySell)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($buySell, true), gettype($buySell)), __LINE__);
        }
        if (is_null($buySell) || (is_array($buySell) && empty($buySell))) {
            unset($this->BuySell);
        } else {
            $this->BuySell = $buySell;
        }
        return $this;
    }
    /**
     * Get BuySellType value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBuySellType()
    {
        return isset($this->BuySellType) ? $this->BuySellType : null;
    }
    /**
     * Set BuySellType value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $buySellType
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setBuySellType($buySellType = null)
    {
        // validation for constraint: string
        if (!is_null($buySellType) && !is_string($buySellType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($buySellType, true), gettype($buySellType)), __LINE__);
        }
        if (is_null($buySellType) || (is_array($buySellType) && empty($buySellType))) {
            unset($this->BuySellType);
        } else {
            $this->BuySellType = $buySellType;
        }
        return $this;
    }
    /**
     * Get DPTxn value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDPTxn()
    {
        return isset($this->DPTxn) ? $this->DPTxn : null;
    }
    /**
     * Set DPTxn value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dPTxn
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setDPTxn($dPTxn = null)
    {
        // validation for constraint: string
        if (!is_null($dPTxn) && !is_string($dPTxn)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($dPTxn, true), gettype($dPTxn)), __LINE__);
        }
        if (is_null($dPTxn) || (is_array($dPTxn) && empty($dPTxn))) {
            unset($this->DPTxn);
        } else {
            $this->DPTxn = $dPTxn;
        }
        return $this;
    }
    /**
     * Get OrderVal value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderVal()
    {
        return isset($this->OrderVal) ? $this->OrderVal : null;
    }
    /**
     * Set OrderVal value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderVal
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setOrderVal($orderVal = null)
    {
        // validation for constraint: string
        if (!is_null($orderVal) && !is_string($orderVal)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($orderVal, true), gettype($orderVal)), __LINE__);
        }
        if (is_null($orderVal) || (is_array($orderVal) && empty($orderVal))) {
            unset($this->OrderVal);
        } else {
            $this->OrderVal = $orderVal;
        }
        return $this;
    }
    /**
     * Get SwitchUnits value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSwitchUnits()
    {
        return isset($this->SwitchUnits) ? $this->SwitchUnits : null;
    }
    /**
     * Set SwitchUnits value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $switchUnits
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setSwitchUnits($switchUnits = null)
    {
        // validation for constraint: string
        if (!is_null($switchUnits) && !is_string($switchUnits)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($switchUnits, true), gettype($switchUnits)), __LINE__);
        }
        if (is_null($switchUnits) || (is_array($switchUnits) && empty($switchUnits))) {
            unset($this->SwitchUnits);
        } else {
            $this->SwitchUnits = $switchUnits;
        }
        return $this;
    }
    /**
     * Get AllUnitsFlag value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getAllUnitsFlag()
    {
        return isset($this->AllUnitsFlag) ? $this->AllUnitsFlag : null;
    }
    /**
     * Set AllUnitsFlag value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $allUnitsFlag
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setAllUnitsFlag($allUnitsFlag = null)
    {
        // validation for constraint: string
        if (!is_null($allUnitsFlag) && !is_string($allUnitsFlag)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($allUnitsFlag, true), gettype($allUnitsFlag)), __LINE__);
        }
        if (is_null($allUnitsFlag) || (is_array($allUnitsFlag) && empty($allUnitsFlag))) {
            unset($this->AllUnitsFlag);
        } else {
            $this->AllUnitsFlag = $allUnitsFlag;
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * Get KYCStatus value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getKYCStatus()
    {
        return isset($this->KYCStatus) ? $this->KYCStatus : null;
    }
    /**
     * Set KYCStatus value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $kYCStatus
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setKYCStatus($kYCStatus = null)
    {
        // validation for constraint: string
        if (!is_null($kYCStatus) && !is_string($kYCStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($kYCStatus, true), gettype($kYCStatus)), __LINE__);
        }
        if (is_null($kYCStatus) || (is_array($kYCStatus) && empty($kYCStatus))) {
            unset($this->KYCStatus);
        } else {
            $this->KYCStatus = $kYCStatus;
        }
        return $this;
    }
    /**
     * Get SubBrCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSubBrCode()
    {
        return isset($this->SubBrCode) ? $this->SubBrCode : null;
    }
    /**
     * Set SubBrCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $subBrCode
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setSubBrCode($subBrCode = null)
    {
        // validation for constraint: string
        if (!is_null($subBrCode) && !is_string($subBrCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($subBrCode, true), gettype($subBrCode)), __LINE__);
        }
        if (is_null($subBrCode) || (is_array($subBrCode) && empty($subBrCode))) {
            unset($this->SubBrCode);
        } else {
            $this->SubBrCode = $subBrCode;
        }
        return $this;
    }
    /**
     * Get EUIN value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEUIN()
    {
        return isset($this->EUIN) ? $this->EUIN : null;
    }
    /**
     * Set EUIN value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $eUIN
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setEUIN($eUIN = null)
    {
        // validation for constraint: string
        if (!is_null($eUIN) && !is_string($eUIN)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($eUIN, true), gettype($eUIN)), __LINE__);
        }
        if (is_null($eUIN) || (is_array($eUIN) && empty($eUIN))) {
            unset($this->EUIN);
        } else {
            $this->EUIN = $eUIN;
        }
        return $this;
    }
    /**
     * Get EUINVal value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEUINVal()
    {
        return isset($this->EUINVal) ? $this->EUINVal : null;
    }
    /**
     * Set EUINVal value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $eUINVal
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setEUINVal($eUINVal = null)
    {
        // validation for constraint: string
        if (!is_null($eUINVal) && !is_string($eUINVal)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($eUINVal, true), gettype($eUINVal)), __LINE__);
        }
        if (is_null($eUINVal) || (is_array($eUINVal) && empty($eUINVal))) {
            unset($this->EUINVal);
        } else {
            $this->EUINVal = $eUINVal;
        }
        return $this;
    }
    /**
     * Get MinRedeem value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMinRedeem()
    {
        return isset($this->MinRedeem) ? $this->MinRedeem : null;
    }
    /**
     * Set MinRedeem value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $minRedeem
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setMinRedeem($minRedeem = null)
    {
        // validation for constraint: string
        if (!is_null($minRedeem) && !is_string($minRedeem)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($minRedeem, true), gettype($minRedeem)), __LINE__);
        }
        if (is_null($minRedeem) || (is_array($minRedeem) && empty($minRedeem))) {
            unset($this->MinRedeem);
        } else {
            $this->MinRedeem = $minRedeem;
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * Get Parma1 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getParma1()
    {
        return isset($this->Parma1) ? $this->Parma1 : null;
    }
    /**
     * Set Parma1 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $parma1
     * @return \SM\StructType\SMSwitchOrderEntryParam
     */
    public function setParma1($parma1 = null)
    {
        // validation for constraint: string
        if (!is_null($parma1) && !is_string($parma1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($parma1, true), gettype($parma1)), __LINE__);
        }
        if (is_null($parma1) || (is_array($parma1) && empty($parma1))) {
            unset($this->Parma1);
        } else {
            $this->Parma1 = $parma1;
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
     * @return \SM\StructType\SMSwitchOrderEntryParam
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
