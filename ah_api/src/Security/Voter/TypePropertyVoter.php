<?php


namespace App\Security\Voter;

use App\Entity\TypeProperty;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;


class TypePropertyVoter extends Voter
{
    private $security = null;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject): bool
    {
        $supportsAttribute = in_array($attribute, ['EDIT_TYPE']);
        $supportsSubject = $subject instanceof TypeProperty;

        return $supportsAttribute && $supportsSubject;
    }

    /**
     * @param string $attribute
     * @param TypeProperty $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        /** ... check if the user is anonymous ... **/

        switch ($attribute) {
            case 'EDIT_TYPE':
                if ( $this->security->isGranted(Role::ROLE_ADMIN) ) { return true; }  
                break;
           
        }

        return false;
    }
}