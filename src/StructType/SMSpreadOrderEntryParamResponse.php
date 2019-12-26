<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for spreadOrderEntryParamResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMSpreadOrderEntryParamResponse extends AbstractStructBase
{
    /**
     * The spreadOrderEntryParamResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $spreadOrderEntryParamResult;
    /**
     * Constructor method for spreadOrderEntryParamResponse
     * @uses SMSpreadOrderEntryParamResponse::setSpreadOrderEntryParamResult()
     * @param string $spreadOrderEntryParamResult
     */
    public function __construct($spreadOrderEntryParamResult = null)
    {
        $this
            ->setSpreadOrderEntryParamResult($spreadOrderEntryParamResult);
    }
    /**
     * Get spreadOrderEntryParamResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSpreadOrderEntryParamResult()
    {
        return isset($this->spreadOrderEntryParamResult) ? $this->spreadOrderEntryParamResult : null;
    }
    /**
     * Set spreadOrderEntryParamResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $spreadOrderEntryParamResult
     * @return \SM\StructType\SMSpreadOrderEntryParamResponse
     */
    public function setSpreadOrderEntryParamResult($spreadOrderEntryParamResult = null)
    {
        // validation for constraint: string
        if (!is_null($spreadOrderEntryParamResult) && !is_string($spreadOrderEntryParamResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($spreadOrderEntryParamResult, true), gettype($spreadOrderEntryParamResult)), __LINE__);
        }
        if (is_null($spreadOrderEntryParamResult) || (is_array($spreadOrderEntryParamResult) && empty($spreadOrderEntryParamResult))) {
            unset($this->spreadOrderEntryParamResult);
        } else {
            $this->spreadOrderEntryParamResult = $spreadOrderEntryParamResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMSpreadOrderEntryParamResponse
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
