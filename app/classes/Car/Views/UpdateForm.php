<?php

namespace App\Car\Views;

class UpdateForm extends BaseForm {

    public function __construct($data = []) {
        parent::__construct($data);
        
        $this->data['attr']['id'] = 'update-form';
        $this->data['buttons']['submit']['title'] = 'Atnaujinti';
    }


}
