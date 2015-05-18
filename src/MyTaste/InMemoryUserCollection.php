<?php

namespace MyTaste;

class InMemoryUserCollection implements UserCollection
{
    /** @var User[] */
    private $elements;

    public function __construct()
    {
        $this->elements = [];
    }

    /**
     * @inheritdoc
     */
    public function userByName($userName)
    {
        $usersFound = array_filter($this->elements, function (User $user) use ($userName) {
            return $user->name() === $userName;
        });

        return reset($usersFound);
    }

    /**
     * @inheritdoc
     */
    public function add(User $aUser)
    {
        $this->elements[] = $aUser;
    }
}
