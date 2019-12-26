<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for switchOrderEntryResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMSwitchOrderEntryResponse extends AbstractStructBase
{
    /**
     * The switchOrderEntryResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $switchOrderEntryResult;
    /**
     * Constructor method for switchOrderEntryResponse
     * @uses SMSwitchOrderEntryResponse::setSwitchOrderEntryResult()
     * @param string $switchOrderEntryResult
     */
    public function __construct($switchOrderEntryResult = null)
    {
        $this
            ->setSwitchOrderEntryResult($switchOrderEntryResult);
    }
    /**
     * Get switchOrderEntryResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSwitchOrderEntryResult()
    {
        return isset($this->switchOrderEntryResult) ? $this->switchOrderEntryResult : null;
    }
    /**
     * Set switchOrderEntryResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $switchOrderEntryResult
     * @return \SM\StructType\SMSwitchOrderEntryResponse
     */
    public function setSwitchOrderEntryResult($switchOrderEntryResult = null)
    {
        // validation for constraint: string
        if (!is_null($switchOrderEntryResult) && !is_string($switchOrderEntryResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($switchOrderEntryResult, true), gettype($switchOrderEntryResult)), __LINE__);
        }
        if (is_null($switchOrderEntryResult) || (is_array($switchOrderEntryResult) && empty($switchOrderEntryResult))) {
            unset($this->switchOrderEntryResult);
        } else {
            $this->switchOrderEntryResult = $switchOrderEntryResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMSwitchOrderEntryResponse
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
