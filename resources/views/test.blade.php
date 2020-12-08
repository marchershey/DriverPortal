<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test Page</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}?{{ rand() }}">

    <script src="{{ mix('js/app.js') }}?{{ rand() }}" defer></script>
</head>

<body>
    <div class="fixed flex inset-0 z-50 bg-black bg-opacity-75">
        <div class="flex self-center items-center justify-center w-full h-full p-8">
            <div class="flex flex-col overflow-hidden bg-white rounded w-full max-w-md max-h-full">

                <!-- Header -->
                <div class="flex-shrink-0 flex items-center justify-between p-4 border-b">
                    Header
                    <button>x</button>
                </div>

                <!-- Content -->
                <div class="relative p-4 overflow-y-auto">
                    <p>Content</p>
                    <p>Content</p>
                </div>

                <!-- Footer -->
                <div class="flex-shrink-0 flex items-center p-4 border-t">Footer</div>

            </div>
        </div>
    </div>

</body>

</html>
