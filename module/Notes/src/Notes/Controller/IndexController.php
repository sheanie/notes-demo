<?php

namespace Notes\Controller;

use Notes\Form\NotesForm;
use Notes\Service\NoteService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $noteService;
    protected $notesForm;
    public function __construct(NoteService $noteService, NotesForm $notesForm)
    {
        $this->noteService = $noteService;
        $this->notesForm = $notesForm;
    }

    public function indexAction()
    {
        $notes = $this->noteService->findAll();

        return new ViewModel(['notes' => $notes]);
    }

    public function addAction()
    {
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $this->notesForm->setData($request->getPost());
            if ($this->notesForm->isValid())
            {
                $this->noteService->saveNote($this->notesForm->getData());

                return $this->redirect()->toRoute('notes');
            }
        }

        return ['form' => $this->notesForm];
    }
    public function editAction()
    {
        $id = $this->params()->fromRoute('id');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->notesForm->setData($request->getPost());
            if ($this->notesForm->isValid())
            {
                $this->noteService->updateNote($id, $this->notesForm->getData());

                return $this->redirect()->toRoute('notes');
            }
        }
        else
        {
            $note = $this->noteService->findById($id);
            $this->notesForm->populateValues($note->toArray());
        }

        return ['form' => $this->notesForm];
    }
    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id');
        $request = $this->getRequest();
        if ($request->isPost() && $this->params()->fromPost('confirm'))
        {
            $this->noteService->deleteNote($id);
            //TODO: Add flash message
            return $this->redirect()->toRoute('notes');
        }
        return ['id' => $id];
    }
}

