<?php

require_once __DIR__ . '/FormElementInterface.php';
require_once __DIR__ . '/Leaf/ButtonElement.php';
require_once __DIR__ . '/Leaf/InputElement.php';
require_once __DIR__ . '/Leaf/SelectElement.php';

require_once __DIR__ . '/Form.php';

class Client
{
    /**
     * Here we demonstrate the use of composite pattern by creating the leaf nodes directly and using them.
     *
     * In other words we achieve uniformity - the client can treat individual elements and groups of elements (forms and nested forms) uniformly.
     */
    public function renderSimpleInputs()
    {
        $inputElement = new InputElement('email');

        echo $inputElement->render();

        $selectElement = new SelectElement(
            'paymentType',
            [
                'paypal' => 'Paypal',
                'creditCard' => 'Credit Card',
            ]
        );

        echo $selectElement->render();
    }

    /**
     * Here we demonstrate the use of composite pattern by creating a form and adding elements to it.
     * The form is a composite that can contain both individual form elements and other composites.
     * The client can treat individual elements and groups of elements (forms and nested forms) uniformly.
     */
    public function renderForm()
    {
        $form = new Form('login');
        $form->addElement(new InputElement('email'));
        $form->addElement(new InputElement('password'));
        $form->addElement(new ButtonElement('submit'));
        echo $form->render();

    }
}

$client = new StaticProxy\Client();

$client->renderSimpleInputs();

$client->renderForm();
