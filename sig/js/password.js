/*login*/
const pass = document.getElementById('password');
const ver = document.getElementById('ver');
const noVer = document.getElementById('noVer');

ver.style.display = 'block';
noVer.style.display = 'none';

ver.addEventListener('click', () => {
    pass.type = 'text';
    noVer.style.display = 'block';
    ver.style.display = 'none';
});

noVer.addEventListener('click', () => {
    pass.type = 'password';
    ver.style.display = 'block';
    noVer.style.display = 'none';
});