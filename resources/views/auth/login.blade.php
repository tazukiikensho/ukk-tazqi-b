<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded shadow w-80">

<h2 class="text-xl font-bold mb-4">Login</h2>

@if(session('error'))
<p class="text-red-500">{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
@csrf

<input type="email" name="email" placeholder="Email" class="border w-full p-2 mb-2">
<input type="password" name="password" placeholder="Password" class="border w-full p-2 mb-4">

<button class="bg-blue-500 text-white w-full p-2 rounded">Login</button>

</form>

</div>

</body>
</html>