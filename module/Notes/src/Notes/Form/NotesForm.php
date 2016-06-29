<?php

namespace Notes\Form;

use Zend\Form\Form;

class NotesForm extends Form
{
    public function __construct($name = 'form')
    {
        parent::__construct($name);
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'description',
            'type' => 'Text',
            'options' => array(
                'label' => 'Description',
            ),
        ));
        $this->add(array(
            'name' => 'dueDate',
            'type' => 'Text',
            'options' => array(
                'label' => 'Due Date',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}
