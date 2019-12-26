<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OrderEntryResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMOrderEntryResponse extends AbstractStructBase
{
    /**
     * The OrderEntryResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $OrderEntryResult;
    /**
     * Constructor method for OrderEntryResponse
     * @uses SMOrderEntryResponse::setOrderEntryResult()
     * @param string $orderEntryResult
     */
    public function __construct($orderEntryResult = null)
    {
        $this
            ->setOrderEntryResult($orderEntryResult);
    }
    /**
     * Get OrderEntryResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderEntryResult()
    {
        return isset($this->OrderEntryResult) ? $this->OrderEntryResult : null;
    }
    /**
     * Set OrderEntryResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderEntryResult
     * @return \SM\StructType\SMOrderEntryResponse
     */
    public function setOrderEntryResult($orderEntryResult = null)
    {
        // validation for constraint: string
        if (!is_null($orderEntryResult) && !is_string($orderEntryResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($orderEntryResult, true), gettype($orderEntryResult)), __LINE__);
        }
        if (is_null($orderEntryResult) || (is_array($orderEntryResult) && empty($orderEntryResult))) {
            unset($this->OrderEntryResult);
        } else {
            $this->OrderEntryResult = $orderEntryResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMOrderEntryResponse
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
