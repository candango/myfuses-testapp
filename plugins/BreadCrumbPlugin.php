<?php
class BreadCrumbPlugin extends AbstractPlugin {

    public function run() {
        $action = MyFuses::getInstance()->getCurrentAction();
        $circuit = $action->getCircuit();
        $items =  $this->buildTrack( $circuit );
        $items[] = $action->getName();
        MyFusesContext::setParameter("items", $items);
        ob_start();
        include "dspBreadCrumb.php";
        $breadCrumb = ob_get_contents();
        ob_end_clean();
        MyFusesContext::setParameter( "breadCrumb", $breadCrumb );
    }

    private function buildTrack( Circuit $circuit ) {
        $items = array();
        if( !is_null( $circuit->getParent() ) ) {
            $parents = $this->buildTrack($circuit->getParent());
            foreach ($parents as $parent) {
                $items[] = $parent;
            }
        }
        $items[] = $circuit->getName();
        return $items;
    }

}
