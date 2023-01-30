<?php
namespace jeanvaljean\Timezone\Test\Model\Validation;

use jeanvaljean\Timezone\Model\Validation\TimezoneValidation;
use Cake\TestSuite\TestCase;

/**
 * TimezoneValidation Test
 */
class TimezoneValidationTest extends TestCase
{
    /**
     * testValid
     */
    public function testValid()
    {
        $this->assertTrue(TimezoneValidation::valid('Europe/Paris'));
        $this->assertFalse(TimezoneValidation::valid('Fake/Timezone'));
    }
}