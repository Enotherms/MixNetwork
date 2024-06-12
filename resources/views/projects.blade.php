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
    @include('navtest')
    <section>
      <div class="flex justify-center p-[2em] hover:cursor-default">
        <h1 class="font-thin text-[3em]">
          OUR <span class="font-bold text-BlueCol">INITIAL PROJECT</span>
        </h1>
      </div>
      <div class="flex justify-center">
        <img src="/logo/hop.png" alt="Hangout Project" class="p-[2em]" >
      </div>
    </section>

    <section>
      <div class="flex justify-center items-center p-[5em]">
          <img src="/logo/sps.png" alt="Super Podcast Show" class="flex justify-center object-contain w-[50%] h-[25em] pl-[8em]">
        <div class="w-[50%] h-[25em] pr-[8em]">
          <h2 class="text-[2em] font-bold">SUPER PODCAST SHOW</h2>
          <p class="text-[1em] pt-[1em]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere sunt ipsum, natus impedit quam a eum voluptates, sed doloribus facilis consectetur ullam cumque adipisci inventore, aut reiciendis. Facilis, deleniti sapiente.</p>
          <div class="flex justify-start gap-[2em]">
            <div class="justify-center flex-col">
              <h1 class="text-[5em] font-bold text-BlueCol">10</h1>
              <h1 class="text-[1em] font-medium flex justify-center">Kota</h1>
            </div>
            <div class="justify-center flex-col">
              <h1 class="text-[5em] font-bold text-BlueCol">21</h1>
              <h1 class="text-[1em] font-medium flex justify-center">Event</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="flex justify-center">
        <a href="/portfolio" class="text-[3em] font-thin pb-[0.6em]">OUR <span class="text-BlueCol font-bold">PORTFOLIOS</span></a>
      </div>
      <div class="flex justify-center space-x-[5em] pb-[5em]">
        <div class="space-y-[1em]">
          <img src="/images/dummy4.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
        <div class="space-y-[1em]">
          <img src="/images/dummy5.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
        <div class="space-y-[1em]">
          <img src="/images/dummy6.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
      </div>
      <div class="flex justify-center space-x-[5em] pb-[5em]">
        <div class="space-y-[1em]">
          <img src="/images/dummy4.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
        <div class="space-y-[1em]">
          <img src="/images/dummy5.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
        <div class="space-y-[1em]">
          <img src="/images/dummy6.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
      </div>
      <div class="flex justify-center space-x-[5em] pb-[5em]">
        <div class="space-y-[1em]">
          <img src="/images/dummy4.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
        <div class="space-y-[1em]">
          <img src="/images/dummy5.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
        <div class="space-y-[1em]">
          <img src="/images/dummy6.png" class="w-[30em] object-contain hover:scale-110 duration-300">
        </div>
      </div>
      <!-- PAGINATION -->
      <div class="flex justify-center gap-[1em] pb-[2em]"> 
        <h1 class="bg-FooterBlue w-fit h-fit p-[0.5em] rounded-md text-WhiteCol">1</h1>
        <h1 class="bg-FooterBlue w-fit h-fit p-[0.5em] rounded-md text-WhiteCol">2</h1>
        <h1 class="bg-FooterBlue w-fit h-fit p-[0.5em] rounded-md text-WhiteCol">3</h1>
      </div>
    </section>
    @include('footer')

</body>
</html>