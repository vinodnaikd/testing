<?php

namespace SM;

/**
 * Class which returns the class map definition
 * @package SM
 */
class SMClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get()
    {
        return array(
            'getPassword' => '\\SM\\StructType\\SMGetPassword',
            'getPasswordResponse' => '\\SM\\StructType\\SMGetPasswordResponse',
            'OrderEntry' => '\\SM\\StructType\\SMOrderEntry',
            'OrderEntryResponse' => '\\SM\\StructType\\SMOrderEntryResponse',
            'orderEntryParam' => '\\SM\\StructType\\SMOrderEntryParam',
            'orderEntryParamResponse' => '\\SM\\StructType\\SMOrderEntryParamResponse',
            'spreadOrderEntry' => '\\SM\\StructType\\SMSpreadOrderEntry',
            'spreadOrderEntryResponse' => '\\SM\\StructType\\SMSpreadOrderEntryResponse',
            'spreadOrderEntryParam' => '\\SM\\StructType\\SMSpreadOrderEntryParam',
            'spreadOrderEntryParamResponse' => '\\SM\\StructType\\SMSpreadOrderEntryParamResponse',
            'switchOrderEntry' => '\\SM\\StructType\\SMSwitchOrderEntry',
            'switchOrderEntryResponse' => '\\SM\\StructType\\SMSwitchOrderEntryResponse',
            'switchOrderEntryParam' => '\\SM\\StructType\\SMSwitchOrderEntryParam',
            'switchOrderEntryParamResponse' => '\\SM\\StructType\\SMSwitchOrderEntryParamResponse',
            'sipOrderEntry' => '\\SM\\StructType\\SMSipOrderEntry',
            'sipOrderEntryResponse' => '\\SM\\StructType\\SMSipOrderEntryResponse',
            'sipOrderEntryParam' => '\\SM\\StructType\\SMSipOrderEntryParam',
            'sipOrderEntryParamResponse' => '\\SM\\StructType\\SMSipOrderEntryParamResponse',
            'xsipOrderEntry' => '\\SM\\StructType\\SMXsipOrderEntry',
            'xsipOrderEntryResponse' => '\\SM\\StructType\\SMXsipOrderEntryResponse',
            'xsipOrderEntryParam' => '\\SM\\StructType\\SMXsipOrderEntryParam',
            'xsipOrderEntryParamResponse' => '\\SM\\StructType\\SMXsipOrderEntryParamResponse',
            'OrderData' => '\\SM\\StructType\\SMOrderData',
            'SpreadOrder' => '\\SM\\StructType\\SMSpreadOrder',
            'SwitchOrder' => '\\SM\\StructType\\SMSwitchOrder',
            'SipOrder' => '\\SM\\StructType\\SMSipOrder',
            'XsipOrder' => '\\SM\\StructType\\SMXsipOrder',
        );
    }
}
