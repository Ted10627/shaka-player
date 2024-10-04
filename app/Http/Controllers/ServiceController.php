<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function floorPlan()
    {
        return Inertia::render('Frontend/03-service/FloorPlan01', []);
    }

    public function serviceFacilities()
    {
        return Inertia::render('Frontend/03-service/ServiceFacilities', []);
    }

    // 服務設施內頁
    public function facilityInformation()
    {
        return Inertia::render('Frontend/03-service/FacilityInformation', []);
    }

    public function financialService()
    {
        return Inertia::render('Frontend/03-service/FinancialService', []);
    }

    public function insuranceService()
    {
        return Inertia::render('Frontend/03-service/InsuranceService', []);
    }

    public function telecommunicationNetwork()
    {
        return Inertia::render('Frontend/03-service/TelecommunicationNetwork', []);
    }

    public function carsRentalService()
    {
        return Inertia::render('Frontend/03-service/CarRentalService', []);
    }

    public function foodStores()
    {
        return Inertia::render('Frontend/03-service/FoodStores', []);
    }

    public function touristCounter()
    {
        return Inertia::render('Frontend/03-service/TouristCounter', []);
    }

    public function baggagePacking()
    {
        return Inertia::render('Frontend/03-service/BaggagePacking', []);
    }

    public function storageServices()
    {
        return Inertia::render('Frontend/03-service/StorageServices', []);
    }

    public function medicalService()
    {
        return Inertia::render('Frontend/03-service/MedicalService', []);
    }

    // 無障礙服務
    public function accessibleTransportation()
    {
        return Inertia::render('Frontend/03-service/AccessibleTransportation', []);
    }

    public function accessibleService()
    {
        return Inertia::render('Frontend/03-service/AccessibleService', []);
    }

    public function accessiblePassengers()
    {
        return Inertia::render('Frontend/03-service/AccessiblePassengers', []);
    }

    public function babyStroller()
    {
        return Inertia::render('Frontend/03-service/BabyStroller', []);
    }

    public function lostProperty()
    {
        return Inertia::render('Frontend/03-service/LostProperty', []);
    }

    // 旅客申訴
    public function passengerComplaints()
    {
        return Inertia::render('Frontend/03-service/PassengerComplaints', []);
    }

    public function complaintRegulations()
    {
        return Inertia::render('Frontend/03-service/ComplaintRegulations', []);
    }
}
