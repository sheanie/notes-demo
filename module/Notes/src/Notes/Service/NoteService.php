<?php

namespace Notes\Service;

use Doctrine\ORM\EntityRepository;
use Notes\Model\Note;
use Zend\Stdlib\Hydrator\ClassMethods;

class NoteService
{
    protected $notesRepository;
    protected $noteExtractor;

    public function __construct(EntityRepository $notesRepository, $noteExtractor)
    {
        $this->notesRepository = $notesRepository;
        $this->noteExtractor = $noteExtractor;
    }

    public function findAll()
    {
        $notesEntities = $this->notesRepository->findAll();
        $notesHydrator = new ClassMethods();
        $notes = [];
        foreach ($notesEntities as $entity)
        {
            $entityArray = $this->noteExtractor->extract($entity);
            $notes[] = $notesHydrator->hydrate($entityArray, new Note());
        }

        return $notes;
    }
}