<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for spreadOrderEntryParam StructType
 * @package SM
 * @subpackage Structs
 */
class SMSpreadOrderEntryParam extends AbstractStructBase
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
     * The OrderID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $OrderID;
    /**
     * The UserID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UserID;
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
     * The SchemeCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SchemeCode;
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
     * The OrderValue
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $OrderValue;
    /**
     * The RedemptionAmt
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $RedemptionAmt;
    /**
     * The AllUnitFlag
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $AllUnitFlag;
    /**
     * The RedeemDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $RedeemDate;
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
     * The RefNo
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $RefNo;
    /**
     * The SubBroCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SubBroCode;
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
     * The DPC
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DPC;
    /**
     * The IPAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $IPAddress;
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
     * Constructor method for spreadOrderEntryParam
     * @uses SMSpreadOrderEntryParam::setTransactionCode()
     * @uses SMSpreadOrderEntryParam::setUniqueRefNo()
     * @uses SMSpreadOrderEntryParam::setOrderID()
     * @uses SMSpreadOrderEntryParam::setUserID()
     * @uses SMSpreadOrderEntryParam::setMemberId()
     * @uses SMSpreadOrderEntryParam::setClientCode()
     * @uses SMSpreadOrderEntryParam::setSchemeCode()
     * @uses SMSpreadOrderEntryParam::setBuySell()
     * @uses SMSpreadOrderEntryParam::setBuySellType()
     * @uses SMSpreadOrderEntryParam::setDPTxn()
     * @uses SMSpreadOrderEntryParam::setOrderValue()
     * @uses SMSpreadOrderEntryParam::setRedemptionAmt()
     * @uses SMSpreadOrderEntryParam::setAllUnitFlag()
     * @uses SMSpreadOrderEntryParam::setRedeemDate()
     * @uses SMSpreadOrderEntryParam::setFolioNo()
     * @uses SMSpreadOrderEntryParam::setRemarks()
     * @uses SMSpreadOrderEntryParam::setKYCStatus()
     * @uses SMSpreadOrderEntryParam::setRefNo()
     * @uses SMSpreadOrderEntryParam::setSubBroCode()
     * @uses SMSpreadOrderEntryParam::setEUIN()
     * @uses SMSpreadOrderEntryParam::setEUINVal()
     * @uses SMSpreadOrderEntryParam::setMinRedeem()
     * @uses SMSpreadOrderEntryParam::setDPC()
     * @uses SMSpreadOrderEntryParam::setIPAddress()
     * @uses SMSpreadOrderEntryParam::setPassword()
     * @uses SMSpreadOrderEntryParam::setPassKey()
     * @uses SMSpreadOrderEntryParam::setParam1()
     * @uses SMSpreadOrderEntryParam::setParam2()
     * @uses SMSpreadOrderEntryParam::setParam3()
     * @param string $transactionCode
     * @param string $uniqueRefNo
     * @param string $orderID
     * @param string $userID
     * @param string $memberId
     * @param string $clientCode
     * @param string $schemeCode
     * @param string $buySell
     * @param string $buySellType
     * @param string $dPTxn
     * @param string $orderValue
     * @param string $redemptionAmt
     * @param string $allUnitFlag
     * @param string $redeemDate
     * @param string $folioNo
     * @param string $remarks
     * @param string $kYCStatus
     * @param string $refNo
     * @param string $subBroCode
     * @param string $eUIN
     * @param string $eUINVal
     * @param string $minRedeem
     * @param string $dPC
     * @param string $iPAddress
     * @param string $password
     * @param string $passKey
     * @param string $param1
     * @param string $param2
     * @param string $param3
     */
    public function __construct($transactionCode = null, $uniqueRefNo = null, $orderID = null, $userID = null, $memberId = null, $clientCode = null, $schemeCode = null, $buySell = null, $buySellType = null, $dPTxn = null, $orderValue = null, $redemptionAmt = null, $allUnitFlag = null, $redeemDate = null, $folioNo = null, $remarks = null, $kYCStatus = null, $refNo = null, $subBroCode = null, $eUIN = null, $eUINVal = null, $minRedeem = null, $dPC = null, $iPAddress = null, $password = null, $passKey = null, $param1 = null, $param2 = null, $param3 = null)
    {
        $this
            ->setTransactionCode($transactionCode)
            ->setUniqueRefNo($uniqueRefNo)
            ->setOrderID($orderID)
            ->setUserID($userID)
            ->setMemberId($memberId)
            ->setClientCode($clientCode)
            ->setSchemeCode($schemeCode)
            ->setBuySell($buySell)
            ->setBuySellType($buySellType)
            ->setDPTxn($dPTxn)
            ->setOrderValue($orderValue)
            ->setRedemptionAmt($redemptionAmt)
            ->setAllUnitFlag($allUnitFlag)
            ->setRedeemDate($redeemDate)
            ->setFolioNo($folioNo)
            ->setRemarks($remarks)
            ->setKYCStatus($kYCStatus)
            ->setRefNo($refNo)
            ->setSubBroCode($subBroCode)
            ->setEUIN($eUIN)
            ->setEUINVal($eUINVal)
            ->setMinRedeem($minRedeem)
            ->setDPC($dPC)
            ->setIPAddress($iPAddress)
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * Get OrderID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderID()
    {
        return isset($this->OrderID) ? $this->OrderID : null;
    }
    /**
     * Set OrderID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderID
     * @return \SM\StructType\SMSpreadOrderEntryParam
     */
    public function setOrderID($orderID = null)
    {
        // validation for constraint: string
        if (!is_null($orderID) && !is_string($orderID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($orderID, true), gettype($orderID)), __LINE__);
        }
        if (is_null($orderID) || (is_array($orderID) && empty($orderID))) {
            unset($this->OrderID);
        } else {
            $this->OrderID = $orderID;
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * Get OrderValue value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderValue()
    {
        return isset($this->OrderValue) ? $this->OrderValue : null;
    }
    /**
     * Set OrderValue value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderValue
     * @return \SM\StructType\SMSpreadOrderEntryParam
     */
    public function setOrderValue($orderValue = null)
    {
        // validation for constraint: string
        if (!is_null($orderValue) && !is_string($orderValue)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($orderValue, true), gettype($orderValue)), __LINE__);
        }
        if (is_null($orderValue) || (is_array($orderValue) && empty($orderValue))) {
            unset($this->OrderValue);
        } else {
            $this->OrderValue = $orderValue;
        }
        return $this;
    }
    /**
     * Get RedemptionAmt value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getRedemptionAmt()
    {
        return isset($this->RedemptionAmt) ? $this->RedemptionAmt : null;
    }
    /**
     * Set RedemptionAmt value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $redemptionAmt
     * @return \SM\StructType\SMSpreadOrderEntryParam
     */
    public function setRedemptionAmt($redemptionAmt = null)
    {
        // validation for constraint: string
        if (!is_null($redemptionAmt) && !is_string($redemptionAmt)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($redemptionAmt, true), gettype($redemptionAmt)), __LINE__);
        }
        if (is_null($redemptionAmt) || (is_array($redemptionAmt) && empty($redemptionAmt))) {
            unset($this->RedemptionAmt);
        } else {
            $this->RedemptionAmt = $redemptionAmt;
        }
        return $this;
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * Get RedeemDate value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getRedeemDate()
    {
        return isset($this->RedeemDate) ? $this->RedeemDate : null;
    }
    /**
     * Set RedeemDate value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $redeemDate
     * @return \SM\StructType\SMSpreadOrderEntryParam
     */
    public function setRedeemDate($redeemDate = null)
    {
        // validation for constraint: string
        if (!is_null($redeemDate) && !is_string($redeemDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($redeemDate, true), gettype($redeemDate)), __LINE__);
        }
        if (is_null($redeemDate) || (is_array($redeemDate) && empty($redeemDate))) {
            unset($this->RedeemDate);
        } else {
            $this->RedeemDate = $redeemDate;
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * Get RefNo value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getRefNo()
    {
        return isset($this->RefNo) ? $this->RefNo : null;
    }
    /**
     * Set RefNo value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $refNo
     * @return \SM\StructType\SMSpreadOrderEntryParam
     */
    public function setRefNo($refNo = null)
    {
        // validation for constraint: string
        if (!is_null($refNo) && !is_string($refNo)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($refNo, true), gettype($refNo)), __LINE__);
        }
        if (is_null($refNo) || (is_array($refNo) && empty($refNo))) {
            unset($this->RefNo);
        } else {
            $this->RefNo = $refNo;
        }
        return $this;
    }
    /**
     * Get SubBroCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSubBroCode()
    {
        return isset($this->SubBroCode) ? $this->SubBroCode : null;
    }
    /**
     * Set SubBroCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $subBroCode
     * @return \SM\StructType\SMSpreadOrderEntryParam
     */
    public function setSubBroCode($subBroCode = null)
    {
        // validation for constraint: string
        if (!is_null($subBroCode) && !is_string($subBroCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($subBroCode, true), gettype($subBroCode)), __LINE__);
        }
        if (is_null($subBroCode) || (is_array($subBroCode) && empty($subBroCode))) {
            unset($this->SubBroCode);
        } else {
            $this->SubBroCode = $subBroCode;
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * Get IPAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getIPAddress()
    {
        return isset($this->IPAddress) ? $this->IPAddress : null;
    }
    /**
     * Set IPAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $iPAddress
     * @return \SM\StructType\SMSpreadOrderEntryParam
     */
    public function setIPAddress($iPAddress = null)
    {
        // validation for constraint: string
        if (!is_null($iPAddress) && !is_string($iPAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($iPAddress, true), gettype($iPAddress)), __LINE__);
        }
        if (is_null($iPAddress) || (is_array($iPAddress) && empty($iPAddress))) {
            unset($this->IPAddress);
        } else {
            $this->IPAddress = $iPAddress;
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
     * @return \SM\StructType\SMSpreadOrderEntryParam
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
