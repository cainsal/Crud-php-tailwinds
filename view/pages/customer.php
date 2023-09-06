<!-- <div class="w-full min-h-screen font-sans text-gray-900 bg-gray-50 flex"> -->
      <main class="flex-1  p-5">
        <div class="">
          <table class="w-full border-b border-gray-200">
            <thead>
              <tr class="text-sm font-medium text-gray-700 border-b border-gray-200">
                <td class="pl-10">
                  <div class="flex items-center gap-x-4">
                    <input
                      type="checkbox"
                      class="w-6 h-6 text-indigo-600 rounded-md border-gray-300"
                      indeterminate="indeterminate"
                    />
                    <span>Nombres y  Apellidos</span>
                  </div>
                </td>
                <td class="py-4 px-4 text-center">DNI</td>
                <td class="py-4 px-4 text-center">Celular</td>
                <td class="py-4 px-4 text-center">Correo</td>            
                <td class="py-4 px-4 text-center">Rol</td>
                <td class="py-4 px-4 text-center">Estado</td>
                <td class="py-4 px-4 text-center">Acciones</td>            
              </tr>
            </thead>
            <tbody>
              <?php 

                foreach($listCustomer as $rowCus){
                  $codCus = $rowCus['codUser'];
                  $codClie = $rowCus['codCli'];
                  $nombres = $rowCus['nombres'];
                  $apePaterno = $rowCus['apePaterno'];
                  $apeMaterno = $rowCus['apeMaterno'];
                  $pais = $rowCus['nomPais'];
                  $fechNac= $rowCus['fechNac'];
                  $fechNacConver = new DateTime($fechNac);
                  $numDoc = $rowCus['numDoc'];
                  $celular = $rowCus['celular'];
                  $correo = $rowCus['correo'];
                  $descRol = $rowCus['descParValor'];
                          
                ?>
              <tr
                class="hover:bg-gray-100 transition-colors group"
              >
                <td class="flex gap-x-4 items-center py-4 pl-10">
                  <input
                    type="checkbox"
                    class="w-6 h-6 text-indigo-600 rounded-md border-gray-300"
                  />
                  <img
                    :src="product.imageUrl"
                    alt=""
                    class="w-40 aspect-[3/2] rounded-lg object-cover object-top border border-gray-200"
                  />
                  <div>
                    <a href="#" class="text-lg font-semibold text-gray-700">
                      <?php echo $nombres;?>
                    </a>
                    <div class="font-medium text-gray-400"><?php echo $apePaterno." ".$apeMaterno;?></div>
                  </div>
                </td>
                <td class="font-medium text-center"><?php echo $numDoc;?></td>
                <td class="font-medium text-center"><?php echo $celular;?></td>
                <td class="text-center">
                  <span class="font-medium"><?php echo $correo;?></span>              
                </td>
                <td>
                  <div class="flex gap-x-2 justify-center items-center">
                    <a
                      href="#"
                      class="p-2 bg-gray-200 rounded-md hover:bg-gray-300"
                    >
                      <?php echo $descRol;?>
                    </a>
                  </div>
                </td>
                <td>
                  <button class="p-2 rounded-md transition ease-in-out delay-50 bg-green-500 hover:-translate-y-1 hover:scale-110 hover:bg-emerald-500 duration-300">
                    <span class="text-gray-100 hover:text-sky-200">
                      Activo
                    </span>
                  </button>
                </td>
                <td>
                  <span class="inline-block group-hover:hidden">
                    Pais
                  </span>
                  <div
                    class="hidden group-hover:flex group-hover:w-20 group-hover:items-center group-hover:text-gray-500 group-hover:gap-x-2"
                  >    
                    <button 
                      id=""
                      name=""
                      onclick="modalHandler('btnModalEditCust',<?php echo $codCus?>,<?php echo $codClie?>)"
                      class="p-2 hover:rounded-md hover:bg-gray-800"
                    >                     
                      <i class='bx bx-edit-alt text-green-500 text-3xl' ></i>
                    </button>
                    <button 
                      id=""
                      name=""
                      onclick="modalHandler('btnModalDeleteCust',<?php echo $codCus?>,<?php echo $codClie?>)"
                      class="p-2 hover:rounded-md hover:bg-gray-800"
                    >
                      <i class='bx bxs-trash text-red-700 text-3xl'></i>
                    </button>
                  </div>
                </td>
              </tr>
                <?php                     
                  }
                ?>
            </tbody>
          </table>
        </div>
      </main>
<!-- </div> -->






<!-- MODAL ADD CUSTOMER -->
    <div class="fixed py-24 transition duration-150 ease-in-out z-50 top-0 right-0 bottom-0 left-0 hidden" id="modalAddCus">
      <div class="fixed block p-6 inset-0 bg-gray-500 bg-opacity-75 transition-opacity overflow-x-hidden overflow-y-auto">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg z-40">                  
          <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400 m-8 z-40">              
            <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
            </svg>
              
            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Registrar Cliente</h1>
            
            <form id="formAddCustomer" method="POST" enctype="multipart/form-data" novalidate>
              <div class="floating-input-container">
                <select
                  name="tipoDocu" 
                  id="tipoDocu" 
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border"
                >
                  <option value="1">DNI</option>
                  <option value="2">Pasaporte</option>
                  <option value="3">Carnet de extranjería</option>
                </select>
                <label for="tipoDocu" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Tipo de documento</label>
              </div>
              
              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="numDocumen"
                  name="numDocumen"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                >
                <label for="numDocumen" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Número de documento</label>
              </div>

              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="names"
                  name="names"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                >
                <label for="names" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Nombres</label>
              </div>
              
              <div class="md:grid grid-cols-2 ">
                <div class="grid grid-rows-1">
                  <div class="floating-input-container">
                    <input 
                      type="text" 
                      id="apePater"
                      name="apePater"
                      class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border md:w-11/12 w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border" 
                      placeholder=""
                    >
                    <label for="apePater" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Apellido Paterno</label>
                  </div>  
                </div>
                <div class="grid grid-rows-1">
                  <div class="floating-input-container">
                    <input 
                      type="text" 
                      id="apeMater"
                      name="apeMater"
                      class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border" 
                      placeholder=""
                    >
                    <label for="apeMater" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Apellido Materno</label>
                  </div>
                
                  <!-- <label for="apeMaterno" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Apellido Materno</label>
                  <input id="apeMaterno" class="mb-4 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="Apellido Materno" /> -->
                </div>
              </div>


              <div class="floating-input-container">
                <select
                  name="genero" 
                  id="genero" 
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border"
                >                  
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                </select>
                <label for="genero" class="text-gray-400 bg-white text-sm leading-tight tracking-normal w-20">Genero</label>
              </div>

              <div class="floating-input-container">
                <select
                  name="pais" 
                  id="pais" 
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border"
                >
                  <option value="1">Perú</option>
                </select>
                <label for="pais" class="text-gray-400 bg-white text-sm leading-tight tracking-normal w-20">País</label>
              </div>            

              <label for="fechNac01" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Fecha de Nacimiento</label>
              <input id="fechNac01" 
                      name="fechNac01"
                      type="date"  
                      max="<?= date('Y-m-d'); ?>"
                      class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 pr-3 text-sm border-gray-300 rounded border"
                      placeholder="dd/mm/aaaa"/>

              
              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="fechNac" 
                  name = "fechNac"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder="dd/mm/aaaa"
                >
                <label for="fechNac" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Fecha de nacimiento </label>
              </div>

              <div class="floating-input-container">
                <input 
                  type="file" 
                  id="imgDocument"
                  name="imgDocument"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                >    
                <label for="imgDocument" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Celular</label>
              </div>

              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="cellphone"
                  name="cellphone"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                >
                <label for="cellphone" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Celular</label>
              </div>
              <div class="floating-input-container">
                <input 
                  type="email" 
                  id="email"
                  name="email"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                  required
                >
                <label for="email" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Correo</label>
              </div>
              <div class="floating-input-container">
                <input 
                  type="password" 
                  id="pass"
                  name="pass"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                  required
                >
                <label for="pass" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Contraseña</label>
              </div>

              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="rol"
                  name="rol"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                  required
                >
                <label for="rol" class="text-gray-400 bg-white text-sm leading-tight tracking-normal">Rol</label>
              </div>


              <!-- <label for="names" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nombres</label>
              <input id="names" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="Nombres" /> -->

              <!-- <label for="email2" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Card Number</label>
              <div class="relative mb-5 mt-2">
                  <div class="absolute text-gray-600 flex items-center px-4 border-r h-full">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <rect x="3" y="5" width="18" height="14" rx="3" />
                          <line x1="3" y1="10" x2="21" y2="10" />
                          <line x1="7" y1="15" x2="7.01" y2="15" />
                          <line x1="11" y1="15" x2="13" y2="15" />
                      </svg>
                  </div>
                  <input id="email2" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border" placeholder="XXXX - XXXX - XXXX - XXXX" />
              </div>
              <label for="expiry" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Expiry Date</label>
              <div class="relative mb-5 mt-2">
                  <div class="absolute right-0 text-gray-600 flex items-center pr-3 h-full cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <rect x="4" y="5" width="16" height="16" rx="2" />
                          <line x1="16" y1="3" x2="16" y2="7" />
                          <line x1="8" y1="3" x2="8" y2="7" />
                          <line x1="4" y1="11" x2="20" y2="11" />
                          <rect x="8" y="15" width="2" height="2" />
                      </svg>
                  </div>
                  <input id="expiry" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="MM/YY" />
              </div>
              <label for="cvc" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">CVC</label>
              <div class="relative mb-5 mt-2">
                  <div class="absolute right-0 text-gray-600 flex items-center pr-3 h-full cursor-pointer">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z"></path>
                          <circle cx="12" cy="12" r="9"></circle>
                          <line x1="12" y1="8" x2="12.01" y2="8"></line>
                          <polyline points="11 12 12 12 12 16 13 16"></polyline>
                      </svg>
                  </div>
                  <input id="cvc" class="mb-8 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="MM/YY" />
              </div> -->

              

              <div class="flex items-center justify-start w-full">
                  <button 
                    type="submit"
                    id="btnAddCustomer"
                    name="btnAddCustomer"
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                  >
                    Save
                  </button>
                  <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" onclick="modalHandler()">Cancelar</button>
              </div>
              <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modalAddCus" role="button">
                <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <line x1="18" y1="6" x2="6" y2="18" />
                  <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div> 


    <!-- MODAL EDIT -->
         
    <div class="fixed py-24 transition duration-150 ease-in-out z-50 top-0 right-0 bottom-0 left-0 hidden" id="modalEditCus">
      <div class="fixed block p-6 inset-0 bg-gray-500 bg-opacity-75 transition-opacity overflow-x-hidden overflow-y-auto">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg z-40">                  
          <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400 m-8 z-40">              
            <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
            </svg>
              
            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Editar Cliente</h1>
            
            <form id="formEditCustomer" method="POST" enctype="multipart/form-data" novalidate>
              <input type="text" id="codCusEC" name="codCusEC" class="hidden">
              <input type="text" id="codCliEC" name="codCliEC" class="hidden">
              <div class="floating-input-container">
                <select
                  name="tipoDocuEC" 
                  id="tipoDocuEC" 
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border"
                >
                  <option value="1">DNI</option>
                  <option value="2">Pasaporte</option>
                  <option value="3">Carnet de extranjería</option>
                </select>
                <label for="tipoDocuEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Tipo de documento</label>
              </div>
              
              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="numDocumenEC"
                  name="numDocumenEC"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                >
                <label for="numDocumenEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Número de documento</label>
              </div>

              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="namesEC"
                  name="namesEC"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                >
                <label for="namesEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Nombres</label>
              </div>
              
              <div class="md:grid grid-cols-2 ">
                <div class="grid grid-rows-1">
                  <div class="floating-input-container">
                    <input 
                      type="text" 
                      id="apePaterEC"
                      name="apePaterEC"
                      class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border md:w-11/12 w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border" 
                      placeholder=""
                    >
                    <label for="apePaterEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Apellido Paterno</label>
                  </div>  
                </div>
                <div class="grid grid-rows-1">
                  <div class="floating-input-container">
                    <input 
                      type="text" 
                      id="apeMaterEC"
                      name="apeMaterEC"
                      class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border" 
                      placeholder=""
                    >
                    <label for="apeMaterEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Apellido Materno</label>
                  </div>
                
                  <!-- <label for="apeMaterno" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Apellido Materno</label>
                  <input id="apeMaterno" class="mb-4 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="Apellido Materno" /> -->
                </div>
              </div>


              <div class="floating-input-container">
                <select
                  name="generoEC" 
                  id="generoEC" 
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border"
                >                  
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                </select>
                <label for="generoEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal w-20 active">Genero</label>
              </div>

              <div class="floating-input-container">
                <select
                  name="paisEC" 
                  id="paisEC" 
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-4 text-xs border-gray-300 rounded border"
                >
                  <option value="1">Perú</option>
                </select>
                <label for="paisEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal w-20 active">País</label>
              </div>            

              <label for="fechNac01EC" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Fecha de Nacimiento</label>
              <input id="fechNac01EC" 
                      name="fechNac01EC"
                      type="date"  
                      max="<?= date('Y-m-d'); ?>"
                      class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 pr-3 text-sm border-gray-300 rounded border"
                      placeholder="dd/mm/aaaa"/>

              
              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="fechNacEC" 
                  name = "fechNacEC"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder="dd/mm/aaaa"
                >
                <label for="fechNacEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Fecha de nacimiento </label>
              </div>

              <div class="floating-input-container">
                <input 
                  type="file" 
                  id="imgDocumentEC"
                  name="imgDocumentEC"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                >    
                <label for="imgDocumentEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Imagen</label>
              </div>

              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="cellphoneEC"
                  name="cellphoneEC"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                >
                <label for="cellphoneEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Celular</label>
              </div>
              <div class="floating-input-container">
                <input 
                  type="email" 
                  id="emailEC"
                  name="emailEC"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                  required
                >
                <label for="emailEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Correo</label>
              </div>
              <div class="floating-input-container">
                <input 
                  type="password" 
                  id="passEC"
                  name="passEC"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                  required
                >
                <label for="passEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Contraseña</label>
              </div>

              <div class="floating-input-container">
                <input 
                  type="text" 
                  id="rolEC"
                  name="rolEC"
                  class="text-black focus:outline-none focus:border-gray-600 font-normal focus:border w-full h-10 flex items-center pl-5 text-xs border-gray-300 rounded border" 
                  placeholder=""
                  required
                >
                <label for="rolEC" class="text-gray-400 bg-white text-sm leading-tight tracking-normal active">Rol</label>
              </div>              

              <div class="flex items-center justify-start w-full">
                  <button 
                    type="submit"
                    id="btnEditCustomer"
                    name="btnEditCustomer"
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                  >
                    Update
                  </button>
                  <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" onclick="modalHandler()">Cancelar</button>
              </div>
              <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modalEditCus" role="button">
                <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <line x1="18" y1="6" x2="6" y2="18" />
                  <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>


     <!-- MODAL DELETE -->
         
     <div class="fixed py-24 transition duration-150 ease-in-out z-50 top-0 right-0 bottom-0 left-0 hidden" id="modalDeleteCus">
      <div class="fixed block p-6 inset-0 bg-gray-500 bg-opacity-75 transition-opacity overflow-x-hidden overflow-y-auto">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg z-40">                  
          <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400 m-8 z-40">              
            <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
            </svg>
              
            <h2 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Eliminar Cliente</h2>
            
            <form id="formDeleteCustomer" method="POST" enctype="multipart/form-data" novalidate>
              <input type="text" id="codCusDC" name="codCusDC" class="hidden">
              <input type="text" id="codCliDC" name="codCliDC" class="hidden">
                   

              <div class="flex items-center justify-start w-full">
                  <button 
                    type="submit"
                    id="btnDeleteCustomer"
                    name="btnDeleteCustomer"
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                  >
                    Delete
                  </button>
                  <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" onclick="modalHandler()">Cancelar</button>
              </div>
              <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modalEditCus" role="button">
                <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <line x1="18" y1="6" x2="6" y2="18" />
                  <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>