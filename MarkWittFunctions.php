<?php 

/*
Mark Witt
CSD-440 
Functions File
---- Includes functions for Module 3-6
*/

#Function: take in 2 numbers as parameters, return the sum 
function getSum($first, $second){
    return $first + $second;
}

//function: take in string parameter, return if string is palindrome or not (true=yes, false=no)
function isPalindrome($str){
    $str = strtolower(str_replace(' ', '', $str));  //remove spaces and convert entire string to lowercase
    $reverseStr = strrev($str);      //reverse the string
    return $str === $reverseStr;    //compare strings and return true if they match, false if not
}

//function: take in string parameter, return string in reverse. this used for output of reversed string only, not checked if palendrome. 
function reverseString($str){
    $cleanstr = strtolower(str_replace(' ', '', $str));
    return strrev($cleanstr);
}

//mod 5 function: take in array of customers, return those aged x to x
function ageFilter($customer) {
    global $maxAge;
    global $minAge;
    return $customer["age"] >= $minAge && $customer["age"] <= $maxAge;
}

//mod 5 function: take in array of customers, return those with last names of x or x
function lastNameFilter($customers, $lastName) {
    $filteredCustomers = [];
    foreach ($customers as $customer) {
        if ($customer["last_name"] === $lastName) {
            $filteredCustomers[] = $customer;
        }
    }
    return $filteredCustomers;
}

//mod 5 function: take in array of customers, return those with phone number matching search
function phoneSearch($customers, $phone){
    $filteredCustomers = [];
    foreach ($customers as $customer){
        if (strpos($customer["phone"], $phone) !== false) {
            $filteredCustomers[] = $customer;
        }
    }
    return $filteredCustomers;
}

//custom search: user enters search parameters(first_name, last_name, age) and it searches to return with those in array that match
function customerSearch($customers, $input){
    $searchedCustomers = [];
    $input = (string)$input;
    foreach ($customers as $customer) {
        if($customer["first_name"] === ucfirst($input) || $customer["last_name"] === ucfirst($input) || 
            $customer["age"] === (integer)$input || strpos($customer["phone"], $input)){
            $searchedCustomers[] = $customer;
            }
    }
    return $searchedCustomers;
}

//module 6 - class MarkWittMyInteger and functions:
class MarkWittMyInteger {
    private $value;

    public function __construct($value){
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function isEven() {
        return $this->value % 2 == 0;
    }
    
    public function isOdd() {
        return $this->value % 2 != 0;
    }

    public function isPrime() {
        if ($this->value <= 1) {
            return false;
        }
        if ($this->value <= 3) {
            return true;
        }
        if ($this->value % 2 == 0 || $this->value % 3 == 0) {
            return false;
        }
        $i = 5;
        while ($i * $i <= $this->value) {
            if ($this->value % $i == 0 || $this->value % ($i + 2) == 0) {
                return false;
            }
            $i += 6;
        }
        return true;
    }
}
