<?php
function validation($title, $info){
    if(strlen($title) > 30 || !preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/', $title)){
        return false;
    }
    if(strlen($info) > 100){
        return false;
    }
    return true;
}
?>