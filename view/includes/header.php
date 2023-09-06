
  
<header>

  <nav class="wrapper h-20 flex items-center justify-between">
    <a href="./" class="w-1/3 max-w-[140px]">
      <img src="/view/resources/images/logo-php.png">
      
    </a>

    <input type="checkbox" id="menu" class="peer hidden">
    <label for="menu" class="bg-open-menu w-6 h-5 bg-cover bg-center cursor-pointer peer-checked:bg-close-menu transition-all z-8 md:hidden"></label>

    <div class="fixed inset-0 bg-gradient-to-b from-white/70 to-black/70 translate-x-full peer-checked:translate-x-0 transition-transform z-8 md:static md:bg-none md:translate-x-0">

      <ul class="absolute inset-x-0 top-24 p-12 bg-white w-[90%] mx-auto rounded-md h-max text-center grid gap-6 font-bold text-dark-blue shadow-2xl md:w-max md:bg-transparent md:p-0 md:grid-flow-col md:static">

        <li>
            <a href="#">Home</a>
        </li>

        <!-- <li>
            <a href="#">Product</a>
        </li>

        <li>
            <a href="#">About Us</a>
        </li>

        <li>
            <a href="#">Careers</a>
        </li>

        <li>
            <a href="#">Community</a>
        </li>
      </ul> -->

    </div>
        <a class="button shadow-sm shadow-bright-red/30 hidden py-3 lg:block transition duration-150 ease-in-out cursor-pointer" onclick="modalHandler('btnModalAddCust')">Agregar Cliente</a>
  </nav>
</header>