<?php
class CakeGridEvent extends Object implements CakeEventListener {


/**
 * CakeGridEvent::implementedEvents()
 * 
 * @return
 */
	public function implementedEvents() {
		return array(
			'Controller.beforeConstruct'		=> array( 'callable' => 'beforeInitController' ),
		);
	}	
	
	
	
/**
 * CakeGridEvent::beforeInitController()
 * 
 * @param mixed $event
 * @return void
 */
  	public function beforeInitController(CakeEvent $event) {
		if(!Rita::isStation('front')) {
			$event->subject()->helpers[] = 'CakeGrid.Grid';
		}
    }


}
