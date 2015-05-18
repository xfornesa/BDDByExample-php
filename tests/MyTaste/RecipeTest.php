<?php

namespace Tests\MyTaste;

use MyTaste\Recipe;

class RecipeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldCreatedWithTitle()
    {
        $actual = Recipe::withTitle('Pizza Margarita');

        $this->assertInstanceOf(Recipe::class, $actual);
    }

    /**
     * @test
     */
    public function shouldBeInstantiatedByTitle()
    {
        $aRecipeTitle = 'Pizza Margarita';

        $aRecipe = Recipe::withTitle($aRecipeTitle);

        $this->assertEquals($aRecipeTitle, $aRecipe->title());
    }
}
