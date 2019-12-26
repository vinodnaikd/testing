<?php

namespace SM\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Xsip ServiceType
 * @package SM
 * @subpackage Services
 */
class SMXsip extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named xsipOrderEntry
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMXsipOrderEntry $parameters
     * @return \SM\StructType\SMXsipOrderEntryResponse|bool
     */
    public function xsipOrderEntry(\SM\StructType\SMXsipOrderEntry $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->xsipOrderEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named xsipOrderEntryParam
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMXsipOrderEntryParam $parameters
     * @return \SM\StructType\SMXsipOrderEntryParamResponse|bool
     */
    public function xsipOrderEntryParam(\SM\StructType\SMXsipOrderEntryParam $parameters)
    {
        try {
            $this->setResult(self::getSoapClient()->xsipOrderEntryParam($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \SM\StructType\SMXsipOrderEntryParamResponse|\SM\StructType\SMXsipOrderEntryResponse
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
