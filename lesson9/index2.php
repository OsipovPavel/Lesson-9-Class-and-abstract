<?php
    abstract class Figure {
        abstract public function getSquare();
        abstract public function getPerimetr();
        function getRatio() {
            return $this->getSquare() / $this->getPerimetr();
        }
    }

    class Quadrate extends Figure {
        private $a;
        public function __construct($a) {
            $this->a = $a;
        }
        function getSquare() {
            return $this->a * $this->a;
        }
        function getPerimetr() {
            return 4 * $this->a;
        }
    }
    $quadrate = new Quadrate(2);
    echo "<p>{$quadrate->getSquare()}</p>";
    echo "<p>{$quadrate->getPerimetr()}</p>";
    echo "<p>{$quadrate->getRatio()}</p>";
?>