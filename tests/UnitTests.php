<?php
use PHPUnit\Framework\TestCase;

class UnitTests extends TestCase
{
    public function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('singleaccessory');
        $this->accessory = new Accessory;
    }

    public function testValidName()
    {
        $expected = "Vafa";
        $this->accessory->setName($expected);
        $this->assertEquals($expected, $this->accessory->getName());
    }
    public function testInvalidNameLength()
    {
        $expected = "VafaVafaVafaVafa";
        $this->expectException(Exception::class);
        $this->accessory->setName($expected);
    }
    public function testInvalidNameAbsent()
    {
        $expected = "";
        $this->expectException(Exception::class);
        $this->accessory->setName($expected);
    }

    public function testInvalidImageAbsent()
    {
        $expected = "";
        $this->expectException(Exception::class);
        $this->accessory->setImage($expected);
    }
    public function testValidComfort()
    {
        $expected = 5;
        $this->accessory->setComfort($expected);
        $this->assertEquals($expected, $this->accessory->getComfort());
    }
    public function testInvalidComfortAbsent()
    {
        $expected = "";
        $this->expectException(Exception::class);
        $this->accessory->setComfort($expected);
    }
    public function testInvalidComfortLarge()
    {
        $expected = 11;
        $this->expectException(Exception::class);
        $this->accessory->setComfort($expected);
    }
    public function testInvalidComfortNegative()
    {
        $expected = -5;
        $this->expectException(Exception::class);
        $this->accessory->setComfort($expected);
    }
    public function testInvalidComfortNonNumeric()
    {
        $expected = "abc";
        $this->expectException(Exception::class);
        $this->accessory->setComfort($expected);
    }

    public function testValidSpeed()
    {
        $expected = 5;
        $this->accessory->setSpeed($expected);
        $this->assertEquals($expected, $this->accessory->getSpeed());
    }
    public function testInvalidSpeedAbsent()
    {
        $expected = "";
        $this->expectException(Exception::class);
        $this->accessory->setSpeed($expected);
    }
    public function testInvalidSpeedLarge()
    {
        $expected = 11;
        $this->expectException(Exception::class);
        $this->accessory->setSpeed($expected);
    }
    public function testInvalidSpeedNegative()
    {
        $expected = -5;
        $this->expectException(Exception::class);
        $this->accessory->setSpeed($expected);
    }
    public function testInvalidSpeedNonNumeric()
    {
        $expected = "abc";
        $this->expectException(Exception::class);
        $this->accessory->setSpeed($expected);
    }

    public function testValidProfessionality()
    {
        $expected = 5;
        $this->accessory->setProfessionality($expected);
        $this->assertEquals($expected, $this->accessory->getProfessionality());
    }
    public function testInvalidProfessionalityAbsent()
    {
        $expected = "";
        $this->expectException(Exception::class);
        $this->accessory->setProfessionality($expected);
    }
    public function testInvalidProfessionalityLarge()
    {
        $expected = 11;
        $this->expectException(Exception::class);
        $this->accessory->setProfessionality($expected);
    }
    public function testInvalidProfessionalityNegative()
    {
        $expected = -5;
        $this->expectException(Exception::class);
        $this->accessory->setProfessionality($expected);
    }
    public function testInvalidProfessionalityNonNumeric()
    {
        $expected = "abc";
        $this->expectException(Exception::class);
        $this->accessory->setProfessionality($expected);
    }
}
