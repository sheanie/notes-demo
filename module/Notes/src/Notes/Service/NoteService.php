<?php

namespace Notes\Service;

use Doctrine\ORM\EntityRepository;
use Notes\Model\Note;
use Zend\Hydrator\ClassMethods;

class NoteService
{
    protected $notesRepository;
    protected $noteExtractor;
    protected $noteHydrator;

    public function __construct(EntityRepository $notesRepository, $noteExtractor, ClassMethods $noteHydrator)
    {
        $this->notesRepository = $notesRepository;
        $this->noteExtractor = $noteExtractor;
        $this->noteHydrator = $noteHydrator;
    }

    public function findAll()
    {
        $notesEntities = $this->notesRepository->findAll();
        $notes = [];
        foreach ($notesEntities as $entity)
        {
            $entityArray = $this->noteExtractor->extract($entity);
            $notes[] = $this->noteHydrator->hydrate($entityArray, new Note());
        }

        return $notes;
    }

    public function findById($id)
    {
        $entity = $this->notesRepository->findOneBy(['id' => $id]);
        $entityArray = $this->noteExtractor->extract($entity);

        return $this->noteHydrator->hydrate($entityArray, new Note());
    }

    public function saveNote($data)
    {
        $dueDate = new \DateTime($data['dueDate']);
        $entity = new \Notes\Entity\Note();
        $entity->setTitle($data['title']);
        $entity->setDescription($data['description']);
        $entity->setDueDate($dueDate);
        $entity->setStatus(1);

        $this->notesRepository->save($entity);
    }

    public function updateNote($id, $data)
    {
        $dueDate = new \DateTime($data['dueDate']);
        $entity = $this->notesRepository->findOneBy(['id' => $id]);
        $entity->setTitle($data['title']);
        $entity->setDescription($data['description']);
        $entity->setDueDate($dueDate);
        $this->notesRepository->save($entity);
    }
    public function deleteNote($id)
    {
        $this->notesRepository->deleteById($id);
    }
}