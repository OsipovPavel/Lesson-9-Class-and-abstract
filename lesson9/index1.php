<?php
    trait Collect {
        public function AddProduct(&$arr) {
            $arr[] = $this;
        }
    }

    class Product {
        protected $name;
        protected $price;
        protected $description;
        protected $brand;
// protected виден для дочерних, private только для продукта, Public виден всем, всегда можно к нему обратиться
        function __construct($n, $p, $d, $b) {
            $this->name = $n;
            $this->price = $p;
            $this->description = $d;
            $this->brand = $b;
        }
        protected function getProduct() {
            $str = "Name: {$this->name}, ";
            $str .= "Price: {$this->price}, ";
            $str .= "Description: {$this->description}, ";
            $str .= "Brand: {$this->brand}";
            return $str;
        }
    }
    class Phone extends Product {
        use Collect;
        protected $cpu;
        protected $ram;
        protected $countSim;
        protected $hdd;
        protected $os;
        function __construct($n, $p, $d, $b, $c, $r, $cS, $h, $o) {
            parent::__construct($n, $p, $d, $b);
            $this->cpu = $c;
            $this->ram = $r;
            $this->countSim = $cS;
            $this->hdd = $h;
            $this->os = $o;    
        }
        function getProduct() {
            $str = parent::getProduct();
            $str .= ", CPU: {$this->cpu}, ";
            $str .= "RAM: {$this->ram}, ";
            $str .= "Count Sim: {$this->countSim}, ";
            $str .= "HDD: {$this->hdd}, ";
            $str .= "OS: {$this->os}";
            return $str;
        }
    }
    class Monitor extends Product {
        use Collect;
        protected $diagonal;
        protected $frequency;
        protected $ports;
        function __construct($n, $p, $d, $b, $di, $f, $po) {
            parent::__construct($n, $p, $d, $b);
            $this->diagonal = $di;
            $this->frequency = $f;
            $this->ports = $po;    
        }
        function getProduct() {
            $str = parent::getProduct();
            $str .= ", Diagonal: {$this->diagonal}, ";
            $str .= "Frequency: {$this->frequency}, ";
            $str .= "Ports: {$this->ports}";
            return $str;
        }
    }
    $products = [];
    $ph1 = new Phone('iPhone', 100, 'Phone', 'Apple', 'A9', '1GB', 1, '128GB', 'iOS');
    $m1 = new Monitor('S24E650', 300, 'Monitor', 'HP', 21, '60Hz', 'VGA, HDMI, DisplayPort');
    $ph2 = new Phone('Galaxy S10', 1000, 'Phone', 'Samsung', 'Snapdragon 860', '8GB', 1, '128GB', 'Android');
    $m2 = new Monitor('Apple Cinema Display', 10000, 'Monitor', 'Apple', 24, '144Hz', 'HDMI, DisplayPort');
    $ph3 = new Phone('Lumia 720', 350, 'Phone', 'Nokia', 'Snapdragon 300', '500Mb', 1, '32GB', 'Windows Phone');
    $ph1->AddProduct($products);
    $ph2->AddProduct($products);
    $ph3->AddProduct($products);
    $m1->AddProduct($products);
    $m2->AddProduct($products);
    foreach ($products as $prod) {
        echo "<h2>{$prod->getProduct()}</h2>";
    }

?>