<!doctype html>
<html>
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
    <section>
      <div class="p-[2em] flex justify-center items-center">
        <h1 class="font-thin text-[2em] md:text-[4em]">
          OUR <span class="font-bold text-BlueCol">INITIAL PROJECT</span>
        </h1>
      </div>
      <div class="flex justify-center">
        <img src="/logo/hop.png" alt="Hangout Project" class="pb-[2em] w-[12em] md:w-[20em]" >
      </div>
    </section>

    <section>
      <div class="md:flex justify-center items-center">
        <div class="flex justify-center items-center">
          <img src="data:image/jpeg;base64,{{ $project->image }}" alt="{{ $project->name }}" class=" w-[12em] md:w-[30em]">
        </div>
        <div class="px-[4em] py-[2em] space-y-[1em]">
          <h1 class="flex justify-center font-bold md:text-[1.5em]">{{ $project->name }}</h1>
          <p class="md:w-[25em] md:text-[1em] flex justify-center items-center">{{ $project->description }}</p>
          <div class="flex justify-center md:justify-normal gap-[2em]">
            <div>
              <h1 class="font-bold text-BlueCol text-[2em] md:text-[4em]">
                {{ $portfolioCount }}
              </h1>
              <h2 class="font-normal text-[2em] md:text-[2em]">
                Event{{ $portfolioCount > 1 ? 's' : '' }}
              </h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    @include('footer')

</body>
</html>
