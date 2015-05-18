<?php

namespace Tests\MyTaste;

use MyTaste\InMemoryRecipeCollection;
use MyTaste\Recipe;

class InMemoryRecipeCollectionTest extends \PHPUnit_Framework_TestCase
{
    /** @var  InMemoryRecipeCollection */
    private $sut;

    /**
     * @test
     */
    public function shouldRetrievePersistedUser()
    {
        $aRecipeTitle = 'aName';
        $aRecipe = Recipe::withTitle($aRecipeTitle);
        $this->sut->add($aRecipe);

        $recipeFound = $this->sut->recipeByTitle($aRecipeTitle);

        $this->assertSame($aRecipe, $recipeFound);
    }

    protected function setUp()
    {
        $this->sut = new InMemoryRecipeCollection();
    }
}
