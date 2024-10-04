<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    public function InternationalFlights()
    {
        return Inertia::render('Frontend/01-flight/InternationalFlights', []);
    }

    public function InternationalScheduled()
    {
        return Inertia::render('Frontend/01-flight/InternationalScheduled', []);
    }

    public function DomesticFlights()
    {
        return Inertia::render('Frontend/01-flight/DomesticFlights', []);
    }

    public function DomesticScheduled()
    {
        return Inertia::render('Frontend/01-flight/DomesticScheduled', []);
    }

    public function FlightForm()
    {
        return Inertia::render('Frontend/01-flight/FlightForm', []);
    }

    public function Airline()
    {
        return Inertia::render('Frontend/01-flight/Airline', []);
    }

    public function FlightStandbyInformation()
    {
        return Inertia::render('Frontend/01-flight/FlightStandbyInformation', []);
    }
}
