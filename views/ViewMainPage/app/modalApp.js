const obj = {
    form : document.forms['logIn']
};
//-----------------------------------------------------------------------------------------------------------------
//Обработчик отправки.
obj.form.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.form;
    const inpArr = [
        {
            inp     : form['email'],
            name    : 'email',

        },
        {
            inp     : form['password'],
            name    : 'password',

        },
    ];

    let answ = {};

    inpArr.forEach((el) => {
        answ[el.name] = el.inp.value;

    });

    sendObj(answ);

});

//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    const url = '/login',
        fD = new FormData();

    fD.append('email', answ['email']);
    fD.append('password', answ['password']);


    fetch(url, {
        method: "POST",
        body: fD,
        mode: 'no-cors', // no-cors, cors, *same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
    })
        .then(e => e.json())
         .then(data => {
             if(data.length == 2){
                 //set cookie with data[1]
                 setCookie('user_id', data[1][1], 1);
                 setCookie('uPd', data[1][0], 1);
                 setCookie('table', data[1][2], 1);
                 window.location.href = `http://${data[0]}`;
             }else {

                 obj.form.nextElementSibling.innerHTML = data;
             }
         });
}

//------------------------------------------------------------------------------

