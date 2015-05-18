<?php

namespace MyTaste;

interface UserCollection
{
    /**
     * @param string $userName
     * @return User
     */
    public function userByName($userName);

    /**
     * @param User $aUser
     */
    public function add(User $aUser);
}