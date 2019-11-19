<?php

require '../../../bootloader.php';

$form = (new \App\Car\Views\ApiForm())->getData();
$filtered_input = get_form_input($form);
validate_form($filtered_input, $form);


function form_success($filtered_input, $form)
{

    $repository = new \App\Car\Repository();
    $response = new \Core\Api\Response();
    $car = new App\Car\Car($filtered_input);

    $id = $repository->insert($car);

    if ($id !== false) {
        $car->setId($id);
        $response->setData($car->getData());

    } else {
        $response->addError('Insert to database failed!');
    }

    $response->print();
}

function form_fail($filtered_input, $form)
{
    $response = new \Core\Api\Response();

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['error'])) {
            $response->addError($field['error'], $field_id);
        }
    }

    $response->print();
}


$status = $repository->insert($car);

if ($status) {
    $response->setData($car);
} else {
    $response->addError('Insert to database failed!');
}

$response->print();