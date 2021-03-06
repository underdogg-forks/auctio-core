<?php

namespace AuctioCore\Zf\InputFilter;

use Zend\InputFilter\InputFilter;

class IbanInputFilter
{

    /**
     * Get InputFilter for a IBAN field
     *
     * @param $name
     * @param bool $required
     * @return void|InputFilter
     */
    public function getFilter($name, $required = false)
    {
        if ($name == null) {
            return;
        } else {
            $filter = [
                'name' => $name,
                'required' => $required,
                'validators' => [
                    ['name' => 'Iban'],
                ],
            ];

            $inputFilter = new InputFilter();
            $inputFilter->add($filter, $name);
            return $inputFilter;
        }
    }

}