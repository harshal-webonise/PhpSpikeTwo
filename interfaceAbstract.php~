<?php

abstract class animal
{
        abstract function getowned();
        private $age;

        protected function __construct($age) {
                $this->age = $age;
                }

        public function getage()
                {
                return $this->age;
                }
}
interface insurable {
        public function getvalue();
        }

class pet extends animal implements insurable {
        private $name;
        public function __construct($name,$age) {
                parent::__construct($age);
                $this->name = $name;
                }
        public function getname() {
                return $this->name;
                }
        public function getowned() {
                return ("Owner String");
        }
        public function getvalue() {
                return ("Priceless");
        }
}

class house implements insurable
 {
        public function getvalue() {
                return ("Rising fast");
 }

}
?>

<body><h1>Abstract class code</h1>

<?php

$charlie = new pet("Charlie",6);
$catage = $charlie -> getage();
$catname = $charlie -> getname();
print "$catname is $catage years old!<br><br>";

if ($charlie instanceof pet) print ("charlie is a pet<br>");
if ($charlie instanceof animal) print ("charlie is an animal<br>");
if ($charlie instanceof house) print ("charlie is a house<br>");
if ($charlie instanceof insurable) print ("charlie is insurable<br>");

?>
<hr>
</body>