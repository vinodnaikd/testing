<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for spreadOrderEntryResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMSpreadOrderEntryResponse extends AbstractStructBase
{
    /**
     * The spreadOrderEntryResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $spreadOrderEntryResult;
    /**
     * Constructor method for spreadOrderEntryResponse
     * @uses SMSpreadOrderEntryResponse::setSpreadOrderEntryResult()
     * @param string $spreadOrderEntryResult
     */
    public function __construct($spreadOrderEntryResult = null)
    {
        $this
            ->setSpreadOrderEntryResult($spreadOrderEntryResult);
    }
    /**
     * Get spreadOrderEntryResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSpreadOrderEntryResult()
    {
        return isset($this->spreadOrderEntryResult) ? $this->spreadOrderEntryResult : null;
    }
    /**
     * Set spreadOrderEntryResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $spreadOrderEntryResult
     * @return \SM\StructType\SMSpreadOrderEntryResponse
     */
    public function setSpreadOrderEntryResult($spreadOrderEntryResult = null)
    {
        // validation for constraint: string
        if (!is_null($spreadOrderEntryResult) && !is_string($spreadOrderEntryResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($spreadOrderEntryResult, true), gettype($spreadOrderEntryResult)), __LINE__);
        }
        if (is_null($spreadOrderEntryResult) || (is_array($spreadOrderEntryResult) && empty($spreadOrderEntryResult))) {
            unset($this->spreadOrderEntryResult);
        } else {
            $this->spreadOrderEntryResult = $spreadOrderEntryResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMSpreadOrderEntryResponse
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
