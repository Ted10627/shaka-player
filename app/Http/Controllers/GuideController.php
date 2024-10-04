<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class GuideController extends Controller
{
    public function flightProcess()
    {
        return Inertia::render('Frontend/02-guide/ProcessExit', []);
    }

    public function checkIn()
    {
        return Inertia::render('Frontend/02-guide/Check-in', []);
    }

    public function securityNotice()
    {
        return Inertia::render('Frontend/02-guide/SecurityNotice', []);
    }

    public function concessionTicket()
    {
        return Inertia::render('Frontend/02-guide/ConcessionTicket', []);
    }

    public function relevantRegulation()
    {
        return Inertia::render('Frontend/02-guide/RelevantRegulation', []);
    }

    public function taxRefund()
    {
        return Inertia::render('Frontend/02-guide/TaxRefund', []);
    }
}
