<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for switchOrderEntryParamResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMSwitchOrderEntryParamResponse extends AbstractStructBase
{
    /**
     * The switchOrderEntryParamResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $switchOrderEntryParamResult;
    /**
     * Constructor method for switchOrderEntryParamResponse
     * @uses SMSwitchOrderEntryParamResponse::setSwitchOrderEntryParamResult()
     * @param string $switchOrderEntryParamResult
     */
    public function __construct($switchOrderEntryParamResult = null)
    {
        $this
            ->setSwitchOrderEntryParamResult($switchOrderEntryParamResult);
    }
    /**
     * Get switchOrderEntryParamResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSwitchOrderEntryParamResult()
    {
        return isset($this->switchOrderEntryParamResult) ? $this->switchOrderEntryParamResult : null;
    }
    /**
     * Set switchOrderEntryParamResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $switchOrderEntryParamResult
     * @return \SM\StructType\SMSwitchOrderEntryParamResponse
     */
    public function setSwitchOrderEntryParamResult($switchOrderEntryParamResult = null)
    {
        // validation for constraint: string
        if (!is_null($switchOrderEntryParamResult) && !is_string($switchOrderEntryParamResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($switchOrderEntryParamResult, true), gettype($switchOrderEntryParamResult)), __LINE__);
        }
        if (is_null($switchOrderEntryParamResult) || (is_array($switchOrderEntryParamResult) && empty($switchOrderEntryParamResult))) {
            unset($this->switchOrderEntryParamResult);
        } else {
            $this->switchOrderEntryParamResult = $switchOrderEntryParamResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMSwitchOrderEntryParamResponse
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
