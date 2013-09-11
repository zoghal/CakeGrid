<?php

 foreach($actions as $title => $action){ 
    if ( isset($action['options']['type']) and $action['options']['type'] == 'postLink') {
        unset( $action['options']['type']);
   	    echo $this->Form->postLink($title, $action['url'], $action['options'] + array('class' => 'button'));

    }else
    {
        echo $this->Html->link($title, $action['url'], $action['options'] + array('class' => 'button')); 
    }
}
?>