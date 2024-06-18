@foreach ($portfolios as $portfolio)
<div class="bg-BlueCol items-center rounded-md w-[35%] h-[10em] md:h-[15em] lg:h-[20em] xl:h-[25em] 2xl:h-[30em] p-[0.5em] md:p-[1em]">
    <a href="{{ route('portfolio.content', ['id' => $portfolio->id]) }}">
    <img src="data:image/jpeg;base64,{{ $portfolio->images->first()->image ?? '' }}" class="h-full w-full rounded-md object-cover mb-2" alt="{{ $portfolio->name }}">
    </a>
</div>
@endforeach
