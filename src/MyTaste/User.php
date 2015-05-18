<?php

namespace MyTaste;

class User
{
    /** @var  string */
    private $name;
    /** @var  Cookbook[] */
    private $cookbooks;

    private function __construct($name)
    {
        $this->name = $name;
        $this->cookbooks = [];
    }

    public static function named($name)
    {
        return new User($name);
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Cookbook $aCookbook
     */
    public function own(Cookbook $aCookbook)
    {
        $this->cookbooks[] = $aCookbook;
    }

    /**
     * @return Cookbook[]
     */
    public function cookbooks()
    {
        return $this->cookbooks;
    }

    /**
     * @param string $cookbookName
     * @return Cookbook
     */
    public function cookbookByName($cookbookName)
    {
        return $this->cookbooks[0];
    }
}
