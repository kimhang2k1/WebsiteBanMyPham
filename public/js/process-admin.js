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

function editProduct() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let formData = new FormData($('#myForm')[0]);
    formData.append('IDSP',$('#IDSP').val())
    $.ajax({
        method: "POST",
        url : 'sua-san-pham',
        data : formData,
        contentType: false,
        processData: false,
        success:function(response) {
           $('#product').html(response);
           document.getElementsByClassName('form-edit-product')[0].style.display = "none";
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
function deleteProduct1(IDSPCT) {
    $.ajax({
        method : "GET",
        url : "xoa-san-pham",
        data : {
            IDSPCT : IDSPCT
        },
        success:function(response) {
            $('#product').html(response);
        }
        
    })
}
function deleteProduct2(IDSP) {
    $.ajax({
        method : "GET",
        url : "delete-product",
        data : {
            IDSP : IDSP
        },
        success:function(response) {
            $('#product').html(response);
        }
        
    })
}

function SearchProduct(event) {
    $.ajax({
        method : "GET", 
        url : "search-product",
        data: {
            ID : document.getElementsByName('search')[0].value
        },
        success:function(response) {
            $('#product').html(response);
        }
    })
}
function getSearchCategoryProduct() {
    $.ajax({
        method : "GET", 
        url : "search-category-product",
        data: {
            ID : document.getElementsByName('search')[0].value,
            IDNSP : document.getElementsByName('category')[0].value
        },
        success:function(response) {
            $('#product').html(response);
        }
    })
}