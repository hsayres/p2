<?php

namespace P2;

class Bill
{

    private $tabTotal;
    private $splitNum;
    private $serviceLevel;
    private $roundUp;

    public function __construct($tabTotal, $splitNum, $serviceLevel, $roundUp = '')
    {
        $this->tabTotal = $tabTotal;
        $this->splitNum = $splitNum;
        $this->serviceLevel = $serviceLevel;
        $this->roundUp = $roundUp;
    }

    /**
     * @return float|int
     */
    public function calculateTotalPerPerson()
    {
        $total = $this->roundUp ? $this->calculateTotalPerPersonRoundup() : $this->calculateTotalPerPersonNoRoundup();

        return $total;
    }

    private function calculateTotalPerPersonNoRoundup()
    {
        return (round((($this->tabTotal + ($this->tabTotal * $this->serviceLevel)) / $this->splitNum), 2));
    }

    private function calculateTotalPerPersonRoundup()
    {
        return (number_format((float)(ceil(($this->tabTotal + ($this->tabTotal * $this->serviceLevel)) / $this->splitNum)), 2, '.', ''));
    }

}