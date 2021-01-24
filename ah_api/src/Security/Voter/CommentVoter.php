<?php

namespace App\Security\Voter;

use App\Entity\Comments;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class CommentVoter extends Voter
{
    private $security = null;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject): bool
    {
        $supportsAttribute = in_array($attribute, ['COMMENT_CREATE', 'COMMENT_READ', 'COMMENT_EDIT', 'COMMENT_DELETE']);
        $supportsSubject = $subject instanceof Book;

        return $supportsAttribute && $supportsSubject;
    }

    /**
     * @param string $attribute
     * @param Book $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        

        switch ($attribute) {
            case 'COMMENT_CREATE':
                if ( $this->security->isGranted(Role::ROLE_USER) ) { return true; }  
                break;
            case 'COMMENT_READ':
                if ( $this->security->isGranted(Role::ROLE_USER) ) { return true; }  
                break;
            case 'COMMENT_DELETE':
                if ( $this->security->isGranted(Role::ROLE_USER) ) { return true; }  
                break;
            case 'COMMENT_EDIT':
                if ( $this->security->isGranted(Role::ROLE_USER) ) { return true; }  
                break;
                
        }

        return false;
    }
}