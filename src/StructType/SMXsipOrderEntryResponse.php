<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for xsipOrderEntryResponse StructType
 * @package SM
 * @subpackage Structs
 */
class SMXsipOrderEntryResponse extends AbstractStructBase
{
    /**
     * The xsipOrderEntryResult
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $xsipOrderEntryResult;
    /**
     * Constructor method for xsipOrderEntryResponse
     * @uses SMXsipOrderEntryResponse::setXsipOrderEntryResult()
     * @param string $xsipOrderEntryResult
     */
    public function __construct($xsipOrderEntryResult = null)
    {
        $this
            ->setXsipOrderEntryResult($xsipOrderEntryResult);
    }
    /**
     * Get xsipOrderEntryResult value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getXsipOrderEntryResult()
    {
        return isset($this->xsipOrderEntryResult) ? $this->xsipOrderEntryResult : null;
    }
    /**
     * Set xsipOrderEntryResult value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $xsipOrderEntryResult
     * @return \SM\StructType\SMXsipOrderEntryResponse
     */
    public function setXsipOrderEntryResult($xsipOrderEntryResult = null)
    {
        // validation for constraint: string
        if (!is_null($xsipOrderEntryResult) && !is_string($xsipOrderEntryResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value %s, please provide a string, %s given', var_export($xsipOrderEntryResult, true), gettype($xsipOrderEntryResult)), __LINE__);
        }
        if (is_null($xsipOrderEntryResult) || (is_array($xsipOrderEntryResult) && empty($xsipOrderEntryResult))) {
            unset($this->xsipOrderEntryResult);
        } else {
            $this->xsipOrderEntryResult = $xsipOrderEntryResult;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMXsipOrderEntryResponse
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
