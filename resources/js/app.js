$printButtonElem = document.querySelector('.js-print-button');

$printButtonElem.addEventListener('click', () => {
    $contentBox = document.querySelector('.js-content-box');
    $contentBox.classList.remove('col-md-9');
    window.print();
});