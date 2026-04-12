<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Successful - VisionTech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-50 via-white to-green-100 font-sans antialiased min-h-screen flex items-center justify-center">

    <div class="max-w-2xl mx-auto px-4 py-16 text-center">
        <!-- Success Icon -->
        <div class="mb-8">
            <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <!-- Success Message -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
            Subscription Activated!
        </h1>

        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
            Thank you for subscribing to VisionTech. Your <span class="font-semibold text-green-600">{{ ucfirst($plan ?? 'Basic') }}</span> plan is now active.
        </p>

        <!-- Plan Details -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 border border-green-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Your Plan Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Plan</p>
                    <p class="text-lg font-semibold text-gray-900">{{ ucfirst($plan ?? 'Basic') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Status</p>
                    <p class="text-lg font-semibold text-green-600">Active</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-4">
            <a href="{{ route('shopkeeper.dashboard') }}"
               class="inline-block bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transform transition-all duration-200 hover:-translate-y-0.5">
                Go to Dashboard
            </a>

            <p class="text-gray-500">
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-700 underline">
                    Return to Home
                </a>
            </p>
        </div>
    </div>

</body>
</html>