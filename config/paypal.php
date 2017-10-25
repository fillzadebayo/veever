<?php
return array(

/** set your paypal credential **/

'client_id' =>'AT7SUrDxqsSHf3gq9vNTe-F6LvJc11MGp2VOraG-BVTMUf9LBBXXSYCTQN9JSE-vQdbiVFV7J1csElvD',

'secret' => 'ECnL6z7NHCNIVbCY_enre0Wwr5JsWEHv31sYViUUTUDheR6HM1d9Bjb8TWufIEgTbThxriVlvPjWF6C5',

/**

* SDK configuration

*/

'settings' => array(

/**

* Available option 'sandbox' or 'live'

*/

'mode' => 'sandbox',

/**

* Specify the max request time in seconds

*/

'http.ConnectionTimeOut' => 1000,

/**

* Whether want to log to a file

*/

'log.LogEnabled' => true,

/**

* Specify the file that want to write on

*/

'log.FileName' => storage_path() . '/logs/paypal.log',

/**

* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'

*

* Logging is most verbose in the 'FINE' level and decreases as you

* proceed towards ERROR

*/

'log.LogLevel' => 'FINE'

),

);
?>
