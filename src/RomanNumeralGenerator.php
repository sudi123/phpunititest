<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

  /**
   * Generates a roman numeral from an integer.
   *
   * @param int $number
   *   Integer to convert.
   * @param bool $lowerCase
   *   (optional) Pass TRUE to convert to lowercase. Defaults to FALSE.
   *
   * @return string
   *   Roman numeral representing the passed integer.
   */
    
    public function generate($number, $lowerCase = false) {
        
    // validate if the incoming parameter is a number
    if(!is_numeric ($number) or $number <= 0) {
        return "Cannot return a valid Roman for that number";
    }
    
    // Lookup table that contain array keys as Roman numerals and values as the corresponding numbers
    $lookup = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
    $roman = ''; 
    while($number > 0) 
    { 
        foreach($lookup as $symbol=>$value) 
        { 
            if($number >= $value) 
            { 
                $number -= $value; 
                $roman .= $symbol; 
                break; 
            } 
        } 
    }
    // if the parameter for lowercase is specified to TRUE then return as lower case
    if($lowerCase) {
        $roman = strtolower($roman);
    } 
    return $roman; 
  }
  
}
