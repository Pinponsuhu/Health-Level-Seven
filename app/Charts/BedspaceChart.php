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
            ->setTitle('Hospital Bed Data')
            ->addData([ \App\Models\BedSpace::latest()->where('status','!=','Released')->where('status', '!=', 'Deceased')->count(),
            auth()->user()->bed_number - \App\Models\BedSpace::latest()->where('status','!=','Released')->where('status', '!=', 'Deceased')->count() ])
            ->setHeight(360)
            ->setLabels(['Active Beds', 'Available Beds', ]);
    }
}
