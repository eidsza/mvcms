<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function setTemplateMessage($kind, $message){
 
    session::set('statusmessage','<div class="'.$kind.'">'.$message.'</div>');    
}

function clearTemplateMessage(){
 
    session::set('statusmessage','');    
}
?>
