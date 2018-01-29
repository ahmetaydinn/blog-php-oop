<?php

class LoginCest {

    public function _before(AcceptanceTester $I) {
        
    }

    public function _after(AcceptanceTester $I) {
        
    }

    public function testEnterPage(AcceptanceTester $I) {

        $I->amOnPage('/index.php?r=home/login');
        $I->see('Login');
        $I->see('Password');
        $I->see('Submit');
    }

    public function testRequiredFields(AcceptanceTester $I) {

        $I->amOnPage('/index.php?r=home/login');
        // Test validation
        $I->click('Submit');
        $I->see('Login is required');
        $I->see('Password is required');
    }
    
    public function testPasswordWrong(AcceptanceTester $I) {

        $I->amOnPage('/index.php?r=home/login');
         // Test password wrong
        $I->fillField('login[login]', 'victor');
        $I->fillField('login[password]', '4321');
        $I->click('Submit');
        $I->see('Login or Password not founded');
    }
    
    public function testSizeOfFields(AcceptanceTester $I) {

        $I->amOnPage('/index.php?r=home/login');
         // Test password wrong
        $I->comment('Insertion of 101 caracters to test the fields size');
        $I->fillField('login[login]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique libero vitae interdum posuere1');
        $I->fillField('login[password]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique libero vitae interdum posuere1');
        $I->click('Submit');
        $I->see('Login max size is 100 characters');
        $I->see('Password max size is 100 characters');
    }
    
    public function testSubmitionSuccess(AcceptanceTester $I){
        
        $I->amOnPage('/index.php?r=home/login');
        // Test submit
        $I->fillField('login[login]', 'victor');
        $I->fillField('login[password]', '1234');
        $I->click('Submit');
        
        $I->see('Victor');
        $I->see('Blog');
        $I->see('Home');        
        $I->see('New Post');
    }
    
     public function testLogout(AcceptanceTester $I){
        
        $I->amOnPage('/index.php?r=home/login');
        // Test submit
        $I->fillField('login[login]', 'victor');
        $I->fillField('login[password]', '1234');
        $I->click('Submit');
        
        $I->see('Victor');
        $I->see('Blog');
        $I->see('Home');        
        $I->see('New Post');
        
        $I->amOnPage('/index.php?r=home/logout');
        $I->see('Login');
    }

}
