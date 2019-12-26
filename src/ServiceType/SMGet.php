<?php

namespace SM\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Get ServiceType
 * @package SM
 * @subpackage Services
 */
class SMGet extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named getPassword
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \SM\StructType\SMGetPassword $parameters
     * @return \SM\StructType\SMGetPasswordResponse|bool
     */
    public function getPassword(\SM\StructType\SMGetPassword $parameters)
    {
        try {
            // self::getSoapClient()->_setSoapHeaders();
                
            // print_r($parameters);
            $this->setResult(self::getSoapClient()->getPassword($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \SM\StructType\SMGetPasswordResponse
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
