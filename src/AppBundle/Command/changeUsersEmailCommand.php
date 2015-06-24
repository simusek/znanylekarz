<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of changeUsersEmailCommand
 *
 * @author Mariusz Pabian <pabian.mariusz@gmail.com>
 */

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Events\UserEvent;

class changeUsersEmailCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('user:email:update')
                ->setDescription('Updating users email')
                ->addArgument('id')
                ->addArgument('email');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $email = $input->getArgument('email');
        $id = $input->getArgument('id');

        if (!$email) {
            $output->writeln('No email parameter. Email address is required');
        }
        if (!$id) {
            $output->writeln('No id parameter. User id is required');
        }


        $repository = $this->getContainer()->get('user_repository');
        $user = $repository->findUserById($id);

        if (!$user) {
            $output->writeln("User with id: $id was not found in repository");
            return;
        }

        $previousEmail = $user->getEmail();
        $user->setEmail($email);
        $output->writeln("Successfully changed user email from: $previousEmail to: $email");

        $this->getContainer()->get("event_dispatcher")->dispatch('user_changed', new UserEvent($user));
    }

}
