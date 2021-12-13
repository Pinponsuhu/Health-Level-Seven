<?php

namespace App\Charts;

use App\Models\Patient;
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
        // dd(auth()->user()->id)
        $jan =intval(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '01')->count());
        $feb = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '02')->count());
        $mar = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '03')->count());
        $apr = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '04')->count());
        $may = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '05')->count());
        $june = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '06')->count());
        $july = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '07')->count());
        $aug = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '08')->count());
        $sept = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '09')->count());
        $oct = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '10')->count());
        $nov = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '11')->count());
        $dec = intVal(Patient::where('hospital_id','=',auth()->user()->id)->whereMonth('created_at','=', '12')->count());
        return $this->chart->areaChart()
            ->setTitle('Patient Admitted per month')
            ->addData('Number of Patient', [$jan,$feb,$mar,$apr,$may,$june,$july,$aug,$sept,$oct,$nov,$dec])
            ->setHeight(300)
            ->setXAxis(['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec']);
    }
}
