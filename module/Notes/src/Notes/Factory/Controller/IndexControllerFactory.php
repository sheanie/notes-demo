<?php

namespace Notes\Factory\Controller;

use Notes\Controller\IndexController;
use Notes\Service\NoteService;
use Zend\ServiceManager\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $noteService = $sm->get(NoteService::class);

        return new IndexController($noteService);
    }
}
