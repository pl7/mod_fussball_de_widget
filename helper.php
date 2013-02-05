<?php

class ModFussballDeWidgetHelper {
    public function getItems($userCount) {
        
        $db = &JFactory::getDBO();
        
        $query = 'SELECT * FROM `svw_users`LIMIT 2';
        
        $db->setQuery($query);
        
        $items = ($items = $db->loadObjectList())?$items:array(); // loads results in an array
        
        return $items;
    }
}
?>