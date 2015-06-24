<?php

/**
 * Created by PhpStorm.
 * User: Radek
 * Date: 06/01/15
 * Time: 22:14
 */

namespace AppBundle\Service;
use AppBundle\Events\UserEvent;

class StatsSystem {

       public function postRequest(UserEvent $event) {
        echo "\nConnect to external Stats System e.g. by CURL\n";
        return true;
    }

}
