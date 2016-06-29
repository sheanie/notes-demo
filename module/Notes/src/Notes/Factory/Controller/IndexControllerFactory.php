<?php

namespace Notes\Factory\Controller;

use Notes\Controller\IndexController;
use Notes\Service\NoteService;
use Zend\ServiceManager\FactoryInterface;
use Notes\Form\NotesForm;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $noteService = $sm->get(NoteService::class);
        $notesForm = $sm->get(NotesForm::class);

        return new IndexController($noteService, $notesForm);
    }
}
