<?php
    function formatName($data=null){
        if ( isset($data['name']) && isset($data['lastname']) ) {
            return $data['name']." ".$data['lastname'];
        }
    }
?>
