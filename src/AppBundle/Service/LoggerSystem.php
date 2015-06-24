<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logger
 *
 * @author Mariusz Pabian <pabian.mariusz@gmail.com>
 */
namespace AppBundle\Service;
use AppBundle\Events\UserEvent;

class LoggerSystem {
    
    protected $logger;
    
    public function __construct($logger) {
        $this->logger = $logger;
    }
    public function onUserChange(UserEvent $event)
    {
        $user = $event->getUser();                
        $this->logger->info("Event. User id: ".$user->getId()." email was changed to ".$user->getEmail());
        
        echo "\nSuccessfully logged by File LoggerSystem.\n";
            
        
        
    }
}
