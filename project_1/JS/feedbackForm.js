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
});

feedbackForm.elements.phone.addEventListener('blur', function (event){
    const errorMsg = validate(event.target.value, event.target.name);
    setError(this, errorMsg);
});

feedbackForm.elements.email.addEventListener('blur', function (event){
    const errorMsg = validate(event.target.value, event.target.name);
    setError(this, errorMsg);
});

feedbackForm.elements.description.addEventListener('input', function (event){
    const errorMsg = validate(event.target.value, event.target.name);
    setError(this, errorMsg);
});

function switchAble(){
    const values = Object.values(checkValidation);
    if (values.length == 4 && values.some(item => item)){
        this.disabled = false;
        document.getElementById('btn').className='on'
    } else{
        this.disabled = true;
        document.getElementById('btn').className='notOn';
    }
}
document.getElementById('btn').addEventListener('mouseover', function(event){
    switchAble();
})