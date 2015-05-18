<?php

namespace MyTaste;

class Cookbook
{
    private $name;
    /** @var  Recipe[] */
    private $recipes;

    private function __construct($name)
    {
        $this->name = $name;
        $this->recipes = [];
    }

    /**
     * @param string $name
     * @return Cookbook
     */
    public static function named($name)
    {
        return new Cookbook($name);
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Recipe[]
     */
    public function recipes()
    {
        return $this->recipes;
    }

    /**
     * @param Recipe $aRecipe
     * @return Cookbook
     */
    public function add(Recipe $aRecipe)
    {
        $this->recipes[] = $aRecipe;

        return $this;
    }

    /**
     * @param string $recipeTitle
     * @return Recipe
     */
    public function recipeByTitle($recipeTitle)
    {
        $recipesFound = array_filter(
            $this->recipes,
            function (Recipe $recipe) use ($recipeTitle) {
                return $recipe->title() === $recipeTitle;
            }
        );

        return reset($recipesFound);
    }
}
