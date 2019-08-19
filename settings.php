<?php 

//Path definitions
Defined("ROOT_PATH")     || Define('ROOT_PATH', realpath(dirname(dirname(__file__))).DS);
Defined("FOLDER_PATH")   || Define('FOLDER_PATH', realpath(dirname(__file__)).DS);
//Project paths
Defined("TEMPLATE_PATH") || Define('TEMPLATE_PATH', FOLDER_PATH.'project'.DS.'templates'.DS);
Defined("PROJECT_PATH")  || Define('PROJECT_PATH', FOLDER_PATH.'project'.DS);
