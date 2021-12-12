<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class RegPatient
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        return $this->chart->areaChart()
            ->setTitle('Patient Admitted per month')
            ->addData('Number of Patient', [40, 93, 35, 42, 18, 82,1,1,1,1,1,100])
            ->setHeight(300)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June','July','August','September','October','November','December']);
    }
}
