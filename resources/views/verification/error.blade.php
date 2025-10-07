<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Failed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fef2f2; }
        .error-card { border: 2px solid #f87171; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="max-w-xl mx-auto p-8 bg-white rounded-xl shadow-xl error-card text-center">
        <div class="text-red-500 mb-4">
            <svg class="mx-auto h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Verification Failed</h1>
        <p class="text-lg text-red-600 mb-6 font-medium">
            {{ $message ?? 'An unknown error occurred during verification.' }}
        </p>
        <hr class="mb-6">
        <p class="text-gray-500 text-sm">
            Please verify the QR code's source or contact the issuing office for assistance.
        </p>
    </div>
</body>
</html>