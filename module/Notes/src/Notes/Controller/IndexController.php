<?php

namespace Notes\Controller;

use Notes\Service\NoteService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $noteService;
    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function indexAction()
    {
        $notes = $this->noteService->findAll();
        return new ViewModel(['notes' => $notes]);
    }

    public function addAction()
    {

    }
}

