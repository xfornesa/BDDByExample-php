<?php

namespace Tests\MyTaste;

use MyTaste\Cookbook;
use MyTaste\Recipe;

class CookbookTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldBeCreatedWithName()
    {
        $actual = Cookbook::named('Desserts');

        $this->assertInstanceOf(Cookbook::class, $actual);
    }

    /**
     * @test
     */
    public function shouldKeepName()
    {
        $aCookbookName = 'Desserts';
        $actual = Cookbook::named($aCookbookName);

        $this->assertEquals($aCookbookName, $actual->name());
    }

    /**
     * @test
     */
    public function shouldHaveBeenInitializedWithZeroRecipes()
    {
        $actual = Cookbook::named('Desserts');

        $this->assertCount(0, $actual->recipes());
    }

    /**
     * @test
     */
    public function shouldAddRecipes()
    {
        $aRecipe = Recipe::withTitle('Pizza Margarita');
        $aCookbook = Cookbook::named('Pizzas');

        $aCookbook->add($aRecipe);

        $recipes = $aCookbook->recipes();
        $this->assertEquals($aRecipe, reset($recipes));
    }

    /**
     * @test
     */
    public function shouldSearchRecipeByTitle()
    {
        $aRecipeTitle = 'Pizza Margarita';
        $aRecipe = Recipe::withTitle($aRecipeTitle);
        $aCookbook = Cookbook::named('Pizzas');
        $aCookbook->add($aRecipe);

        $recipeFound = $aCookbook->recipeByTitle($aRecipeTitle);

        $this->assertEquals($aRecipe, $recipeFound);
    }
}
