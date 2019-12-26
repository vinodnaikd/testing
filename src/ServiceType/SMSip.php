<?php

namespace SM\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Sip ServiceType
 * @package SM
 * @subpackage Services
 */
class SMSip extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named sipOrderEntry
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMSipOrderEntry $parameters
     * @return \SM\StructType\SMSipOrderEntryResponse|bool
     */
    public function sipOrderEntry(\SM\StructType\SMSipOrderEntry $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->sipOrderEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named sipOrderEntryParam
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMSipOrderEntryParam $parameters
     * @return \SM\StructType\SMSipOrderEntryParamResponse|bool
     */
    public function sipOrderEntryParam(\SM\StructType\SMSipOrderEntryParam $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->sipOrderEntryParam($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \SM\StructType\SMSipOrderEntryParamResponse|\SM\StructType\SMSipOrderEntryResponse
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
