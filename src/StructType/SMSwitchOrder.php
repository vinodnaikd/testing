<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SwitchOrder StructType
 * Meta informations extracted from the WSDL
 * - nillable: true
 * - type: tns:SwitchOrder
 * @package SM
 * @subpackage Structs
 */
class SMSwitchOrder extends AbstractStructBase
{
    /**
     * The AllUnitFlag
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $AllUnitFlag;
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
     * The ClientCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ClientCode;
    /**
     * The DPTxn
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DPTxn;
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
     * The FolioNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FolioNo;
    /**
     * The FromSchemeCd
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FromSchemeCd;
    /**
     * The IPAdd
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $IPAdd;
    /**
     * The KYCStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $KYCStatus;
    /**
     * The MemberId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MemberId;
    /**
     * The MinRedeem
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MinRedeem;
    /**
     * The OrderId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $OrderId;
    /**
     * The OrderVal
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $OrderVal;
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
     * The Remarks
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Remarks;
    /**
     * The SubBrCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SubBrCode;
    /**
     * The SwitchUnits
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SwitchUnits;
    /**
     * The ToSchemeCd
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ToSchemeCd;
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
     * The UserID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UserID;
    /**
     * Constructor method for SwitchOrder
     * @uses SMSwitchOrder::setAllUnitFlag()
     * @uses SMSwitchOrder::setBuySell()
     * @uses SMSwitchOrder::setBuySellType()
     * @uses SMSwitchOrder::setClientCode()
     * @uses SMSwitchOrder::setDPTxn()
     * @uses SMSwitchOrder::setEUIN()
     * @uses SMSwitchOrder::setEUINVal()
     * @uses SMSwitchOrder::setFolioNo()
     * @uses SMSwitchOrder::setFromSchemeCd()
     * @uses SMSwitchOrder::setIPAdd()
     * @uses SMSwitchOrder::setKYCStatus()
     * @uses SMSwitchOrder::setMemberId()
     * @uses SMSwitchOrder::setMinRedeem()
     * @uses SMSwitchOrder::setOrderId()
     * @uses SMSwitchOrder::setOrderVal()
     * @uses SMSwitchOrder::setParam1()
     * @uses SMSwitchOrder::setParam2()
     * @uses SMSwitchOrder::setParam3()
     * @uses SMSwitchOrder::setPassKey()
     * @uses SMSwitchOrder::setPassword()
     * @uses SMSwitchOrder::setRemarks()
     * @uses SMSwitchOrder::setSubBrCode()
     * @uses SMSwitchOrder::setSwitchUnits()
     * @uses SMSwitchOrder::setToSchemeCd()
     * @uses SMSwitchOrder::setTransCode()
     * @uses SMSwitchOrder::setTransNo()
     * @uses SMSwitchOrder::setUserID()
     * @param string $allUnitFlag
     * @param string $buySell
     * @param string $buySellType
     * @param string $clientCode
     * @param string $dPTxn
     * @param string $eUIN
     * @param string $eUINVal
     * @param string $folioNo
     * @param string $fromSchemeCd
     * @param string $iPAdd
     * @param string $kYCStatus
     * @param string $memberId
     * @param string $minRedeem
     * @param string $orderId
     * @param string $orderVal
     * @param string $param1
     * @param string $param2
     * @param string $param3
     * @param string $passKey
     * @param string $password
     * @param string $remarks
     * @param string $subBrCode
     * @param string $switchUnits
     * @param string $toSchemeCd
     * @param string $transCode
     * @param string $transNo
     * @param string $userID
     */
    public function __construct($allUnitFlag = null, $buySell = null, $buySellType = null, $clientCode = null, $dPTxn = null, $eUIN = null, $eUINVal = null, $folioNo = null, $fromSchemeCd = null, $iPAdd = null, $kYCStatus = null, $memberId = null, $minRedeem = null, $orderId = null, $orderVal = null, $param1 = null, $param2 = null, $param3 = null, $passKey = null, $password = null, $remarks = null, $subBrCode = null, $switchUnits = null, $toSchemeCd = null, $transCode = null, $transNo = null, $userID = null)
    {
        $this
            ->setAllUnitFlag($allUnitFlag)
            ->setBuySell($buySell)
            ->setBuySellType($buySellType)
            ->setClientCode($clientCode)
            ->setDPTxn($dPTxn)
            ->setEUIN($eUIN)
            ->setEUINVal($eUINVal)
            ->setFolioNo($folioNo)
            ->setFromSchemeCd($fromSchemeCd)
            ->setIPAdd($iPAdd)
            ->setKYCStatus($kYCStatus)
            ->setMemberId($memberId)
            ->setMinRedeem($minRedeem)
            ->setOrderId($orderId)
            ->setOrderVal($orderVal)
            ->setParam1($param1)
            ->setParam2($param2)
            ->setParam3($param3)
            ->setPassKey($passKey)
            ->setPassword($password)
            ->setRemarks($remarks)
            ->setSubBrCode($subBrCode)
            ->setSwitchUnits($switchUnits)
            ->setToSchemeCd($toSchemeCd)
            ->setTransCode($transCode)
            ->setTransNo($transNo)
            ->setUserID($userID);
    }
    /**
     * Get AllUnitFlag value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getAllUnitFlag()
    {
        return isset($this->AllUnitFlag) ? $this->AllUnitFlag : null;
    }
    /**
     * Set AllUnitFlag value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $allUnitFlag
     * @return \SM\StructType\SMSwitchOrder
     */
    public function setAllUnitFlag($allUnitFlag = null)
    {
        // validation for constraint: string
        if (!is_null($allUnitFlag) && !is_string($allUnitFlag)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($allUnitFlag, true), gettype($allUnitFlag)), __LINE__);
        }
        if (is_null($allUnitFlag) || (is_array($allUnitFlag) && empty($allUnitFlag))) {
            unset($this->AllUnitFlag);
        } else {
            $this->AllUnitFlag = $allUnitFlag;
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
     * @return \SM\StructType\SMSwitchOrder
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
