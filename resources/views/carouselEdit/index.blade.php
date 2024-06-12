<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload and View Images</title>
    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<x-app-layout>


<body class="font-din">
    <div class="bg-FooterBlue w-[7em] h-fit p-[0.7em] flex justify-center items-center mt-[2em] ml-[22em] rounded-lg hover:scale-110 duration-300 hover:cursor-pointer text-WhiteCol font-bold">
        <a href="{{ route('dashboard') }}">Back</a>
    </div>
<div class="container mx-auto mt-8">
    <div class="w-fit mx-[22em]">
        <h2 class="font-bold text-[1em] text-WhiteCol w-fit bg-FooterBlue p-[1em] rounded-lg hover:cursor-default">Add Carousel Image</h2>
        @if ($message = Session::get('success'))
            <div class="w-fit rounded-lg p-[1em] my-[2em] bg-BlueCol text-WhiteCol" role="alert">
                <strong class="font-bold">{{ $message }}</strong>
            </div>
        @endif

        <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data" class="mb-4 mt-[1em]">
            @csrf
            <div class="mb-4">
                <input type="file" name="image" required class="form-input mt-1 block w-full hover:cursor-pointer">
            </div>
            <button type="submit" class="font-bold bg-FooterBlue text-WhiteCol p-[1em] rounded-lg hover:scale-110 duration-300">Upload Image</button>
        </form>


        <h2 class="text-xl font-semibold mb-4">Uploaded Images</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6">#</th>
                        <th class="py-3 px-6">Image</th>
                        <th class="py-3 px-6">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                @foreach ($images as $image)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $loop->index + 1 }}</td>
                        <td class="py-3 px-6 text-left">
                            <!-- Display base64 encoded image -->
                            <img src="data:image/jpeg;base64,{{ $image->base64_image }}" alt="Carousel Image" class="h-12">
                        </td>
                        <td class="py-3 px-6 text-left">
                            <!-- Toggle Active/Inactive Form -->
                            <form action="{{ route('carousel.toggleActive', $image->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">{{ $image->is_active ? 'Deactivate' : 'Activate' }}</button>
                            </form>
                            <!-- Delete Form -->
                            <form action="{{ route('carousel.destroy', $image->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-sm bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</x-app-layout>
</html>