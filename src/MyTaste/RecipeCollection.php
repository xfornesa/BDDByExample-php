<?php

namespace MyTaste;

interface RecipeCollection
{
    /**
     * @param string $recipeTitle
     * @return Recipe
     */
    public function recipeByTitle($recipeTitle);

    /**
     * @param Recipe $aRecipe
     */
    public function add(Recipe $aRecipe);
}
