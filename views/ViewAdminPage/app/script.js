const obj = {
    welcome   : document.querySelector('#welcome')
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
ReadJsonFile();

