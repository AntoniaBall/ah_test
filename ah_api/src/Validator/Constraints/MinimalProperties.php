<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
/**
 * @Annotation
 */
class MinimalProperties extends Constraint
{
    public $message = "this property can't have more than 20 biens";
}