<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for sipOrderEntryParamResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMSipOrderEntryParamResponse extends AbstractStructBase
{
    /**
     * The sipOrderEntryParamResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $sipOrderEntryParamResult;
    /**
     * Constructor method for sipOrderEntryParamResponse
     * @uses SMSipOrderEntryParamResponse::setSipOrderEntryParamResult()
     * @param string $sipOrderEntryParamResult
     */
    public function __construct($sipOrderEntryParamResult = null)
    {
        $this
            ->setSipOrderEntryParamResult($sipOrderEntryParamResult);
    }
    /**
     * Get sipOrderEntryParamResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSipOrderEntryParamResult()
    {
        return isset($this->sipOrderEntryParamResult) ? $this->sipOrderEntryParamResult : null;
    }
    /**
     * Set sipOrderEntryParamResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $sipOrderEntryParamResult
     * @return \SM\StructType\SMSipOrderEntryParamResponse
     */
    public function setSipOrderEntryParamResult($sipOrderEntryParamResult = null)
    {
        // validation for constraint: string
        if (!is_null($sipOrderEntryParamResult) && !is_string($sipOrderEntryParamResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($sipOrderEntryParamResult, true), gettype($sipOrderEntryParamResult)), __LINE__);
        }
        if (is_null($sipOrderEntryParamResult) || (is_array($sipOrderEntryParamResult) && empty($sipOrderEntryParamResult))) {
            unset($this->sipOrderEntryParamResult);
        } else {
            $this->sipOrderEntryParamResult = $sipOrderEntryParamResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMSipOrderEntryParamResponse
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
