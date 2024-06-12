<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($partner) ? 'Edit Partner' : 'Add Partner' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold text-gray-700">{{ isset($partner) ? 'Edit Partner' : 'Add New Partner' }}</h1>

    <form action="{{ isset($partner) ? route('partnersEdit.update', $partner->id) : route('partnersEdit.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($partner))
            @method('PUT')
        @endif

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $partner->name ?? '' }}" required><br>

        <label for="logo">Logo:</label>
        <input type="file" name="logo" id="logo"><br>

        @if(isset($partner) && $partner->logo)
            <img src="data:image/jpeg;base64,{{ $partner->logo }}" width="100"><br>
        @endif

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">{{ isset($partner) ? 'Update' : 'Add' }}</button>
    </form>

    <hr class="my-6">

    <h2 class="text-lg font-bold text-gray-700">Partner List</h2>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Name
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Logo
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $partner->name }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <img src="data:image/jpeg;base64,{{ $partner->logo }}" width="100" class="inline-block">
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('partnersEdit.index', ['partner' => $partner->id]) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('partnersEdit.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this partner?');" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
