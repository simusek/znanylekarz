<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserEvent
 *
 * @author Mariusz Pabian <pabian.mariusz@gmail.com>
 */

namespace AppBundle\Events;

use Symfony\Component\EventDispatcher\Event;
use AppBundle\Model\User;

class UserEvent extends Event {

    protected $user;

    public function __construct(User $user) {

        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

}
