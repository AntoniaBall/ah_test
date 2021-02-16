<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
final class MinimalPropertiesValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        // $value = currentValue
        // var_dump("electricity", $value);
        // die();
        /**
         * mettre la condition de limite de biens par utilisateur ici
         * minimalProperties on properties
         * if minimalProperties > 20 return constraint message
         */

    if ('electricity' === $value) {
        $this->context->buildViolation($constraint->message)->addViolation();
    }
}

}