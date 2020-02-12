<?php

class Pet
{
    private $_name;
    private $_color;
    private $_type;


/*    function __construct()
    {
        $this->_name = "No Clue";
        $this->_color = "red";
    }*/
    // default constructor
    function __construct( $name = "Fido", $color = "Blue", $type = "animal")
    {
        $this->_name = $name;
        $this->_color = $color;
        $this->_type = $type;
    }

    function getName()
    {
        return $this->_name;
    }

    function setName($name)
    {
        $this->_name = $name;
    }

    function eat()
    {
        echo $this->_name . " is eating<br>";
    }

    function talk()
    {
        echo $this->_name ." is talking<br>";
    }

    function colorOfPet()
    {
        echo $this->_name . " is " . $this->_color  ;
    }
}