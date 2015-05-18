<?php

namespace MyTaste;

class Recipe
{
    /** @var  string */
    private $title;

    private function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $title
     * @return Recipe
     */
    public static function withTitle($title)
    {
        return new Recipe($title);
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }
}
