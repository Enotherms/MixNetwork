<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Homepage Content</title>
    @vite('resources/css/app.css')
</head>
<body>
@if (session('success'))
        <div class="mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        </div>
    @endif
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold text-gray-700">Edit Homepage Content</h1>
    
    <form action="{{ route('homepage.updateAboutUs') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="about_us" class="block text-gray-700 text-sm font-bold mb-2">About Us:</label>
            <textarea name="content" id="about_us" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $aboutUs->content ?? '' }}</textarea>
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Update About Us</button>
        </div>
    </form>

    <hr class="my-6">

    <h2 class="text-lg font-bold text-gray-700">Add New Service</h2>
    <form action="{{ route('homepage.updateServices') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="new_service_title" class="block text-gray-700 text-sm font-bold mb-2">Service Title:</label>
            <input type="text" name="services[new][title]" id="new_service_title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <label for="new_service_description" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Service Description:</label>
            <textarea name="services[new][description]" id="new_service_description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Add Service</button>
        </div>
    </form>

    <hr class="my-6">

    <h2 class="text-lg font-bold text-gray-700">Service List</h2>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Title
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Description
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <form action="{{ route('homepage.updateServices') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="services[{{ $service->id }}][id]" value="{{ $service->id }}">
                            <input type="text" name="services[{{ $service->id }}][title]" value="{{ $service->title }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <textarea name="services[{{ $service->id }}][description]" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $service->description }}</textarea>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <button type="submit" class="text-blue-600 hover:text-blue-900">Update</button>
                        </form>
                        <form action="{{ route('homepage.deleteService', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($errors->any())
        <div class="mt-4">
            <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
</body>
</html>
