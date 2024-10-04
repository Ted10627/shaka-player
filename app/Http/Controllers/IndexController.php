<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/HomeView', []);
    }
}
