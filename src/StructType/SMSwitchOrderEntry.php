<?php

namespace SM\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for switchOrderEntry StructType
 * @package SM
 * @subpackage Structs
 */
class SMSwitchOrderEntry extends AbstractStructBase
{
    /**
     * The data
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \SM\StructType\SMSwitchOrder
     */
    public $data;
    /**
     * Constructor method for switchOrderEntry
     * @uses SMSwitchOrderEntry::setData()
     * @param \SM\StructType\SMSwitchOrder $data
     */
    public function __construct(\SM\StructType\SMSwitchOrder $data = null)
    {
        $this
            ->setData($data);
    }
    /**
     * Get data value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \SM\StructType\SMSwitchOrder|null
     */
    public function getData()
    {
        return isset($this->data) ? $this->data : null;
    }
    /**
     * Set data value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \SM\StructType\SMSwitchOrder $data
     * @return \SM\StructType\SMSwitchOrderEntry
     */
    public function setData(\SM\StructType\SMSwitchOrder $data = null)
    {
        if (is_null($data) || (is_array($data) && empty($data))) {
            unset($this->data);
        } else {
            $this->data = $data;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \SM\StructType\SMSwitchOrderEntry
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
