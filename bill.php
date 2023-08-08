<?php
class City {
    protected $name;
    protected $units;
    protected $unitRates = array();
    protected $taxRate = 0.15; 
    public function __construct($name, $units, $unitRates) {
        $this->name = $name;
        $this->units = $units;
        $this->unitRates = $unitRates;
    }

    public function calculateBill() {
        $totalBill = 0;
        $remainingUnits = $this->units;

        foreach ($this->unitRates as $range => $rate) {
            $unitsRange = min($remainingUnits, $range);
            $totalBill += $unitsRange * $rate;
            $remainingUnits -= $unitsRange;

        }

        $taxAmount = $totalBill * $this->taxRate;
        $totalBillWithTax = $totalBill + $taxAmount;

        echo "City: {$this->name}<br>";
        echo "Total Units Consumed: {$this->units}<br>";
        echo "Electricity Charges: Rs {$totalBill}<br>";
        echo "Tax (15%): Rs {$taxAmount}<br>";
        echo "Total Bill: Rs {$totalBillWithTax}<br>";
        echo "<br>";
    }
}

$islamabad = new City("Islamabad", 150, array(100 => 2.5, 300 => 5, 500 => 10));
$lahore = new City("Lahore", 250, array(100 => 2.5, 300 => 5, 500 => 10));
$karachi = new City("Karachi", 400, array(100 => 3, 300 => 6, 500 => 12));


$islamabad->calculateBill();
$lahore->calculateBill();
$karachi->calculateBill();
?>
