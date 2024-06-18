<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($portfolio) ? 'Edit Portfolio' : 'Add Portfolio' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold text-gray-700">{{ isset($portfolio) ? 'Edit Portfolio' : 'Add New Portfolio' }}</h1>
    <form action="{{ isset($portfolio) ? route('portfolios.update', $portfolio->id) : route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($portfolio))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" name="name" id="name" value="{{ $portfolio->name ?? '' }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <textarea name="description" id="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $portfolio->description ?? '' }}</textarea>
        </div>

        <div class="mb-4">
            <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">Project:</label>
            <select name="project_id" id="project_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ (isset($portfolio) && $portfolio->project_id == $project->id) ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
            <div class="flex flex-wrap gap-2">
                @foreach($tags as $tag)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-checkbox" @if(isset($portfolio) && $portfolio->tags->contains($tag->id)) checked @endif>
                        <span class="ml-2">{{ $tag->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <label for="images" class="block text-gray-700 text-sm font-bold mb-2">Project Images (up to 6):</label>
            <input type="file" name="images[]" id="images" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @if(isset($portfolio) && $portfolio->images)
                <div class="mt-2">
                    @foreach($portfolio->images as $image)
                        <img src="data:image/jpeg;base64,{{ $image->image }}" width="100" class="inline-block">
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">{{ isset($portfolio) ? 'Update' : 'Add' }}</button>
        </div>
    </form>
    <hr class="my-6">
    <h2 class="text-lg font-bold text-gray-700">Portfolio List</h2>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Name
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Description
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Tags
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Project
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Images
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portfolios as $portfolio)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $portfolio->name }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $portfolio->description }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @foreach($portfolio->tags as $tag)
                            <span class="inline-block bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $portfolio->project->name ?? 'N/A' }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex flex-wrap gap-2">
                            @foreach($portfolio->images as $image)
                                <div class="relative">
                                    <img src="data:image/jpeg;base64,{{ $image->image }}" width="100" class="inline-block">
                                    <form action="{{ route('portfolioImages.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');" class="absolute top-0 right-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-xs">x</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('portfolios.manage', ['id' => $portfolio->id]) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this portfolio?');" style="display:inline-block;">
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
