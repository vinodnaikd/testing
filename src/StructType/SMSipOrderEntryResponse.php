<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for sipOrderEntryResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMSipOrderEntryResponse extends AbstractStructBase
{
    /**
     * The sipOrderEntryResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $sipOrderEntryResult;
    /**
     * Constructor method for sipOrderEntryResponse
     * @uses SMSipOrderEntryResponse::setSipOrderEntryResult()
     * @param string $sipOrderEntryResult
     */
    public function __construct($sipOrderEntryResult = null)
    {
        $this
            ->setSipOrderEntryResult($sipOrderEntryResult);
    }
    /**
     * Get sipOrderEntryResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSipOrderEntryResult()
    {
        return isset($this->sipOrderEntryResult) ? $this->sipOrderEntryResult : null;
    }
    /**
     * Set sipOrderEntryResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $sipOrderEntryResult
     * @return \SM\StructType\SMSipOrderEntryResponse
     */
    public function setSipOrderEntryResult($sipOrderEntryResult = null)
    {
        // validation for constraint: string
        if (!is_null($sipOrderEntryResult) && !is_string($sipOrderEntryResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($sipOrderEntryResult, true), gettype($sipOrderEntryResult)), __LINE__);
        }
        if (is_null($sipOrderEntryResult) || (is_array($sipOrderEntryResult) && empty($sipOrderEntryResult))) {
            unset($this->sipOrderEntryResult);
        } else {
            $this->sipOrderEntryResult = $sipOrderEntryResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMSipOrderEntryResponse
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
