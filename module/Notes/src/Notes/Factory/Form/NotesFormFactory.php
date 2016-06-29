<?php

namespace Notes\Factory\Form;

use Notes\Filter\NotesFilter;
use Notes\Form\NotesForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class NotesFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new NotesForm();
        $filter = new NotesFilter();
        $form->setInputFilter($filter);

        return $form;
    }
}
