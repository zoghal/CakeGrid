<?php
class CakeGridEvent extends RitaBaseEvent  {
	
	
  	public function beforeInitController(CakeEvent $event) {
		if(!Rita::isStation('front')) {
			$event->subject()->helpers[] = 'CakeGrid.Grid';
		}
    }


}
