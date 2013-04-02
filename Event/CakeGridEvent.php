<?php
class CakeGridEvent extends RitaBaseEvent  {
	
//	public function implementedEvents(){
//		return array(
//			'Rita.getPageTypes' => array('callable' => 'getPageTypes' ,'priority' => 1 )	
//		);
//	}
//	
	
  	public function beforeInitController(CakeEvent $event) {

		 $event->subject()->helpers[] = 'CakeGrid.Grid';
    }


}
