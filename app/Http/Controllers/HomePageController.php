<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function announcement1()
    {
        return Inertia::render('Frontend/00-homepage/AnnouncementInformation', []);
    }

    public function announcement2()
    {
        return Inertia::render('Frontend/00-homepage/AnnouncementInformation2', []);
    }

    public function sitemap()
    {
        return Inertia::render('Frontend/00-homepage/SiteMap', []);
    }

    public function faq()
    {
        return Inertia::render('Frontend/00-homepage/FAQ', []);
    }
}
