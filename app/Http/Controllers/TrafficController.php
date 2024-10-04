<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class TrafficController extends Controller
{
    public function googleMap()
    {
        return Inertia::render('Frontend/04-traffic/GoogleMap', []);
    }

    public function parkingLot()
    {
        return Inertia::render('Frontend/04-traffic/ParkingLot', []);
    }

    public function taxiService()
    {
        return Inertia::render('Frontend/04-traffic/TaxiService', []);
    }

    public function carRentalService()
    {
        return Inertia::render('Frontend/04-traffic/CarRentalService', []);
    }

    public function busInformation()
    {
        return Inertia::render('Frontend/04-traffic/BusInformation', []);
    }

    public function sightseeingGuide()
    {
        return Inertia::render('Frontend/04-traffic/SightseeingGuide', []);
    }
}
