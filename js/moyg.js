for(let i of document.querySelectorAll('.field-group')){
    const input = i.querySelector('input'); 
	const label = i.querySelector('label');
    const input_class = input.classList;
    const label_class = label.classList;
    input.onfocus = () => {
        label_class.add('label-focused');
    };
    input.onchange = input.onblur = () => {
		input.removeAttribute('class');
        if(!input.value) label.removeAttribute('class');
        else
            if(input.validity.valid) input_class.add('valid');
            else input_class.add('invalid');
	};
	if(input.value){
		if(input.validity.valid) input_class.add('valid');
        else input_class.add('invalid');
	}
}
const confirm = document.querySelector('input[id=confirm]');
const password = document.querySelector('input[id=password]');
const form = document.querySelector('form');
if(confirm && password){
	const confirm_func = () => {
		confirm.removeAttribute('class');
		if(confirm.value){
			if(password.value && password.value != confirm.value){
				confirm.classList.add('invalid');
				confirm.setCustomValidity('Does not match password field.')
			}
			else{
				confirm.classList.add('valid');
				confirm.setCustomValidity('');
			}
		}
	}
	form.onchange = confirm_func ;
}