const obj = {
    form : document.forms['LogIn'],
    welcome : document.querySelector('#welcome')
}
//-----------------------------------------------------------------------------
obj.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    const url = '/LogIn',
         fD = new FormData();

    fD.append('login',obj.form[0].value);
    fD.append('password', obj.form[1].value);

    fetch(url, {
        method: 'POST',
        body: fD
    }).then(e => e.json())
        .then( data => {
            if(data.length === 2){
                setCookie('table', data[1][0], 1);
                setCookie('admin_id', data[1][2], 1);
                setCookie('uPd', data[1][3], 1);
                window.location.href = `${data[0]}`
                obj.welcome.innerHTML = `<h3>Добро пожаловать ${data[1][1]}`;
            }else{
                obj.form.nextElementSibling.innerHTML = data;
                console.log(data);
            }
        })
})