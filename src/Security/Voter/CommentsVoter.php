<?php


namespace App\Security\Voter;

use App\Entity\Comments;
use App\Entity\User;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;


class CommentsVoter extends Voter
{
    private $security = null;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject): bool
    {
        $supportsAttribute = in_array($attribute, ['EDIT_COMMENTS']);
        $supportsSubject = $subject instanceof Comments;

        return $supportsAttribute && $supportsSubject;
    }

    /**
     * @param string $attribute
     * @param Comments $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        /** ... check if the user is anonymous ... **/
        switch ($attribute) {
            case 'EDIT_COMMENTS':
                if ( $this->security->isGranted(Role::ROLE_USER) ) { return true; }  
                break;
           
        }

        return false;
    }
}