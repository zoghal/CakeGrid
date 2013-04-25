<?php
class CakeGridEvent extends RitaBaseEvent  {
	
	
  	public function beforeInitController(CakeEvent $event) {
		if(Rita::isStation()) {
			$event->subject()->helpers[] = 'CakeGrid.Grid';
		}
    }


}
