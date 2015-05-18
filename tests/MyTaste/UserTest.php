<?php

namespace Tests\MyTaste;

use MyTaste\Cookbook;
use MyTaste\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldBeCreatedWithName()
    {
        $actual = User::named('Xavi');

        $this->assertInstanceOf(User::class, $actual);
    }

    /**
     * @test
     */
    public function shouldKeepName()
    {
        $aName = 'Xavi';
        $actual = User::named($aName);

        $this->assertEquals($aName, $actual->name());
    }

    /**
     * @test
     */
    public function shouldHaveBeenInitializedWithZeroCookbooks()
    {
        $actual = User::named('Xavi');

        $this->assertCount(0, $actual->cookbooks());
    }

    /**
     * @test
     */
    public function shouldOwnCookbooks()
    {
        $aCookbook = Cookbook::named('Pizzas');
        $aUser = User::named('Xavi');

        $aUser->own($aCookbook);

        $cookbooks = $aUser->cookbooks();
        $this->assertEquals($aCookbook, reset($cookbooks));
    }

    /**
     * @test
     */
    public function shouldSearchCookbookByTitle()
    {
        $aCookbookName = 'Pizzas';
        $aCookbook = Cookbook::named($aCookbookName);
        $aUser = User::named('Xavi');
        $aUser->own($aCookbook);

        $cookbookFound = $aUser->cookbookByName($aCookbookName);

        $this->assertEquals($aCookbook, $cookbookFound);
    }
}
