const obj = {
    welcome   : document.querySelector('#welcome'),
    exit : document.querySelector('#exit'),
    formAdd : document.forms['formAddAdmins'],
    formDel : document.forms['formDelAdmin'],
    arrInp  : document.forms['formAddAdmins'].querySelectorAll('.form-control'),
    table   : document.querySelector('.tableAdmins'),
    massAdm : [],
    arrIcDel: [],
    arrIcEd : []
}
//-----------------------------------------------------------------------------------------------------------------
const massInp = function massInputsForm() {

    let form = obj.formAdd;
    const inpArr = [
        {
            inp: form['name'],
            name: 'name',
        },
        {
            inp: form['patronymic'],
            name: 'patronymic',
        },
        {
            inp: form['surname'],
            name: 'surname',

        },
        {
            inp: form['email'],
            name: 'email',

        },
    ];

    return inpArr;
}
//-----------------------------------------------------------------------------------------------------------------
obj.formAdd.addEventListener('submit', function (ev) {

    ev.preventDefault();

    let form = obj.formAdd,
        inpArr = massInp(),
        answ = {};

    inpArr.forEach((el) => {
        answ[el.name] = el.inp.value;

    });
    sendObj(answ);
});
//-----------------------------------------------------------------------------------------------------
function sendObj(answ) {

    let str = encodeURIComponent(JSON.stringify(answ)),
        url = `/reg/addAdmin?value=${str}`;


    fetch(url).then((response)=> {  return response.text();})
        .then((text)=>{obj.formAdd.nextElementSibling.innerHTML = text;
            for(let i=0; i<obj.arrInp.length; i++){

                obj.arrInp[i].value = '';
                getAllAdmins();
                setTimeout(()=> {obj.formAdd.nextElementSibling.innerHTML = '';}, 10000);

            }
        });
}
//------------------------------------------------------------------------------------------------------
const delAdmin = function DeleteAdmin(ev){

    const url = '/reg/delAdmin',
        fD = new FormData();
    let  data = '';

    if(ev.target.hasAttribute('id'))
    {
        data = ev.target.id.slice(ev.target.id.indexOf('_')+1);
    }

    fD.append('email', data);

    fetch(url,{
        method: "POST",
        body: fD
    }).then( response => response.text())
        .then( text => {
            window.location.reload();
        });

}
//-------------------------------------------------------------------------------------------------------
const getAllAdmins = function getAll()
{
    fetch('/inf/admins').then( data => data.json())
        // .then( arr => console.log(arr));
        .then(arr=>{ createTable(arr);
            obj.massAdm = arr;})

}
//-------------------------------------------------------------------------------------------------------
const createTable = function createAdminsTable(arr){

    // rex.massAdmins = arr;
    const table = obj.table;
    //   Удаляю всех детей!!!
    while(table.hasChildNodes()){
        table.removeChild(table.firstChild);
    }
    //Формирую строки
    let trs = "<tr><th>Delete</th><th>Edit</th><th>ФИО</th><th>Email</th><th>Последний визит</th></tr>";
    arr.forEach(el=>{
        trs = `${trs}<tr><td class="iconsDel"><i class="material-icons" id="del_${el.email}">delete</i></td>   
                         <td class="iconsEd"><i class="material-icons" id="ed_${el.email}">create</i></td>   
                         <td>${el.surname}<br>${el.name}<br>${el.patronymic}<br></td>
                         <td>${el.email}</td>
                         <td>${el.last_visit}<br></td></tr>`;
    });

    table.innerHTML = trs;


    obj.arrIcDel.push(document.querySelectorAll(".iconsDel"));
    obj.arrIcEd.push(document.querySelectorAll(".iconsEd"));
    addListtenerDel(obj.arrIcDel[0]);
    addListtenerEd(obj.arrIcEd[0]);

}
//----------------------------------------------------------------------------------------------------
const fillInp = function fillInputsForm(arr){

    const inpArr = massInp();

    for(let i = 0; i < inpArr.length; i++){
        for (key in arr) {
            if(inpArr[i].name === key){
                inpArr[i].inp.value = arr[key];
            }
        }
    }
}
//--------------------------------------------------------------------------------------------------
const getMassindex = function getMassIndexById(ev)
{
    const arr = obj.massAdm;
    let data = '';
    if(ev.target.hasAttribute('id')){

        data = ev.target.id.slice(ev.target.id.indexOf('_')+1);
        arr.forEach( el =>{
            if(el.email === data){
                fillInp(el);
            }

        });
    }
}
//---------------------------------------------------------------------------------------------------
const addListtenerDel = function addToArrListenerDel(arr){
    for (let i = 0; i < arr.length; i++ ){

        arr[i].addEventListener('click', delAdmin);
    }
}
//----------------------------------------------------------------------------------------------------
const addListtenerEd = function addToArrListenerEd(arr){
    for (let i = 0; i < arr.length; i++ ){

        arr[i].addEventListener('click', getMassindex);
    }
}

//---------------------------------------------------------------------------
function ReadJsonFile() {
    // fetch('/json')
    //     .then(data => data.json())
    //     .then(data => {
    //         const file =  data.substring(1, data.length-1),
    //               value = JSON.parse(file);
    //         obj.welcome.innerHTML = `<h3>Добро пожаловать ${value.name}</h3>`;
        // })
    let user = localStorage.getItem('user');
    obj.welcome.innerHTML = `<h3>Добро пожаловать ${user}</h3>`;

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
            localStorage.removeItem('user');
            window.location.href = `${data[0]}`;
        })
})

ReadJsonFile();
getAllAdmins();



