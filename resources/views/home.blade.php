<!doctype html>
<html class="scroll-smooth duration-500">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MixNetwork | Home</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  @vite('resources/css/app.css')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> 
</head>
<body class="bg-WhiteCol font-din">
@include('navbar')
  <section id="main">
    <div class="flex justify-center items-center">
      <div class="w-full m-[2em] mx-[5em] lg:flex md:gap-[2em]">
        <div class="bg-FooterBlue w-full h-fit mb-[2em] md:h-[20em]">
          <div id="controls-carousel" class="relative w-full h-fit" data-carousel="static">
              <div class="relative h-[15em] overflow-hidden md:h-[20em]">
                @foreach ($images as $image)
                  @if ($image->is_active)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                      <img src="data:image/jpeg;base64,{{ $image->base64_image }}" class="w-full h-[20em] object-fill" alt="...">
                    </div>
                  @endif
                @endforeach
              </div>
            <!-- Slider controls -->
              <button type="button" class="absolute bottom-10 top-2 md:top-0 start-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10">
                  <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                  </svg>
                  <span class="sr-only">Previous</span>
                </span>
              </button>
              <button type="button" class="absolute bottom-10 top-2 md:top-0 end-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10">
                  <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
                  <span class="sr-only">Next</span>
                </span>
              </button>
          </div>
        </div>

        <div class="bg-BlueCol text-WhiteCol rounded-md p-[1em] w-full h-fit mb-[2em] md:h-[15em] lg:h-[20em]">
          <div class=" flex justify-center">
            <h1 class="font-bold text-2xl md:text-[2em]">
              MIX <span class="font-thin">NETWORK</span>
            </h1>
          </div>
          <div class="flex justify-center pt-[1em] md:pt-[0.6em] md:px-[0.5em] 2xl:pt-[1em]">
            <p class="text-sm font-thin md:text-[0.9em] 2xl:text-[1.3em]">{{ $aboutUs->content }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="projects">
    <div class="flex justify-center m-[2em] hover:cursor-default">
        <p class="font-thin text-[2em] lg:text-[3em]">
            OUR 
            <span class="text-BlueCol font-bold">
                INITIAL PROJECTS
            </span>
        </p>
    </div>
    <div class="m-[2em] space-y-[2em]">
        <div class="flex justify-center">
            <img src="/logo/hop.png" class="w-[10em] md:w-[15em] object-contain">
        </div>
        <div class="flex justify-center">
            <div class="grid grid-flow-row grid-cols-3 lg:grid-cols-5 gap-[1em] md:gap-[3em] py-[2em]">
                @foreach ($projects as $project)
                <a href="{{ route('projects.show', $project->id) }}">
                    <img src="data:image/jpeg;base64,{{ $project->image }}" class="w-[15em] object-contain hover:scale-110 duration-300" alt="{{ $project->name }}">
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section id="service">
      <div class="flex justify-center m-[2em] hover:cursor-default">
        <p class="font-thin text-[2em] lg:text-[3em]">
          OUR MAIN
          <span class="text-BlueCol font-bold">
            SERVICES
          </span>
        </p>
      </div>
      
      <div class="flex justify-center md:gap-[1em]">
        <div class="grid grid-flow-row grid-cols-1 space-y-[1em] md:space-y-0 md:gap-[2em] 2xl:gap-[4em] md:grid-cols-3">
          @foreach($services as $service)
          <div class="bg-BlueCol w-[13em] h-[22em] lg:w-[17em] lg:h-[20em] xl:w-[22em] 2xl:w-[30em] 2xl:h-[26em] p-[1em] 2xl:p-[2em] text-WhiteCol">
            <h1 class="flex justify-center md:text-[1.5em] lg:text-[2em] 2xl:text-[2.5em] items-center font-bold">
              {{ $service->title }}
            </h1>
            <p class="flex justify-center md:text-[0.9em] lg:text-[1em] 2xl:text-[1.5em] font-thin">
              {{ $service->description }}
            </p> 
          </div> 
          @endforeach
        </div>        
      </div>
  </section>

  <section id="programs" class="p-[3em]">
    <div class="flex justify-center items-center">
      <h1 class="font-thin text-[1em] md:text-[2em]">
        A FEW OF OUR <span class="font-bold text-BlueCol">SUCCESS STORIES</span>
      </h1>
    </div>
    <div class="m-[2em] space-y-[1em]">
      <a href="/portfolio" class="hover:bg-FooterBlue hover:text-WhiteCol font-medium rounded-md p-[0.4em] duration-300 md:text-[1.5em] md:ml-[2em] 2xl:ml-[10em]">View All</a>
        <div class="md:flex md:justify-center md:space-x-[2em]">
            @foreach ($latestPortfolios as $portfolio)
                <div class="space-y-[1em]">
                  <a href="{{ route('portfolio.content', $portfolio->id) }}">
                  @if($portfolio->images->isNotEmpty())
                        <img src="data:image/jpeg;base64,{{ $portfolio->images->first()->image }}" class="w-[25em] object-contain" alt="{{ $portfolio->name }}">
                    @else
                        <img src="/images/placeholder.png" class="w-[25em] object-contain" alt="{{ $portfolio->name }}">
                    @endif
                </a>
                    
                </div>
            @endforeach
        </div>
    </div>
  </section>

  <section id="partners">
    <div class="flex justify-center">
      <h1 class="font-thin text-[2em] lg:text-[3em]">
        OUR <span class="font-bold text-BlueCol">PARTNERS</span>
      </h1>
    </div>
    <div class="bg-UnitsHov space-y-[2em] pb-[1em]">
      <div class="flex justify-center gap-[1em] md:gap-[2em] m-[1em]">
        @foreach ($partners as $partner)
        <img src="data:image/jpeg;base64,{{ $partner->logo }}" class="w-[5em] md:w-[10em] object-contain hover:scale-110 duration-300"> 
        @endforeach
      </div>
    </div>
  </section>
@include('footer')
</body>
</html>
