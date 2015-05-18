<?php

namespace MyTaste\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use MyTaste\Cookbook;
use MyTaste\InMemoryRecipeCollection;
use MyTaste\InMemoryUserCollection;
use MyTaste\Recipe;
use MyTaste\RecipeCollection;
use MyTaste\User;
use MyTaste\UserCollection;
use PHPUnit_Framework_Assert as Asserts;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /** @var RecipeCollection */
    private $recipes;
    /** @var  UserCollection */
    private $users;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->recipes = new InMemoryRecipeCollection();
        $this->users = new InMemoryUserCollection();
    }

    /**
     * @Given exists a user named :userName who owns a cookbook named :cookbookName
     */
    public function existsUserWhoOwnsACookbook($userName, $cookbookName)
    {
        // exists a user named ...
        $aUser = User::named($userName);
        $this->users->add($aUser);

        // a cookbook named ...
        $aCookbook = Cookbook::named($cookbookName);

        // a user ... who owns a cookbook ...
        $aUser->own($aCookbook);
    }

    /**
     * @Given exists a recipe of title :title
     */
    public function existsRecipe($title)
    {
        // exists a recipe of title ...
        $aRecipe = Recipe::withTitle($title);
        $this->recipes->add($aRecipe);
    }

    /**
     * @When the recipe :recipeTitle is added to the :userName's cookbook named :cookbookName
     */
    public function theRecipeIsAddedToCookbookNamed($recipeTitle, $userName, $cookbookName)
    {
        // the recipe with title ...
        $aRecipe = $this->recipes->byTitle($recipeTitle);

        // the :userName's cookbook named ...
        $aUser = $this->users->byName($userName);
        $cookbook = $aUser->cookbookByName($cookbookName);

        // the recipe ... is added to ... cookbook
        $cookbook->add($aRecipe);
    }

    /**
     * @Then the :userName's cookbook named :cookbookName should contain the recipe of title :recipeTitle
     */
    public function theCookbookShouldContainTheRecipe($userName, $cookbookName, $recipeTitle)
    {
        // the user's cookbook named ...
        $aUser = $this->users->byName($userName);
        $cookbook = $aUser->cookbookByName($cookbookName);

        // the recipe of title ...
        $aRecipe = $this->recipes->byTitle($recipeTitle);

        // cookbook ... should contain the recipe
        $recipeFound = $cookbook->recipeByTitle($recipeTitle);
        Asserts::assertEquals($aRecipe, $recipeFound);
    }
}
