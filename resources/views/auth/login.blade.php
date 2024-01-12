<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-semibold mb-4">Login</h2>
    <form action="{{ url('/login') }}" method="post">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="flex items-center justify-between">
        <button type="submit" style="background-color: #FF0054; color: white;" class="px-4 py-2 rounded-full hover:bg-#FF003D focus:outline-none focus:border-#FF0072 focus:ring focus:ring-#FF0072">
            LOGIN
        </button>
        </div>
    </form>
</div>

</body>
</html>
