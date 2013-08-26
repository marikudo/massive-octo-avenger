<?php

/*
* Autoloading models class and helpers
* 
*/

/*loading models automatically e.g. array('db','model1');
*default models
*	-db
*/
$config['models'] = array('db','crud','user','acl');

//Helpers
//e.g. array('default','helper1');
$config['helpers'] = array('generals','natsession');

//Libararies
$config['libraries'] = array('session','hash');