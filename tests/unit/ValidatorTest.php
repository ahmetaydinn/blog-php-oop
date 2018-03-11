<?php

use app\components\validators\DateValidator;
use app\components\validators\EmailValidator;
use app\components\validators\RequiredValidator;
use app\components\validators\LengthValidator;
use app\components\validators\UrlValidator;

class ValidatorTest extends \Codeception\Test\Unit {

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before() {
        
    }

    protected function _after() {
        
    }

    /**
     * Test Date Validator Class
     */
    public function testDateValidator() {
        $date = "2018.01.01";
        $options = ["format" => "Y-d-m"];
        $this->assertFalse(DateValidator::isValid($date, $options));

        $date = "2018-01-01";
        $options = ["format" => "Y-d-m"];
        $this->assertTrue(DateValidator::isValid($date, $options));

        $date = "2018.01.01";
        $options = ["format" => "Y.d.m"];
        $this->assertTrue(DateValidator::isValid($date, $options));

        $date = "2018.01.01";
        $this->expectException(Exception::class, 'Option format need to be passed');
        DateValidator::isValid($date, null);
    }

    /**
     * Test Email Validator Class
     */
    public function testEmailValidator() {
        $email = "victor.leite";
        $this->assertFalse(EmailValidator::isValid($email));

        $email = "victor.leite@gmail";
        $this->assertFalse(EmailValidator::isValid($email));

        $email = "victor.leite@gmail.com";
        $this->assertTrue(RequiredValidator::isValid($email));
    }

    /**
     * Test Length Validator Class
     */
    public function testLengthValidator() {
        $text = "1234567891011";
        $options = ["quantity" => 10];
        $this->assertFalse(LengthValidator::isValid($text, $options));

        $text = "test";
        $options = ["quantity" => 10];
        $this->assertTrue(LengthValidator::isValid($text, $options));

        $text = "1234567890";
        $options = ["quantity" => 10];
        $this->assertTrue(LengthValidator::isValid($text, $options));

        $text = "";
        $options = ["quantity" => 10];
        $this->assertTrue(LengthValidator::isValid($text, $options));

        $text = null;
        $options = ["quantity" => 10];
        $this->assertTrue(LengthValidator::isValid($text, $options));

        $text = "test";
        $this->expectException(Exception::class, 'Option quantity need to be passed');
        LengthValidator::isValid($text, null);
    }

    /**
     * Test Required Validator Class
     */
    public function testRequiredValidator() {
        $text = "";
        $this->assertFalse(RequiredValidator::isValid($text));

        $text = null;
        $this->assertFalse(RequiredValidator::isValid($text));

        $text = "Im here";
        $this->assertTrue(RequiredValidator::isValid($text));
    }

    /**
     * Test Url Validator Class
     */
    public function testUrlValidator() {
        $url = "http://";
        $this->assertFalse(UrlValidator::isValid($url));

        $url = "myteste";
        $this->assertFalse(UrlValidator::isValid($url));

        $url = "https://www.google.com";
        $this->assertTrue(UrlValidator::isValid($url));
        
        $url = "http://www.google.com";
        $this->assertTrue(UrlValidator::isValid($url));
    }

}
