    
    function floatingLabelInput(){
        const formAC = document.getElementById('formAddCustomer');
        const formEC = document.getElementById('formEditCustomer');
    
        const inputFieldsAdd = formAC.querySelectorAll('.floating-input-container input');
    
        inputFieldsAdd.forEach((input) => {
        const label = input.nextElementSibling;
            input.addEventListener('focus', () => {
                label.classList.add('active');
            });
            input.addEventListener('blur', () => {
                if (input.value === '') {
                label.classList.remove('active');
                }
            });
        });

        const selectFieldsAdd = formAC.querySelectorAll('.floating-input-container select');

        selectFieldsAdd.forEach((select) => {
            const label = select.nextElementSibling;
            select.addEventListener('focus', () => {
                label.classList.add('active');
            });
            select.addEventListener('blur', () => {
                if (select.value ==='') {
                label.classList.remove('active');
                }
            });
        });

        const inputFieldsEdit = formEC.querySelectorAll('.floating-input-container input');

        inputFieldsEdit.forEach((input) => {
            const label = input.nextElementSibling;
                input.addEventListener('focus', () => {
                    label.classList.add('active');
                });
                input.addEventListener('blur', () => {
                    if (input.value === '') {
                    label.classList.remove('active');
                    }
                });
            });
    
        const selectFieldsEdit = formEC.querySelectorAll('.floating-input-container select');

        selectFieldsEdit.forEach((select) => {
            const label = select.nextElementSibling;
            select.addEventListener('focus', () => {
                label.classList.add('active');
            });
            select.addEventListener('blur', () => {
                if (select.value ==='') {
                label.classList.remove('active');
                }
            });
        });



    };        
    floatingLabelInput();  
      
    
    let modalAddCus = document.getElementById("modalAddCus");
    let modalEditCus = document.getElementById("modalEditCus");
    let modalDeleteCus = document.getElementById("modalDeleteCus");
    let body = document.body;

    

    function modalHandler(val,codCus,codClie) {

        if  (val == 'btnModalAddCust') {
            fadeIn(modalAddCus);
            body.style.overflow= "hidden";
            fadeOut(modalEditCus); 
        } else if(val == 'btnModalEditCust'){
            console.log(codCus,codClie);
            funcShowCustomer(codCus,codClie);
            fadeIn(modalEditCus);
            body.style.overflow= "hidden";
            fadeOut(modalAddCus);  
        }else if(val == 'btnModalDeleteCust'){
            console.log(codCus,codClie);
            funcShowCodCusCli(codCus,codClie);
            fadeIn(modalDeleteCus);
            body.style.overflow= "hidden";
            fadeOut(modalAddCus);
            fadeOut(modalEditCus); 
            
        }else {            
            fadeOut(modalAddCus);
            fadeOut(modalEditCus); 
            fadeOut(modalDeleteCus); 
        }

        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                    body.style.overflow= "visible";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }
        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }
    }

 
  


    /* CREATED CUSTOMER */
    const btnAddCustomer = document.getElementById("btnAddCustomer");
    btnAddCustomer.onclick = funcAddCustomer;

    
    function funcAddCustomer(){
        const formAddCustomer = document.querySelector("#formAddCustomer");
        const dataCustomer = new FormData(formAddCustomer);
        dataCustomer.append('formAddCus', 'formAddCus'); 
        
        $.ajax({
            type: 'POST',
            url: 'controller/customer.controller.php',
            data: dataCustomer,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                                
                console.log(response);
             },
            error: function (error) {
                
                console.log('Errores:',error);   
                // console.log(store);           
            }
        }); 

        

        //     document.forms['formAddCustomer']['names'].focus();
        return false;
        
    }

    /* SHOW CUSTOMER*/

    function funcShowCustomer(codCus,codClie){
        let showDataCus = "showDataCus";
        const showDataCustomer = {
            showDataCus : showDataCus,
            codCus : codCus,
            codClie : codClie,
        }

        $.ajax({
            type: 'POST',
            url: 'controller/customer.controller.php',
            data: showDataCustomer,
            dataType: "json",
            success: function (response) {
                console.log(response);

                document.getElementById('codCusEC').value = response['codUser'];
                document.getElementById('codCliEC').value = response['codCli'];
                document.getElementById('tipoDocuEC').value = response['tipoDoc'] ;
                document.getElementById('numDocumenEC').value = response['numDoc'] ;
                document.getElementById('namesEC').value = response['nombres'];
                document.getElementById('apePaterEC').value = response['apePaterno'];
                document.getElementById('apeMaterEC').value = response['apeMaterno'];

                const [year, month, day] = response['fechNac'].split('-');
                const [dd, time] = day.split(' ');
                const resultFechNac = [year, month, dd].join('-');
                document.getElementById('fechNac01EC').value = resultFechNac;
                document.getElementById('fechNacEC').value = resultFechNac;
            
                document.getElementById('imgDocumentEC').file = response['rutaImgDocum'];

                document.getElementById('cellphoneEC').value = response['celular'];
                document.getElementById('emailEC').value = response['correo'];
                document.getElementById('passEC').value = response['passUser'];
                document.getElementById('rolEC').value = response['codRol'];
            },
            error: function (error) {
                console.log(error);        
            }
        }); 

    }

    /* UPDATE CUSTOMER */
    const btnEditCustomer = document.getElementById("btnEditCustomer");
    btnEditCustomer.onclick = funcUpdateCustomer;

    function funcUpdateCustomer(){
        const formEditCustomer = document.querySelector("#formEditCustomer");
        const dataCustomer = new FormData(formEditCustomer);
        dataCustomer.append('formEditCus', 'formEditCus');

        $.ajax({
            type: 'POST',
            url: 'controller/customer.controller.php',
            data: dataCustomer,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                                
                console.log(response);
             },
            error: function (error) {
                
                console.log('Errores:',error);   
                // console.log(store);           
            }
        }); 

        //     document.forms['formAddCustomer']['names'].focus();
        return false;

    }

    /*DELETE CUSTOMER*/

    function funcShowCodCusCli(codCus,codClie){

        document.getElementById('codCusDC').value = codCus;
        document.getElementById('codCliDC').value = codClie;
        
    }

    const btnDeleteCustomer = document.getElementById("btnDeleteCustomer");
    btnDeleteCustomer.onclick = funcDeleteCustomer;

    function funcDeleteCustomer(){

        const formDeleteCustomer = document.querySelector("#formDeleteCustomer");
        const dataCodCusCli = new FormData(formDeleteCustomer);
        dataCodCusCli.append('formDeleteCus', 'formDeleteCus');


        $.ajax({
            type: 'POST',
            url: 'controller/customer.controller.php',
            data: dataCodCusCli,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);

            },         
            error: function (error) {
                        
                console.log('Errores:',error);   
                // console.log(store);           
            }
        }); 

        return false;
    }