<?php

/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 06/01/15
 * Time: 22:14
 */

namespace AppBundle\Service;
use AppBundle\Events\UserEvent;

class MarketingSystem {

    public function postRequest(UserEvent $event) {
        
        $user = $event->getUser();
        
        echo "\nConnect to external Marketing System e.g. by CURL\n";

        return true;
    }

}
