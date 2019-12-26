<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for getPassword StructType
 * @package SM
 * @subpackage Structs
 */
class SMGetPassword extends AbstractStructBase
{
    /**
     * The UserId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $UserId;
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
     * Constructor method for getPassword
     * @uses SMGetPassword::setUserId()
     * @uses SMGetPassword::setPassword()
     * @uses SMGetPassword::setPassKey()
     * @param string $userId
     * @param string $password
     * @param string $passKey
     */
    public function __construct($userId = null, $password = null, $passKey = null)
    {
        $this
            ->setUserId($userId)
            ->setPassword($password)
            ->setPassKey($passKey);
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
     * @return \SM\StructType\SMGetPassword
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
     * @return \SM\StructType\SMGetPassword
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
     * @return \SM\StructType\SMGetPassword
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
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMGetPassword
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
