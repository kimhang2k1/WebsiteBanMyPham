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

 function openFormEditProduct(id) {
    document.getElementsByClassName('form-edit-product')[0].style.display = "block";
     $.ajax({
         method: "GET",
         url : 'edit-product',
         data : {
             IDSanPham : id
         },
         success:function(response) {
            $('.form-edit-product').html(response);
         }
     })
 }

function closeFormEditProduct() {
    document.getElementsByClassName('form-edit-product')[0].style.display = "none";
}

function editProduct(id) {
    $.ajax({
        method: "GET",
        url : 'sua-san-pham',
        data : {
            IDSanPham : id,

        },
        success:function(response) {
           $('#product').html(response);

        }
    })
}
function ImagesFileAsURL() {
    // document.getElementById('hinhanh').style.display = "none";
    var fileSelected = document.getElementById('fileImage').files;
    if (fileSelected.length > 0) {
        var fileToLoad = fileSelected[0];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoaderEvent) {
            var srcData = fileLoaderEvent.target.result;
            var newImage = document.createElement('img');
            newImage.src = srcData;
            document.getElementById('displayImg').innerHTML = newImage.outerHTML;
        }
        fileReader.readAsDataURL(fileToLoad);
    }
}
function ImagesFile() {
    document.getElementById('hinhanh').style.display = "none";
    var fileSelected = document.getElementById('fileImageclone').files;
    if (fileSelected.length > 0) {
        var fileToLoad = fileSelected[0];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoaderEvent) {
            var srcData = fileLoaderEvent.target.result;
            var newImage = document.createElement('img');
            newImage.src = srcData;
            document.getElementById('displayImage').innerHTML = newImage.outerHTML;
        }
        fileReader.readAsDataURL(fileToLoad);
    }
}
 