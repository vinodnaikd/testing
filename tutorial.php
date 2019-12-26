<?php
/**
 * This file aims to show you how to use this generated package.
 * In addition, the goal is to show which methods are available and the fist needed parameter(s)
 * You have to use an associative array such as:
 * - the key must be a constant beginning with WSDL_ from AbstractSoapClientbase class each generated ServiceType class extends this class
 * - the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)
 * $options = array(
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc?singleWsdl',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_TRACE => true,
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_LOGIN => 'you_secret_login',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_PASSWORD => 'you_secret_password',
 * );
 * etc....
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Minimal options
 */
$options = array(
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'http://bsestarmfdemo.bseindia.com/MFOrderEntry/MFOrder.svc?singleWsdl',
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => \SM\SMClassMap::get(),
     \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_SOAP_VERSION => 'SOAP_1_2',
);
/**
 * Samples for Get ServiceType
 */
// print_r($_POST);
$get = new \SM\ServiceType\SMGet($options);
/**
 * Sample call for getPassword operation/method
 */
$passwordReq = new \SM\StructType\SMGetPassword("3787201","@12345","abcdedghij");
if ($get->getPassword($passwordReq) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Samples for Order ServiceType
 */

