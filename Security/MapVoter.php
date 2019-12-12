<?php
// src/Security/PostVoter.php
namespace Owp\OwpMap\Security;

use Owp\OwpMap\Entity\Map;
use Owp\OwpCore\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class MapVoter extends Voter
{
    const EDIT = 'edit';
    const VIEW = 'view';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject)
    {
        if (!in_array($attribute, [self::VIEW, self::EDIT])) {
            return false;
        }

        if (!$subject instanceof Event) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $event, TokenInterface $token)
    {
        $user = $token->getUser();

        switch ($attribute) {
            case self::VIEW:
                return $this->canView($event, $user);
            case self::EDIT:
                return $this->canEdit($event, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canView(Event $event, $user)
    {
        if ($event->isPrivate() && !$this->security->isGranted('ROLE_MEMBER')) {
            return false;
        }

        return true;
    }

    private function canEdit(Event $event, $user)
    {
        if ($this->security->isGranted('ROLE_WEBMASTER')) {
            return true;
        }

        return false;
    }
}
