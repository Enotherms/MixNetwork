<!-- resources/views/portfolio/content.blade.php -->
<!doctype html>
<html class="scroll-smooth duration-500">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $portfolio->name }} | MixNetwork</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  @vite('resources/css/app.css')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <style>
    .thumbnail {
      cursor: pointer;
    }
  </style>
</head>
<body class="bg-WhiteCol font-din">
    @include('navbar')
    <section>
      <div class="flex justify-center p-[2em]">
        <h1 class="font-thin text-[1.2em] md:text-[1.5em] lg:[2em] xl:text-[3em] 2xl:text-[4em]">
          A FEW OF OUR <span class="font-bold text-BlueCol">SUCCESS STORIES</span>
        </h1>
      </div>
    </section>

    <section>
      <div class="flex justify-center items-center mb-[1em] mx-[1em] gap-[1em] md:mx-[2em] md:gap-[1.5em] lg:mx-[5em]">
          <div class="bg-BlueCol w-[65%] h-[10em] md:h-[15em] lg:h-[20em] xl:h-[25em] 2xl:h-[30em] rounded-md">
            <img id="mainImage" src="data:image/jpeg;base64,{{ $portfolio->images->first()->image ?? '' }}" class="h-full w-full rounded-md object-cover" alt="{{ $portfolio->name }}">
          </div>  
          <div class="bg-BlueCol items-center rounded-md w-[35%] h-[10em] md:h-[15em] lg:h-[20em] xl:h-[25em] 2xl:h-[30em] p-[0.5em] md:p-[1em]">
            <h1 class="text-WhiteCol font-bold text-[0.5em] pb-[0.5em] md:text-[1em] lg:text-[1.2em] xl:text-[2em] 2xl:text-[2.5em]">
              {{ $portfolio->name }}
            </h1>
            <p class="text-WhiteCol text-[0.2em] font-thin md:text-[0.6em] lg:text-[0.8em] xl:text-[1.1em] 2xl:text-[1.4em]">
              {{ $portfolio->description }}
            </p>
          </div>
      </div>
      <div class="flex justify-center mb-[1em] mx-[1em] gap-[1em] md:mx-[2em] md:gap-[1.5em] lg:mx-[5em]">
        <div class="w-[65%]">
          <div class="flex h-[2em] gap-[0.5em] md:h-[4em] lg:gap-[1.5em] xl:h-[6.5em] xl:gap-[2em] 2xl:h-[8.5em] 2xl:gap-[2.5em]">
            @foreach($portfolio->images as $image)
              <div class="thumbnail" data-image="data:image/jpeg;base64,{{ $image->image }}">
                <img src="data:image/jpeg;base64,{{ $image->image }}" class="h-full w-full rounded-md object-cover hover:scale-110 duration-300" alt="...">
              </div>
            @endforeach
          </div>
        </div>
        <div class="w-[35%] space-y-[0.3em]">
          @foreach($portfolio->tags as $tag)
            <div class="bg-BlueCol rounded-md w-full h-[1em] md:h-[1.5em] lg:h-[2em] xl:h-[3em] 2xl:h-[4em] flex justify-center items-center p-[0.5em]">
              <h1 class="font-medium text-[0.2em] text-WhiteCol md:text-[0.6em] lg:text-[0.8em] xl:text-[1.2em]">
                {{ $tag->name }}
              </h1>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <section>
      <div class="flex justify-center lg:justify-start lg:pl-[5em]">
        <h1 class="font-thin text-[1em] md:text-[1.5em] lg:[2em] xl:text-[3em]">
         VIDEO HIGHLIGHT<span class="font-bold text-BlueCol"> DOCUMENTATION</span>
        </h1>
      </div>
    </section>

    <section>

    </section>

    @include('footer')

    <script>
      document.querySelectorAll('.thumbnail').forEach(item => {
        item.addEventListener('click', event => {
          document.getElementById('mainImage').src = item.getAttribute('data-image');
        });
      });
    </script>
</body>
</html>
