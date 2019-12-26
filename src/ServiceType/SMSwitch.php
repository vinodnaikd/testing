<?php

namespace SM\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Switch ServiceType
 * @package SM
 * @subpackage Services
 */
class SMSwitch extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named switchOrderEntry
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMSwitchOrderEntry $parameters
     * @return \SM\StructType\SMSwitchOrderEntryResponse|bool
     */
    public function switchOrderEntry(\SM\StructType\SMSwitchOrderEntry $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->switchOrderEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named switchOrderEntryParam
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMSwitchOrderEntryParam $parameters
     * @return \SM\StructType\SMSwitchOrderEntryParamResponse|bool
     */
    public function switchOrderEntryParam(\SM\StructType\SMSwitchOrderEntryParam $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->switchOrderEntryParam($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \SM\StructType\SMSwitchOrderEntryParamResponse|\SM\StructType\SMSwitchOrderEntryResponse
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
