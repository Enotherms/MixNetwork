<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tags</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold text-gray-700">Manage Tags</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form for adding and editing tags -->
    <form action="{{ isset($tag) ? route('tagsEdit.update', $tag->id) : route('tagsEdit.store') }}" method="POST" class="mb-4">
        @csrf
        @if(isset($tag))
            @method('PUT')
        @endif

        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
        <input type="text" name="name" id="name" value="{{ $tag->name ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>

        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">{{ isset($tag) ? 'Update Tag' : 'Add Tag' }}</button>
    </form>

    <!-- Tag list -->
    <h2 class="text-lg font-bold text-gray-700">Tag List</h2>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $tag->name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('tagsEdit.edit', $tag->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('tagsEdit.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tag?');" style="display:inline-block;">
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
