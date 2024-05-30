// Funtzioa sortu 'id'-etan aplikatzeko
function validarInput(id) {
    // 1 - 'inputQueSea' ID-ak hartzeko
    // 2 - 'balidazioa'. Expresio erregularra, non 'inputQueSea' baloreari, HTML-tik datorren 'pattern' etiketa ezartzen zaio
    // 3 - 'inputValido'. Aurretik deklaratutako bi bariableen froga. 'inputQueSea'-ren balioa 'balidazioa.test'-etik pasatzen du
    // 4 - 'boxShadowStyle'. Balidazioak egiteko erabiliko dugun style bat
    let inputQueSea = document.getElementById(id);
    // console.log(inputQueSea);
    let balidazioa = new RegExp(inputQueSea.pattern);
    let inputValido = balidazioa.test(inputQueSea.value);
    let boxShadowStyle = '0 0 1em red';

    // console.log(inputQueSea);
    // console.log(balidazioa);


    // 1 - if '!inputValido', hau da, inputValido-ren kontrakoa gertatzen bada:
    // 1.1 - 'mostrarNotiError(inputQueSea.title)': HTML-tik 'title' etiketa hartzen du eta notifikazioan idazten du
    // 1.2 - 'inputshake' klasea ezartzen zaio input-ari
    // 1.3 - Lehen deklaratu dugun estiloa baita ezartzen zaio

    // 2 - Datuak zuzenak izatekotan:
    // 2.1 - 'inputshake' klasea egotekotan, ezabatu egiten du
    // 2.2 - Lehen deklaratu dugun estiloa 'none' bihurtzen du
    if (!inputValido) {
        mostrarNotiError(inputQueSea.title);
        inputQueSea.classList.add('inputshake');
        inputQueSea.style.boxShadow = boxShadowStyle;
        return false;
    } else {
        inputQueSea.classList.remove('inputshake');
        inputQueSea.style.boxShadow = "none";
        return true;
    }
}

// 'datuakBalidatu()' funtzioa sortu. Aurreko funtzioekin balidazioak egiteko
function datuakBalidatu() {
    // 1 - Datuak egokiak baldin badira, kode hasieran jarrita dagoen bezala, .submit() egingo du
    // 1.1 - Input-en balioa hartzen du
    // 1.2 - Pasahitzak berdinak direla balidatzen du, bestela 'inputshake' klasea eta estiloa ezartzen dio errore moduan
    // 1.3 - Datu horiek 'nuevosdatos' objeto berrian sartzen ditu
    // 1.4 - 'DatosRegister' deituko den Array bat sortzen du
    // 1,5 - 'nuevosdatos' sortu dugun Array-an sartzen du
    // 1.6 - LocalStorage-en String bihurtuz, aurreko Array-a ateratzen du konsolan
    // 2 - Datuak okerrak izatekotan, banan banan balidatuko ditu
    if (validarInput("Nom") && validarInput("Email") && validarInput("Clave") && validarInput("Clave2")) {

        let izena = document.getElementById('Nom').value;
        let email = document.getElementById('Email').value;
        let pasa = document.getElementById('Clave').value;
        let pasa2 = document.getElementById('Clave2').value;
        let pasa2input = document.getElementById('Clave2');
        let boxShadowStyle = '0 0 1em red';
        let mensajecontradistinta = 'Pasahitzak ez dira berdinak. Mesedez zuzendu berdinak izateko.';

        if (pasa !== pasa2) {
            mostrarNotiError(mensajecontradistinta);
            pasa2input.classList.add('inputshake');
            pasa2input.style.boxShadow = boxShadowStyle;
            return false;
        }

        let nuevosdatos = {
            nombre: izena,
            correo: email,
            contra: pasa,
            contra2: pasa2,
        };

        let datosLocalStorage = JSON.parse(localStorage.getItem('DatosRegister')) || [];

        datosLocalStorage.push(nuevosdatos);

        localStorage.setItem('DatosRegister', JSON.stringify(datosLocalStorage));

        console.log('Datuak ondo daude')
        return true;
    } else {
        console.log('Diferentes');
        console.log('Datuak txarto daude')
        return false;
    }
}