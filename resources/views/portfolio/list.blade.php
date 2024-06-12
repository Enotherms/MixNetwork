@foreach($portfolios as $portfolio)
    <div class="bg-BlueCol w-full md:w-[65%] lg:w-[45%] rounded-md mb-4 p-4">
        <img src="data:image/jpeg;base64,{{ $portfolio->images->first()->image ?? '' }}" class="h-full w-full rounded-md object-cover mb-2" alt="{{ $portfolio->name }}">
        <h2 class="text-white font-bold">{{ $portfolio->name }}</h2>
        <p class="text-white">{{ $portfolio->description }}</p>
        <div class="flex flex-wrap gap-2 mt-2">
            @foreach($portfolio->tags as $tag)
                <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
@endforeach
