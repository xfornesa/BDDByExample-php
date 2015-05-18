<?php

namespace MyTaste;

class InMemoryRecipeCollection implements RecipeCollection
{
    /** @var array */
    private $elements;

    public function __construct()
    {
        $this->elements = [];
    }

    /**
     * @inheritdoc
     */
    public function recipeByTitle($recipeTitle)
    {
        $recipesFound = array_filter($this->elements, function (Recipe $recipe) use ($recipeTitle) {
            return $recipe->title() === $recipeTitle;
        });

        return reset($recipesFound);
    }

    /**
     * @inheritdoc
     */
    public function add(Recipe $aRecipe)
    {
        $this->elements[] = $aRecipe;
    }
}
