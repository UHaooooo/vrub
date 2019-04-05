<?php

namespace Tests\Feature;

use App;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use DatabaseTransactions;

    // Test vehicles database
    public function testVehicle()
    {
        $vehicle = factory(App\Vehicle::class)->create();

        $this->assertDatabaseHas('vehicles', [
            'id' => $vehicle->id,
            'registration_number_id' => $vehicle->registration_number_id,
            'engine_number' => $vehicle->engine_number,
            'chassis_number' => $vehicle->chassis_number,
            'production_year' => $vehicle->production_year,
            'original_status' => $vehicle->original_status,
            'engine_capacity' => $vehicle->engine_capacity,
            'number_of_seat' => $vehicle->number_of_seat,
            'color' => $vehicle->color,
            'fuel_type' => $vehicle->fuel_type,
            'purpose' => $vehicle->purpose,
            'brand' => $vehicle->brand,
            'model' => $vehicle->model,
            'vehicle_type' => $vehicle->vehicle_type,
            'laden_weight' => $vehicle->laden_weight,
            'unladen_weight' => $vehicle->unladen_weight,
            'kerb_weight' => $vehicle->kerb_weight,
        ]);
    }

    // Test areas database
    public function testArea()
    {
        $area = factory(App\Area::class)->create();

        $this->assertDatabaseHas('areas', [
            'id' => $area->id,
            'code' => $area->code,
            'name' => $area->name,
        ]);
    }

    // Test citizens database
    public function testCitizen()
    {
        $citizen = factory(App\Citizen::class)->create();

        $this->assertDatabaseHas('citizens', [
            'id' => $citizen->id,
            'identification_number' => $citizen->identification_number,
            'name' => $citizen->name,
            'address' => $citizen->address,
            'postcode' => $citizen->postcode,
            'city' => $citizen->city,
            'state' => $citizen->state,
        ]);
    }

    // Test tenders database
    public function testTender()
    {
        $tender = factory(App\Tender::class)->create();

        $this->assertDatabaseHas('tenders', [
            'id' => $tender->id,
            'registration_number_id' => $tender->registration_number_id,
            'tender_session_id' => $tender->tender_session_id,
            'citizen_id' => $tender->citizen_id,
            'tender_amount' => $tender->tender_amount,
            'paid_amount' => $tender->paid_amount,
            'status' => $tender->status,
            'tender_date' => $tender->tender_date,
            'tender_success_date' => $tender->tender_success_date,
            'expiry_date' => $tender->expiry_date,
        ]);
    }

    // Test tender_sessions database
    public function testTenderSession()
    {
        $tender_session = factory(App\TenderSession::class)->create();

        $this->assertDatabaseHas('tender_sessions', [
            'id' => $tender_session->id,
            'name' => $tender_session->name,
            'start_date' => $tender_session->start_date,
            'end_date' => $tender_session->end_date,
            'area_id' => $tender_session->area_id,
        ]);
    }

    // Test vehicle_insurances database
    public function testVehicleInsurance()
    {
        $vehicle_insurance = factory(App\VehicleInsurance::class)->create();

        $this->assertDatabaseHas('vehicle_insurances', [
            'id' => $vehicle_insurance->id,
            'commencement_date' => $vehicle_insurance->commencement_date,
            'expiry_date' => $vehicle_insurance->expiry_date,
            'status' => $vehicle_insurance->status,
            'vehicle_id' => $vehicle_insurance->vehicle_id,
        ]);
    }

    // Test vehicle_licenses database
    public function testVehicleLicense()
    {
        $vehicle_license = factory(App\VehicleLicense::class)->create();

        $this->assertDatabaseHas('vehicle_licenses', [
            'id' => $vehicle_license->id,
            'commencement_date' => $vehicle_license->commencement_date,
            'expiry_date' => $vehicle_license->expiry_date,
            'amount_paid' => $vehicle_license->amount_paid,
            'status' => $vehicle_license->status,
            'vehicle_id' => $vehicle_license->vehicle_id,
        ]);
    }

    // Test vehicle_registration_numbers database
    public function testVehicleRegistrationNumber()
    {
        $vehicle_registration_number = factory(App\VehicleRegistrationNumber::class)->create();

        $this->assertDatabaseHas('vehicle_registration_numbers', [
            'id' => $vehicle_registration_number->id,
            'registration_number' => $vehicle_registration_number->registration_number,
            'status' => $vehicle_registration_number->status,
            'area_id' => $vehicle_registration_number->area_id,
        ]);
    }
}
