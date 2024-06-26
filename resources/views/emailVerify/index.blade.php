<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Verify Email</title>
</head>

<body>
    <div class="w-full h-screen flex justify-center items-center">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col items-center">
            <h1 class="text-2xl font-semibold mb-4">Please Verify your Email!</h1>
            @if (session('message'))
                <p class="text-sm text-[#E76F51]">Email terkirim!!</p>
            @endif
            <form action="{{ route('verification.send') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Resend
                    Email</button>
            </form>
        </div>
    </div>
</body>

</html>
