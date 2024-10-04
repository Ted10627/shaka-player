<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrafficController;
use App\Http\Controllers\HomePageController;

// 首頁
Route::get('/', [IndexController::class,'index'])->name('home');
Route::get('/shaka',[Controller::class,'ShakaPlayer']);
//00-homepage
Route::prefix('homepage')->group(function(){
    Route::get('/announcement-information1', [HomePageController::class, 'announcement1'])->name('homepage.announcement-information1');
    Route::get('/announcement-information2', [HomePageController::class, 'announcement2'])->name('homepage.announcement-information2');
    Route::get('/sitemap', [HomePageController::class, 'sitemap'])->name('homepage.sitemap');
    Route::get('/faq', [HomePageController::class, 'faq'])->name('homepage.faq');
    });

//01-flight
Route::prefix('flight')->group(function(){
    Route::get('/international-flights', [FlightController::class, 'InternationalFlights'])->name('flight.international-flights');
    Route::get('/international-scheduled', [FlightController::class, 'InternationalScheduled'])->name('flight.international-scheduled');
    Route::get('/somestic-flights', [FlightController::class, 'DomesticFlights'])->name('flight.domestic-flights');
    Route::get('/domestic-scheduled', [FlightController::class, 'DomesticScheduled'])->name('flight.domestic-scheduled');
    Route::get('/flight', [FlightController::class, 'FlightForm'])->name('flight.flight-form');
    Route::get('/airline', [FlightController::class, 'Airline'])->name('flight.airline');
    Route::get('/flight-standby-information', [FlightController::class, 'FlightStandbyInformation'])->name('flight.standby-information');
});

//02-guide
Route::prefix('guide')->group(function(){
    Route::get('/flight-process', [GuideController::class, 'flightProcess'])->name('guide.flight-process');
    Route::get('/check-in', [GuideController::class, 'checkIn'])->name('guide.check-in');
    Route::get('/security-notice', [GuideController::class, 'securityNotice'])->name('guide.security-notice');
    Route::get('/concession-ticket', [GuideController::class, 'concessionTicket'])->name('guide.concession-ticket');
    Route::get('/relevant-regulation', [GuideController::class, 'relevantRegulation'])->name('guide.relevant-regulation');
    Route::get('/tax-refund', [GuideController::class, 'taxRefund'])->name('guide.tax-refund');
});

//03-service
Route::prefix('service')->group(function(){
    Route::get('/floor-plan', [ServiceController::class, 'floorPlan'])->name('service.floor-plan');
    Route::get('/service-facilities', [ServiceController::class, 'serviceFacilities'])->name('service.facilities');
    // 服務設施內頁
    Route::get('/facility-information', [ServiceController::class, 'facilityInformation'])->name('service.facility-information');
    Route::get('/financial-service', [ServiceController::class, 'financialService'])->name('service.financial-service');
    Route::get('/insurance-service', [ServiceController::class, 'insuranceService'])->name('service.insurance-service');
    Route::get('/telecommunication-network', [ServiceController::class, 'telecommunicationNetwork'])->name('service.telecommunication-network');
    Route::get('/cars-rental-service', [ServiceController::class, 'carsRentalService'])->name('service.cars-rental-service');
    Route::get('/food-stores', [ServiceController::class, 'foodStores'])->name('service.food-stores');
    Route::get('/tourist-counter', [ServiceController::class, 'touristCounter'])->name('service.tourist-counter');
    Route::get('/baggage-packing', [ServiceController::class, 'baggagePacking'])->name('service.baggage-packing');
    Route::get('/storage-services', [ServiceController::class, 'storageServices'])->name('service.storage-services');
    Route::get('/medical-service', [ServiceController::class, 'medicalService'])->name('service.medical-service');
    // 無障礙服務
    Route::get('/accessible-transportation', [ServiceController::class, 'accessibleTransportation'])->name('service.accessible-transportation');
    Route::get('/accessible-service', [ServiceController::class, 'accessibleService'])->name('service.accessible-service');
    Route::get('/accessible-passengers', [ServiceController::class, 'accessiblePassengers'])->name('service.accessible-passengers');
    Route::get('/baby-stroller', [ServiceController::class, 'babyStroller'])->name('service.baby-stroller');
    Route::get('/lost-property', [ServiceController::class, 'lostProperty'])->name('service.lost-property');
    // 旅客申訴
    Route::get('/passenger-complaints', [ServiceController::class, 'passengerComplaints'])->name('service.passenger-complaints');
    Route::get('/complaint-regulations', [ServiceController::class, 'complaintRegulations'])->name('service.complaint-regulations');
});

//04-traffic
Route::prefix('traffic')->group(function(){
    // 機場交通路由
    Route::get('/google-map', [TrafficController::class, 'googleMap'])->name('traffic.google-map');
    Route::get('/parking-lot', [TrafficController::class, 'parkingLot'])->name('traffic.parking-lot');
    Route::get('/taxi-service', [TrafficController::class, 'taxiService'])->name('traffic.taxi-service');
    Route::get('/car-rental-service', [TrafficController::class, 'carRentalService'])->name('traffic.car-rental-service');
    Route::get('/bus-information', [TrafficController::class, 'busInformation'])->name('traffic.bus-information');
    Route::get('/sightseeing-guide', [TrafficController::class, 'sightseeingGuide'])->name('traffic.sightseeing-guide');
});
