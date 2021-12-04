<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AppointmentChart
{
    protected $chart2;

    public function __construct(LarapexChart $chart2)
    {
        $this->chart2 = $chart2;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart2->donutChart()
            ->setTitle('Today\'s Appointment')
            ->setSubtitle('Season 2021.')
            ->addData([20, 24, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9']);
    }
}
