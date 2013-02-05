<?php

//don't allow other scripts to grab and execute our file
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

//include helper file

require_once (dirname(__FILE__).DS.'helper.php');
//require_once __DIR__ . 'helper.php';

$doc =& JFactory::getDocument();
$doc->addScript("/media/mod_fussball_de_widget/js/mod_fussball_de_widget.js");
$doc->addStyleSheet("/media/mod_fussball_de_widget/css/mod_fussball_de_widget.css");
$doc->addStyleSheet("/media/mod_fussball_de_widget/css/mod_fussball_de_widget_print.css");

//This is the parameter we get from our xml file above
$table_url = $params->get('table_url');
$scores_url = $params->get('scores_url');
$table_printurl = $params->get('table_printurl');
$scores_printurl = $params->get('scores_printurl');
$scores_id = $params->get('scores_id');
$table_id = $params->get('table_id');

//include template
require(JModuleHelper::getLayoutPath('mod_fussball_de_widget'));


?>