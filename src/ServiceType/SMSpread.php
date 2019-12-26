<?php

namespace SM\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Spread ServiceType
 * @package SM
 * @subpackage Services
 */
class SMSpread extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named spreadOrderEntry
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMSpreadOrderEntry $parameters
     * @return \SM\StructType\SMSpreadOrderEntryResponse|bool
     */
    public function spreadOrderEntry(\SM\StructType\SMSpreadOrderEntry $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->spreadOrderEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named spreadOrderEntryParam
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMSpreadOrderEntryParam $parameters
     * @return \SM\StructType\SMSpreadOrderEntryParamResponse|bool
     */
    public function spreadOrderEntryParam(\SM\StructType\SMSpreadOrderEntryParam $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->spreadOrderEntryParam($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \SM\StructType\SMSpreadOrderEntryParamResponse|\SM\StructType\SMSpreadOrderEntryResponse
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
