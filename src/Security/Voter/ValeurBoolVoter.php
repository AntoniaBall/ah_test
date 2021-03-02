<?php


namespace App\Security\Voter;

use App\Entity\ValeurBool;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;


class ValeurBoolVoter extends Voter
{
    private $security = null;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject): bool
    {
        $supportsAttribute = in_array($attribute, ['EDIT_VALEUR']);
        $supportsSubject = $subject instanceof ValeurBool;

        return $supportsAttribute && $supportsSubject;
    }

    /**
     * @param string $attribute
     * @param ValeurBool $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        /** ... check if the user is anonymous ... **/

        switch ($attribute) {
            case 'EDIT_VALEUR':
                if ( $this->security->isGranted(Role::ROLE_PROPRIO) ) { return true; }  
                break;
           
        }

        return false;
    }
}