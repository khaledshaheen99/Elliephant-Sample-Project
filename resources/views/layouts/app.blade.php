<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elliephant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="bg-blue-500 p-4 text-white">
            <div class="container mx-auto flex justify-between items-center">
                <span class="text-lg font-bold">Elliephant</span>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            </div>
        </div>

        <div class="container mx-auto p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
