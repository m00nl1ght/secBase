const surnameElem = $("#visitor_surname");
const nameElem = $("#visitor_name");
const patronymicElem = $("#visitor_patronymic");
const firmElem = $("#visitor_firm");

//отправка запроса
let sendRequest = function(key, data) {
    let url = '';
    if(window.location.pathname == '/visitor/new') {
        url = "/visitor/autoinsert";
    } else if(window.location.pathname == '/car/new') {
        url = "/car/autoinsert";
    }

    let request = $.ajax({
        url: url,
        type: "POST",
        data: {"_token": $('meta[name="csrf-token"]').attr('content'),
            "key" : key,
            "data" : data },
        dataType: "json"
    });
        
    return request;
}

//вставка в форму автоподстановки
let insertIntoForm = function(data) {
    surnameElem.val(data.surname);
    nameElem.val(data.name);
    patronymicElem.val(data.patronymic);
    $("#visitor_phone").val(data.phone);
    firmElem.val(data.firm.name);
}

surnameElem.keyup(function() {
    if(this.value.length >= 3) {
        let resp = sendRequest('surname', this.value);

        resp.done(function(response) {   
            $("#autosubstitution").empty();

            response.forEach(element => { //собираем варианты автоподстановки
                let newElem = $('<li class="p-0 my-1 list-group-item"></li>');
                let newElemForm = $(`<form action="#" method="post" name="${element.id}"></form`);
                let newElemFormButton = $('<button class="w-100 btn btn-outline-secondary text-left" type="submit"></button>');

                newElemFormButton.text(`${element.surname} ${element.name} ${element.patronymic}`);

                newElemForm.append(newElemFormButton).submit(function() { //обработчик форм автоподстановки
                    event.preventDefault();

                    let resp = sendRequest('id', $(this).attr('name'));
                    resp.done(function(response) {
                        insertIntoForm(response);
                    })         
                });

                $("#autosubstitution").append(newElem.append(newElemForm)); //выводим собранные варианты на экран
            });
        });
    }
}); 

//показать варианты автоподскановки при фокусе
surnameElem.focus(function() {
    let insertElem = $('<ul id="autosubstitution" class="position-absolute w-100 m0 list-group bg-light"></ul>');
    surnameElem.after(insertElem);
});

//скрыть варианты автоподскановки при фокусе
surnameElem.blur(function() {
    setTimeout(function(){
        $("#autosubstitution").remove();
    }, 300);  
});

//инпуты с большой буквы
let inputBigLetterElem = document.querySelectorAll(".capitalize");
inputBigLetterElem.forEach(function(e) {
    e.addEventListener("input", function() {
        this.value = this.value[0].toUpperCase() + this.value.slice(1);
      });
});


//чекбоксы
const checkboxAllElem = document.querySelectorAll('input[type=checkbox]');

for (let checkBox of checkboxAllElem) {
    checkBox.addEventListener('click', (elem) => elem.target.toggleAttribute('checked') );
}

    //группы чекбоксов
const checkboxMainElem = document.querySelectorAll('.js-checkbox-main');

checkboxMainElem.forEach((elem) => {
    elem.addEventListener('click', (el) => {
        checkboxElems = el.target.closest('.js-checkbox').querySelectorAll('.js-checkbox-sub');

        if(el.target.getAttribute('aria-checked') == 'false') {
            el.target.setAttribute('aria-checked', 'true');

            if(el.target.getAttribute('name')) {
                sub = document.querySelector('.js-checkbox-' + el.target.getAttribute('name'));
                sub.removeAttribute('disabled');
            } 

            checkboxElems.forEach((elems) => {
                elems.closest('label').classList.remove('text-secondary');
                elems.removeAttribute('disabled');
            });
        } else {
            el.target.setAttribute('aria-checked', 'false');

            if(el.target.getAttribute('name')) {
                sub = document.querySelector('.js-checkbox-' + el.target.getAttribute('name'));
                sub.closest('label').classList.add('text-secondary');
                sub.setAttribute('disabled', 'disabled');
                sub.checked = false;
                sub.removeAttribute('checked');
                sub.setAttribute('aria-checked', 'false')
                subChildren = sub.closest('.js-checkbox').querySelectorAll('.js-checkbox-sub');

                subChildren.forEach((elems) => {
                    elems.closest('label').classList.add('text-secondary');
                    elems.setAttribute('disabled', 'disabled');
                    elems.checked = false;
                    elems.removeAttribute('checked');
                });
            } 

            checkboxElems.forEach((elems) => {
                elems.closest('label').classList.add('text-secondary');
                elems.setAttribute('disabled', 'disabled');
                elems.checked = false;
                elems.removeAttribute('checked');
            });
        }
    });
});
