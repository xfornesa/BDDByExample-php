<?php

namespace MyTaste;

class InMemoryUserCollectionTest extends \PHPUnit_Framework_TestCase
{
    /** @var  InMemoryUserCollection */
    private $sut;

    /**
     * @test
     */
    public function shouldRetrievePersistedUser()
    {
        $userName = 'aName';
        $aUser = User::named($userName);
        $this->sut->add($aUser);

        $userFound = $this->sut->userByName($userName);

        $this->assertSame($aUser, $userFound);
    }

    protected function setUp()
    {
        $this->sut = new InMemoryUserCollection();
    }
}
