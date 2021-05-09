function openManagement(index) {
    var management = document.getElementsByClassName('managements');
    for (let i= 0; i < management.length; i++) {
       const element = management[i];
       if (index === i) {
           element.classList.remove('hidden');
       }
       else {
           element.classList.add('hidden');
       }
    }
}

function openModalAddProduct() {
    document.getElementsByClassName('form-add-product')[0].style.display = "block";
}
 function closeModalAddProduct() {
    document.getElementsByClassName('form-add-product')[0].style.display = "none";
 }