<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($project) ? 'Edit Project' : 'Add Project' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold text-gray-700">{{ isset($project) ? 'Edit Project' : 'Add New Project' }}</h1>
    <form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($project))
            @method('PUT')
        @endif

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $project->name ?? '' }}" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ $project->description ?? '' }}</textarea><br>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="{{ $project->date ?? '' }}" required><br>

        <label for="tags">Tags:</label>
        <div>
            @foreach($tags as $tag)
                <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                        @if(isset($project) && $project->tags->contains($tag->id)) checked @endif>
                    {{ $tag->name }}
                </label>
            @endforeach
        </div><br>

        <label for="image">Project Image:</label>
        <input type="file" name="image" id="image"><br>
        @if(isset($project) && $project->image)
            <div class="mt-2">
                <img src="data:image/jpeg;base64,{{ $project->image }}" width="150" class="inline-block">
            </div>
        @endif

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">{{ isset($project) ? 'Update' : 'Add' }}</button>
    </form>
    <hr class="my-6">
    <h2 class="text-lg font-bold text-gray-700">Project List</h2>
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
                    Date
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Tags
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Image
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $project->name }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $project->description }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ \Carbon\Carbon::parse($project->date)->format('Y-m-d') }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @foreach($project->tags as $tag)
                            {{ $tag->name }}@if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if($project->image)
                            <img src="data:image/jpeg;base64,{{ $project->image }}" width="100">
                        @endif
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('projects.edit', $project->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" style="display:inline-block;">
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
