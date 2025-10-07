<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Booking Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fc; }
        .official-header { background-color: #003366; /* Deep Blue - official/professional */ color: white; }
        .card-shadow { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
        .detail-item { padding: 10px 0; border-bottom: 1px dashed #e5e7eb; }
        .detail-item:last-child { border-bottom: none; }
    </style>
</head>
<body class="p-4 sm:p-8">
    <div class="max-w-4xl mx-auto">

        <div class="official-header text-white text-center py-6 rounded-t-xl">
            <h1 class="text-xl font-extrabold tracking-widest uppercase">
                Islamic Republic of Afghanistan
            </h1>
            <h2 class="text-sm font-light mt-1">
                Ministry of Foreign Affairs
            </h2>
        </div>
        
        @php
            $isConfirmed = in_array($booking->status, ['Confirmed', 'Verified']);
            $statusClass = $isConfirmed ? 'bg-green-100 border-green-500 text-green-700' : 
                           ($booking->status === 'Canceled' ? 'bg-red-100 border-red-500 text-red-700' : 
                           'bg-yellow-100 border-yellow-500 text-yellow-700');
            $statusText = $isConfirmed ? 'OFFICIALLY VERIFIED & CONFIRMED' : 'STATUS: ' . strtoupper($booking->status);
        @endphp

        <div class="card-shadow bg-white rounded-b-xl p-8 mb-6 border-t-4 border-gray-200">
            <div class="{{ $statusClass }} border-l-8 p-4 mb-6 rounded-md">
                <p class="font-bold text-lg">
                    {{ $statusText }}
                </p>
                <p class="text-sm mt-1">
                    Booking Reference: <span class="font-mono font-semibold">{{ $booking->serial_no }}</span>
                </p>
            </div>

            <h3 class="text-xl font-bold text-gray-700 border-b pb-2 mb-4">
                Booking Summary
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12">
                <div class="detail-item">
                    <strong class="text-gray-500 block text-sm">Service / Package:</strong>
                    <span class="text-base font-medium text-gray-800">{{ optional($booking->package)->name ?? 'N/A' }}</span>
                </div>
                <div class="detail-item">
                    <strong class="text-gray-500 block text-sm">Service Location:</strong>
                    {{ optional($booking->department)->name ?? 'N/A' }}
                </div>
                <div class="detail-item">
                    <strong class="text-gray-500 block text-sm">Appointment Date & Time:</strong>
                    {{ Carbon\Carbon::parse($booking->booking_date)->format('l, F j, Y') }} at {{ Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}
                </div>
                <div class="detail-item">
                    <strong class="text-gray-500 block text-sm">Total Attendees:</strong>
                    {{ $booking->participants->count() + 1 }} Person(s)
                </div>
            </div>
        </div>

        <div class="card-shadow bg-white rounded-xl p-8 mb-6">
            <h3 class="text-xl font-bold text-gray-700 border-b pb-2 mb-4">
                Client Details
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12">
                @if ($booking->info)
                    <div class="detail-item">
                        <strong class="text-gray-500 block text-sm">Applicant Name:</strong>
                        {{ $booking->info->full_name }}
                    </div>
                    <div class="detail-item">
                        <strong class="text-gray-500 block text-sm">Email / Phone:</strong>
                        {{ $booking->info->email }} / {{ $booking->info->phone }}
                    </div>
                    <div class="detail-item md:col-span-2">
                        <strong class="text-gray-500 block text-sm">Address:</strong>
                        {{ $booking->info->full_address }}
                    </div>
                @else
                    <div class="col-span-2 text-gray-500">No primary customer contact information available.</div>
                @endif
            </div>

            @if ($booking->participants->count() > 0)
                <h4 class="text-lg font-bold text-gray-700 border-b pt-4 pb-2 mt-6 mb-4">
                    Additional Participants ({{ $booking->participants->count() }})
                </h4>
                <ul class="divide-y divide-gray-100">
                    @foreach ($booking->participants as $participant)
                        <li class="py-3 flex justify-between text-base">
                            <span class="font-medium text-gray-800">{{ $participant->full_name }}</span>
                            <span class="text-gray-500 text-sm">Relation: {{ $participant->relation ?? 'N/A' }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        
        <p class="text-xs text-center text-gray-500 mt-6">
            This document is an official digital verification of an appointment reservation. Any alteration or unauthorized use is strictly prohibited. Verification performed on: {{ Carbon\Carbon::now()->format('Y-m-d H:i:s') }}.
        </p>

    </div>
</body>
</html>