<?php


namespace App\Security\Voter;

use App\Entity\Propriete;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;


class ProprieteVoter extends Voter
{
    private $security = null;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject): bool
    {
        $supportsAttribute = in_array($attribute, ['EDIT_PROPERTY']);
        $supportsSubject = $subject instanceof Propriete;

        return $supportsAttribute && $supportsSubject;
    }

    /**
     * @param string $attribute
     * @param Propriete $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        /** ... check if the user is anonymous ... **/

        switch ($attribute) {
            case 'EDIT_PROPERTY':
                if ( $this->security->isGranted('IS_AUTHENTICATED_FULLY') ) { return true; }  
                break;
           
        }

        return false;
    }
}