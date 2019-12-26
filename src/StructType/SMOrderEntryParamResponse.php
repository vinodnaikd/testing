<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for orderEntryParamResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMOrderEntryParamResponse extends AbstractStructBase
{
    /**
     * The orderEntryParamResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $orderEntryParamResult;
    /**
     * Constructor method for orderEntryParamResponse
     * @uses SMOrderEntryParamResponse::setOrderEntryParamResult()
     * @param string $orderEntryParamResult
     */
    public function __construct($orderEntryParamResult = null)
    {
        $this
            ->setOrderEntryParamResult($orderEntryParamResult);
    }
    /**
     * Get orderEntryParamResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderEntryParamResult()
    {
        return isset($this->orderEntryParamResult) ? $this->orderEntryParamResult : null;
    }
    /**
     * Set orderEntryParamResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderEntryParamResult
     * @return \SM\StructType\SMOrderEntryParamResponse
     */
    public function setOrderEntryParamResult($orderEntryParamResult = null)
    {
        // validation for constraint: string
        if (!is_null($orderEntryParamResult) && !is_string($orderEntryParamResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($orderEntryParamResult, true), gettype($orderEntryParamResult)), __LINE__);
        }
        if (is_null($orderEntryParamResult) || (is_array($orderEntryParamResult) && empty($orderEntryParamResult))) {
            unset($this->orderEntryParamResult);
        } else {
            $this->orderEntryParamResult = $orderEntryParamResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMOrderEntryParamResponse
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
