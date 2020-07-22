const obj = {
    welcome   : document.querySelector('#welcome'),
    exit : document.querySelector('#exit')
}

//---------------------------------------------------------------------------
function ReadJsonFile() {
    fetch('/json')
        .then(data => data.json())
        .then(data => {
            const file =  data.substring(1, data.length-1),
                  value = JSON.parse(file);
            obj.welcome.innerHTML = `<h3>Добро пожаловать ${value.name}</h3>`;
        })
}
//--------------------------------------------------------------------------------
obj.exit.addEventListener('click', function () {

    const fD = new FormData();
    fD.append('id', getCookie('admin_id'));
    fD.append('table', getCookie('table'));


    fetch('/exit',{
        method: "POST",
        body: fD
    }).then( text => text.json())
        .then( data => {
            setCookie('admin_id','',0);
            setCookie('uPd','',0);
            setCookie('table','',0);
            setCookie('SameSite','None',365);
            window.location.href = `${data[0]}`;
        })
})

ReadJsonFile();

