<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class BedspaceChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Beds Data')
            ->addData([ \App\Models\BedSpace::latest()->where('status','!=','Released')->where('status', '!=', 'Deceased')->count(),
            50-\App\Models\BedSpace::latest()->where('status','!=','Released')->where('status', '!=', 'Deceased')->count() ])
            ->setHeight(280)
            ->setLabels(['Active Beds', 'Available Beds', ]);
    }
}
