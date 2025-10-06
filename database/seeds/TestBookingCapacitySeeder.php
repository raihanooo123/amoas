<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestBookingCapacitySeeder extends Seeder
{
    public function run()
    {
        $packageId = 2; // Your test package ID
        $testDate = Carbon::tomorrow()->format('Y-m-d');
        $testUserId = 1; // A test user ID

        
        // Booking 1: Main user (1 person)
        $booking1 = \App\Booking::create([
            'user_id' => $testUserId,
            'package_id' => $packageId,
            'department_id' => 108,
            'serial_no' => \App\Booking::genSerialNo(108, $packageId),
            'booking_date' => $testDate,
            'booking_time' => '09:00:00',
            'email' => 'test@example.com',
            'status' => 'Confirmed', 
        ]);

        // Booking 2: Main user (1) + 88 Participants = 89 People
        $booking2 = \App\Booking::create([
            'user_id' => $testUserId,
            'package_id' => $packageId,
            'department_id' => 108,
            'serial_no' => \App\Booking::genSerialNo(108, $packageId),
            'booking_date' => $testDate,
            'booking_time' => '10:00:00',
            'email' => 'test2@example.com',
            'status' => 'Confirmed',
        ]);

        $info2 = $booking2->info()->create([
            // ... required info fields ...
        ]);
        
        // Add 88 participants to this booking
        for ($i = 1; $i <= 88; $i++) {
            $info2->participants()->create([
                'full_name' => 'Participant ' . $i,
                'id_card' => 'ID-' . $i,
                'relation' => 'Friend',
            ]);
        }

        $this->command->info("Test data for '{$testDate}' created: 90 people booked.");
    }
}