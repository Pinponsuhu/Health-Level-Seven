<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DepartmentBedChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $bed_no =  User::select('bed_number')->where('id',auth()->guard('department')->user()->hospital_id)->first();
        return $this->chart->pieChart()
        ->setTitle('Hospital Bed Data')
        ->addData([ \App\Models\BedSpace::latest()->where('hospital_id',auth()->guard('department')->user()->hospital_id)->where('status','!=','Released')->where('status', '!=', 'Deceased')->count(),
        $bed_no->bed_number - \App\Models\BedSpace::latest()->where('status','!=','Released')->where('status', '!=', 'Deceased')->count() ])
        ->setHeight(360)
        ->setLabels(['Active Beds', 'Available Beds', ]);
    }
}
