<?php

namespace App\Classes\Models;

use App\Models\Questionnaires;

class Questionnaire
{
    private $id = NULL;
    private $questionnaire = NULL;

    public function __construct($id) {
        $this->id = $id;
        $this->questionnaire = Questionnaires::find($id);
    }

    public function getQuestionnaireName() {
        return $this->questionnaire->name;
    }

}
