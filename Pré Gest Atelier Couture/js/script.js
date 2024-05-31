let open = document.querySelector('#open');
let close = document.querySelector('#close');
let sectionLeft = document.querySelector('.section-left');
let sectionRight = document.querySelector('.section-right');
let archive = document.querySelector('#archive');
let unarchive = document.querySelector('#unarchive');

close.addEventListener('click', () => {
    sectionLeft.classList.add('hidden');
    sectionRight.classList.add('full-width');
    close.classList.add('hidden');
    open.classList.remove('hidden');
});

open.addEventListener('click', () => {
    sectionLeft.classList.remove('hidden');
    sectionRight.classList.remove('full-width');
    open.classList.add('hidden');
    close.classList.remove('hidden');
});

archive.addEventListener('click', () => {
    unarchive.classList.remove('hidden');
    archive.classList.add('hidden');
});

unarchive.addEventListener('click', () => {
    archive.classList.remove('hidden');
    unarchive.classList.add('hidden');
});
