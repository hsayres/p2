<?php

namespace P2;

class Bill
{

    private $tabTotal;
    private $splitNum;
    private $serviceLevel;
    private $roundUp;
    private $possibleServiceLevels = [
        '.0' => 'Horrendous (0% tip)',
        '.10' => 'Bad (10% tip)',
        '.15' => 'Okay (15% tip)',
        '.18' => 'Good (18% tip)',
        '.20' => 'Great (20% tip)',
        '.25' => 'Spectacular (25% tip)',
    ];

    public function __construct($tabTotal, $splitNum, $serviceLevel, $roundUp = '')
    {
        $this->tabTotal = $tabTotal;
        $this->splitNum = $splitNum;
        $this->serviceLevel = $serviceLevel;
        $this->roundUp = $roundUp;
    }

    public function getPossibleServiceLevels()
    {
        return $this->possibleServiceLevels;
    }

    public function calculateTotalPerPerson()
    {
        $total = $this->roundUp ? $this->calculateTotalPerPersonRoundup() : $this->calculateTotalPerPersonNoRoundup();

        return $total;
    }

    private function calculateTotalPerPersonNoRoundup()
    {
        return (number_format(round((($this->tabTotal + ($this->tabTotal * $this->serviceLevel)) / $this->splitNum), 2), 2, '.', ''));
    }

    private function calculateTotalPerPersonRoundup()
    {
        return (number_format((float)(ceil(($this->tabTotal + ($this->tabTotal * $this->serviceLevel)) / $this->splitNum)), 2, '.', ''));
    }

}