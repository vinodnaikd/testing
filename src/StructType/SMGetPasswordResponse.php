<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for getPasswordResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMGetPasswordResponse extends AbstractStructBase
{
    /**
     * The getPasswordResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $getPasswordResult;
    /**
     * Constructor method for getPasswordResponse
     * @uses SMGetPasswordResponse::setGetPasswordResult()
     * @param string $getPasswordResult
     */
    public function __construct($getPasswordResult = null)
    {
        $this
            ->setGetPasswordResult($getPasswordResult);
    }
    /**
     * Get getPasswordResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getGetPasswordResult()
    {
        return isset($this->getPasswordResult) ? $this->getPasswordResult : null;
    }
    /**
     * Set getPasswordResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $getPasswordResult
     * @return \SM\StructType\SMGetPasswordResponse
     */
    public function setGetPasswordResult($getPasswordResult = null)
    {
        // validation for constraint: string
        if (!is_null($getPasswordResult) && !is_string($getPasswordResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($getPasswordResult, true), gettype($getPasswordResult)), __LINE__);
        }
        if (is_null($getPasswordResult) || (is_array($getPasswordResult) && empty($getPasswordResult))) {
            unset($this->getPasswordResult);
        } else {
            $this->getPasswordResult = $getPasswordResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMGetPasswordResponse
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
