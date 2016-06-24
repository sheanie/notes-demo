<?php

namespace Notes\Factory\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Notes\Service\NoteService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;


class NoteServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $serviceLocator->get('doctrine.entitymanager.orm_default');
        /** @var EntityRepository $noteRepository */
        $noteRepository = $entityManager->getrepository('Notes\Entity\Note');
        $noteExtractor = new DoctrineObject($entityManager);

        return new NoteService($noteRepository, $noteExtractor);
    }
}
