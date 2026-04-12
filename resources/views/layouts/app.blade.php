<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="flex min-h-screen">
        {{-- @include('layouts.navbar') --}}
        @include('layouts.sidebar')
        <!-- Main content -->
        <main class="flex-1 p-6 ">
            <section>

                @yield('content')
            </section>
        </main>
