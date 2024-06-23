@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-2xl mb-2 font-medium">Create Categories</h1>
    <hr class="mb-2" />

    <form action="/dashboard/categories" method="POST" class="flex flex-col gap-y-4">
        @csrf
        <div class="max-w-sm space-y-3">
            <input type="text" id="name" name="name"
                class="py-3 px-4 block border-2 w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Programmer..">
        </div>

        <div class="max-w-sm space-y-3">
            <input type="text" id="slug" name="slug"
                class="py-3 px-4 block border-2 w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                placeholder="seperti-ini..">
        </div>

        <button type="submit"
            class="bg-transparent w-fit h-fit hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Create
        </button>
    </form>
@endsection
