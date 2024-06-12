<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  @vite('resources/css/app.css')
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body class="bg-BGCol">
  <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between sticky top-0 z-50">
    <div class="flex justify-between items-center ">
      <span class="text-2xl font-[Poppins] cursor-pointer">
        <a href="/">
        <img class="hover:scale-110 duration-300 w-[3em] h-auto md:w-auto md:block md:h-[1.2em] md:pl-[5em] lg:h-[1.5em] xl:h-[2em]" src="/logo/mix.png" alt="MixNetworkLogo"></a>
      </span>

      <span class="text-3xl cursor-pointer mx-2 md:hidden block">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>

    <ul class="bg-white w-full left-0 absolute
      md:flex md:items-center z-[-1] md:z-auto md:static md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:pr-[4em] 
      md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
      <li class="mx-4 my-6 md:my-0">
      <a href="/" class="lg:text-[1.5em] font-medium
      hover:bg-FooterBlue hover:p-[0.3em] hover:rounded-[0.5em] hover:text-WhiteCol duration-300">Home</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="/#projects" class="lg:text-[1.5em] font-medium
      hover:bg-FooterBlue hover:p-[0.3em] hover:rounded-[0.5em] hover:text-WhiteCol duration-300">Projects</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="/#service" class="lg:text-[1.5em] font-medium
      hover:bg-FooterBlue hover:p-[0.3em] hover:rounded-[0.5em] hover:text-WhiteCol duration-300">Services</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="/portfolio" class="lg:text-[1.5em] font-medium
      hover:bg-FooterBlue hover:p-[0.3em] hover:rounded-[0.5em] hover:text-WhiteCol duration-300">Portfolio</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="/#partners" class="lg:text-[1.5em] font-medium
      hover:bg-FooterBlue hover:p-[0.3em] hover:rounded-[0.5em] hover:text-WhiteCol duration-300">Partners</a>
      </li>
    </ul>
  </nav>


  <script>
    function Menu(e){
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close",list.classList.add('top-[80px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[80px]'),list.classList.remove('opacity-100'))
    }
  </script>
</body>

</html>