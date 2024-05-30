// 'DOMContentLoaded' funtzioa sortzen dugu. HTML-a irakurri ondoren JavaScrpit-a exekutatzeko.
window.addEventListener('DOMContentLoaded', function () {
    // Formularioa, botoia, notifikazioen 'X' botoiaren eta informazioa ikonoaren ID-ak biltzen ditugu
    let formularioa = document.getElementById('registerformularioa');
    let registratubotoia = document.getElementById('ErrBTN');
    let xnoti = document.getElementById('cerrarnoti');
    let xnotiinfo = document.getElementById('cerrarnotiinfo');
    let botoninfo = document.getElementById('infoicono');

    // PreventDefault ezarri. Bestela ezer balidatu gabe submit-a egingo du.
    // Horretarako datuakbalidatu() funtzioa 'true' baldin bada bakarrik egingo du submit-a
    registratubotoia.addEventListener('click', function (event) {
        event.preventDefault();

        if (datuakBalidatu()) {
            formularioa.submit();
        }

});

    // cerrarNoti() funtzioa 'click' egitean deitzen da
    xnoti.addEventListener('click', function () {
        cerrarNoti();
    });
    // mostrarNotiInfo() funtzioa click egitean deitzen da
    botoninfo.addEventListener('click', function () {
        mostrarNotiInfo();
    });

    // cerrarNotiInfo() funtzioa 'click' egitean deitzen da
    xnotiinfo.addEventListener('click', function () {
        cerrarNotiInfo()
    });

});

// 'mostrarNotiError' funtzioa sortu 'mensaje' parametroarekin
// 'mensaje' parametroa, HTML-ko input-en 'title' etiketako balioa izango da
function mostrarNotiError(mensaje) {
    // 'spannoti' eta 'divnoti' deklaratzen dugu haien ID bilatzen
    let spannoti = document.getElementById('MensajeNoti');
    let divnoti = document.getElementById('Noti');
    // 'divnoti'-k lehenetsita dauka 'oculto' klasea, beraz .remove('oculto') egiten diogu ezabatzeko
    // Ostean, 'visible' klasea ezartzen diogu .add bitartez. Horrela notifikazioa agertu egingo da
    divnoti.classList.remove('oculto');
    divnoti.classList.add('visible');

    // 1 - 'spannoti' existitzen baldin bada, 'mensaje' ezarriko zaio
    // 2 - Berriz, 'spannoti' existitzen ez bada:
    // 2.1 - 'span' elementu bat sortuko du
    // 2.2 - Sortutako 'span' horri, 'MensajeNoti' ID-a ezarriko zaio
    // 2.3 - Bukatzeko, 'divnoti'-ri 'spannoti' ezarriko zaio
    if (spannoti) {
        spannoti.innerHTML = mensaje;
    } else {
        spannoti = document.createElement('span');
        spannoti.id = 'MensajeNoti';
        divnoti.appendChild(spannoti);
    }
}

// 'cerrarNoti()' funtzioa sortzen da. Notifikazioen 'X' botoian click egitean, notifikazioa ixteko
function cerrarNoti() {
    // 'divnoti' deklaratu eta ID-a hartu
    let divnoti = document.getElementById('Noti');
    // 'visible' klasea ezabatu eta 'oculto' klasea ezarri
    divnoti.classList.remove('visible');
    divnoti.classList.add('oculto');
}

// Funtzioa sortu informazio pantaila agertzeko
function mostrarNotiInfo() {
    // Botoiaren div-a bilatzen dugu ID bitartez
    let divnotiinfo = document.getElementById('notiinfo');
    // 'oculto' klasea kentzen diogu eta 'visible' ezarri
    divnotiinfo.classList.remove('oculto');
    divnotiinfo.classList.add('visible');
}

// cerrarNotiInfo() funtzioa sortze da. Informazioaren pantailan dagoen 'X'-ean click egitean, pantaila ixteko
function cerrarNotiInfo() {
    // Botoiaren div-a bilatzen dugu ID bitartez
    let divnotiinfo = document.getElementById('notiinfo');
    // 'visible' klasea kentzen diogu eta 'oculto' ezarri
    divnotiinfo.classList.remove('visible');
    divnotiinfo.classList.add('oculto');
}

// aceptarPopUp funtzioa sortzen dugu
    // 1.1 - ID-a bilatzen dugu
    // 1.2 - Style 'none' ezarri
    // 1.3 - login.php orrialdera bidaltzen du
function aceptarPopUp(){
    let divpopup = document.getElementById('popup');
    divpopup.style.display = 'none';
    window.location = 'login.php';
}

// cerrarPopUp() funtzioa sortu
    // 1.1 - ID-a bilatu