const visible = document.querySelector('#visible');
const invisible = document.querySelector('#invisible');
const passwordInput = document.querySelector('[name=password]');

visible.addEventListener('click', () => {
    visible.classList.remove('active');
    invisible.classList.add('active');

    passwordInput.type = "password";
})

invisible.addEventListener('click', () => {
    invisible.classList.remove('active');
    visible.classList.add('active')

    passwordInput.type = "text";
})