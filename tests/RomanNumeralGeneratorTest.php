<?php

namespace Larowlan\RomanNumeral\Tests;

use Larowlan\RomanNumeral\RomanNumeralGenerator;

/**
 * Defines a class for testing roman numeral generation.
 *
 * @group Unit
 */
class RomanNumeralGeneratorTest extends \PHPUnit_Framework_TestCase {

  /**
   * Generator under test.
   *
   * @var \Larowlan\RomanNumeral\RomanNumeralGenerator
   */
  protected $generator;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->generator = new RomanNumeralGenerator();
  }

  /**
   * Tests roman numeral generation.
   *
   * @dataProvider providerTestGeneration
   */
  public function testGeneration($number, $expected) {
    $this->assertEquals($expected, $this->generator->generate($number));
  }
  
  
  /**
   * Tests roman numeral generation with CASE provided.
   *
   * @dataProvider providerTestGenerationwithCase
   */
  public function testGenerationWithCase($number, $expected, $lowercase) {
    $this->assertEquals($expected, $this->generator->generate($number, $lowercase));
  }

  /**
   * Data provider for testGeneration().
   *
   * @return array
   *   Test cases.
   */
  public function providerTestGeneration() {
    return [
      abcd => ["abcd","Cannot return a valid Roman for that number"],
      1 => [1, "I"],
      2 => [2, "II"],
      3 => [3, "III"],
      4 => [4, "IV"],
      5 => [5, "V"],
      6 => [6, "VI"],
      9 => [9, "IX"],
      27 => [27, "XXVII"],
      48 => [48, "XLVIII"],
      59 => [59, "LIX"],
      93 => [93, "XCIII"],
      141 => [141, "CXLI"],
      163 => [163, "CLXIII"],
      402 => [402, "CDII"],
      575 => [575, "DLXXV"],
      911 => [911, "CMXI"],
      1024 => [1024, "MXXIV"],
      3000 => [3000, "MMM"],
    ];
  }
  
  /**
   * Data provider for testGenerationWithCase().
   *
   * @return array
   *   Test cases.
   */
  
  public function providerTestGenerationwithCase() {
    return [
      0 => [0, "Cannot return a valid Roman for that number", true],
      1 => [1, "i",true],
      2 => [2, "II",false],
      3 => [3, "iii",true],
      4 => [4, "IV",false],
      5 => [5, "v",true],
      6 => [6, "vi",true],
      9 => [9, "IX",false],
      27 => [27, "xxvii",true],
      48 => [48, "XLVIII",false],
      59 => [59, "LIX",false],
      93 => [93, "XCIII",false],
      141 => [141, "CXLI",false],
      163 => [163, "CLXIII",false],
      402 => [402, "CDII",false],
      575 => [575, "DLXXV",false],
      911 => [911, "CMXI",false],
      1024 => [1024, "MXXIV",false],
      3000 => [3000, "MMM",false],
    ];
    
  }
}
