<?php

namespace SM\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Order ServiceType
 * @package SM
 * @subpackage Services
 */
class SMOrder extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named OrderEntry
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMOrderEntry $parameters
     * @return \SM\StructType\SMOrderEntryResponse|bool
     */
    public function OrderEntry(\SM\StructType\SMOrderEntry $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->OrderEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named orderEntryParam
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMOrderEntryParam $parameters
     * @return \SM\StructType\SMOrderEntryParamResponse|bool
     */
    public function orderEntryParam(\SM\StructType\SMOrderEntryParam $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->orderEntryParam($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \SM\StructType\SMOrderEntryParamResponse|\SM\StructType\SMOrderEntryResponse
     */
    public function getResult()
    {
        return parent::getResult();
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
