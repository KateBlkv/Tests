
const RULES = {
    name: [
        {
            condition: value => !!value.trim(),
            errorMsg: "Введите имя"
        },
        {
            condition: value => value.trim().length >= 2,
            errorMsg: "Минимум 2 символа"
        }
    ],
    phone: [
        {
            condition: value => {
                let regex = /^\d[\d\(\)\ -]{4,14}\d$/;
                return regex.test(value);
            },
            errorMsg: "Введите номер корректно"
        }
    ],
    email:[
        {
            condition: value => {
                let regex = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
                return regex.test(value);
            },
            errorMsg: "Введите email корректно"
        }
    ],
    description:[
        {
            condition: value => !!value.trim(),
            errorMsg: "Задайте вопрос"
        }
    ]
};

let checkValidation = {};

function validate(value, inputName) {
    const rules = RULES[inputName];
    for (const rule of rules) {
        if (rule.condition(value)) continue;
        checkValidation[inputName] = false;
        return rule.errorMsg;
    }
    checkValidation[inputName] = true;
    return '';
}

function setError(elem, msg){
    elem.nextElementSibling.innerText = msg;
}


const feedbackForm = document.forms.feedbackForm;
feedbackForm.elements.name.addEventListener('blur', function (event){
    const errorMsg = validate(event.target.value, event.target.name);
    setError(this, errorMsg);
    switchAble();
});

feedbackForm.elements.phone.addEventListener('blur', function (event){
    const errorMsg = validate(event.target.value, event.target.name);
    setError(this, errorMsg);
    switchAble();
});

feedbackForm.elements.email.addEventListener('blur', function (event){
    const errorMsg = validate(event.target.value, event.target.name);
    setError(this, errorMsg);
    switchAble();
});

feedbackForm.elements.description.addEventListener('blur', function (event){
    const errorMsg = validate(event.target.value, event.target.name);
    setError(this, errorMsg);
    switchAble();
});

function switchAble(){
    const btn = document.getElementById('btn');
    const values = Object.values(checkValidation);
    if (values.length === 4 && values.every(item => item)) {
        btn.disabled = false;
    }
}
/*
feedbackForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const data = new FormData();
    data.set('name', this.elements['name'].value.trim());
    data.set('phone', this.elements['phone'].value.trim());
    data.set('email', this.elements['email'].value.trim());
    data.set('adminEmail', this.elements['adminEmail'].value.trim());
    data.set('description', this.elements['description'].value.trim());
    fetch('send.php', {
        method: 'POST',
        body: data
    })});*/
    /*})

        .then(text =>{
            let answer=document.getElementById("answer");
            if (text){
                answer.innerHTML=`
                        <p>Обращение отправлено!</p>
                   `;
            }
        });
})*/