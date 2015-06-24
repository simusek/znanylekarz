<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Events\UserEvent;

class DefaultController extends Controller {

    /**
     * @Route("/users/{id}/{email}", name="user_changer")
     */
    public function userAction(Request $request, $id, $email) {

        $usersRepository = $this->get("user_repository");
        $user = $usersRepository->findUserById($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to find User.');
        }


        switch ($request->getMethod()) {
            case 'PUT':
                echo "Updating user (our use case)<br>";

                if (!$request->get('email')) {
                    throw new \InvalidArgumentException('Email is required.<br>');
                }

                $previousEmail = $user->getEmail();
                $newEmail = $request->get('email');
                $user->setEmail($newEmail);

                echo "Successfully changed user email from: $previousEmail to: $newEmail</br>";
                
                $this->get("event_dispatcher")->dispatch('user_changed', new UserEvent($user));

                break;
            case 'POST':
                echo "Creating user";
                break;
            case 'GET':
                echo "Listing user";
                break;
            case 'DELETE':
                echo "Removing user";
                break;
        }
        
        
        
        

        return new Response();
    }

}
