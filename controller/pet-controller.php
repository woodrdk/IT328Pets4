<?php

class PetController
{
    private $_f3; //Router
    //private $_val; // validation

    public function __construct($f3)
    {
        $this->_f3 = $f3;
        //$this->_val = new Validation();
    }

    public function home()
    {
        echo "<h1>My pets </h1>";
        echo"<a href='order'>Order a pet</a>";
    }

    public function homeParams($f3, $params)
    {
        $animal = $params['item'];

        if ($animal == 'chicken') {
            echo 'Cluck!';
        }
        else if ($animal == 'dog') {
            echo 'Woof!';
        }
        else if ($animal == 'cat') {
            echo 'Meow!';
        }
        else if ($animal == 'cow') {
            echo 'Moo!';
        }
        else if ($animal == 'donkey') {
            echo 'Hee Haw!';
        }
        else {
            $f3->error(404);
        }
    }

    public function order1($f3)
    {
        $_SESSION = [];

        if(isset($_POST['animal'])) {
            $animal = $_POST['animal'];
            if(validString($animal)) {
                if($animal == "dog"){
                    $_SESSION['animal'] = new Dog();
                }
                else if($animal == "cat"){
                    $_SESSION['animal'] = new Cat();
                }
                else if($animal == "bird"){
                    $_SESSION['animal'] = new Bird();
                }
                else{
                    $_SESSION['animal'] = new Pet();
                }
                $_SESSION['animal']->setType($animal);
                $f3->reroute('/order2');
            }
            else {
                $f3->set("errors['animal']", "Please enter an animal");
                $f3->set('type', $animal);
            }
        }
        $view = new Template();//template object
        echo $view-> render('views/form1.html');
        //use it to render the main page
    }

    public function order2($f3)
    {
        if(isset($_POST['color'])) {
            $color = $_POST['color'];
            $name = $_POST['name'];
            $f3->set('name', $name);
            $f3->set('color', $color);
            if(validColor($color)) {
                if(validString($name)) {
                    $_SESSION['animal']->setColor($color);
                    $_SESSION['animal']->setName($name);
                    $view = new Template();//template object
                    echo $view-> render('views/results.html');
                    return;
                }
            }
            else {
                $f3->set("errors['color']", "Please select a valid color");
            }
        }
        $view = new Template();//template object
        echo $view-> render('views/form2.html');//use it to render the main page
    }
}
