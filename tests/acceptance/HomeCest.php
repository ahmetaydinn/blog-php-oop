<?php


class HomeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testAccessHome(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Blog');
        $I->see('Home');
        $I->see('Login');
    }
}
