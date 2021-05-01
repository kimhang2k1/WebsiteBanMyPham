function openProfile() {
    document.getElementsByClassName('content-file')[0].style.display = 'block';
}

function openInformationCustomer() {
   document.getElementsByClassName('profile-personal-information')[0].style.display = 'block';
   document.getElementsByClassName('change-password')[0].style.display = 'none';
   document.getElementsByClassName('reset-address')[0].style.display = 'none';
   document.getElementsByClassName('bill-buy-product')[0].style.display = 'none';
}

function openFormChangePassword() {
    document.getElementsByClassName('change-password')[0].style.display = 'block';
    document.getElementsByClassName('profile-personal-information')[0].style.display = 'none';
    document.getElementsByClassName('reset-address')[0].style.display = 'none';
    document.getElementsByClassName('bill-buy-product')[0].style.display = 'none';
 }
 function openFormResetAddress() {
    document.getElementsByClassName('reset-address')[0].style.display = 'block';
    document.getElementsByClassName('profile-personal-information')[0].style.display = 'none';
    document.getElementsByClassName('change-password')[0].style.display = 'none';
    document.getElementsByClassName('bill-buy-product')[0].style.display = 'none';

 }
 function openFormAllBillProduct() {
    document.getElementsByClassName('bill-buy-product')[0].style.display = 'block';
    document.getElementsByClassName('profile-personal-information')[0].style.display = 'none';
    document.getElementsByClassName('change-password')[0].style.display = 'none';
    document.getElementsByClassName('reset-address')[0].style.display = 'none';
 
 }

 function openModalEditAddress(id) {
   document.getElementById('edit-address').style.display = 'block';
   $.ajax({
       method:"GET",
       url: "/get-information-customer",
       data : {
          id : id
       },
       success:function(response) {
            $('#edit-address').html(response);
       } 
   })

 }
 function closeModalEditAddress() {
   document.getElementById('edit-address').style.display = 'none';
   document.getElementsByClassName('print-error-msg')[0].innerText = "";
 }

 function ThanhPho(Element) {
   $.ajax({
       method: "GET",
       url : "/get-thanh-pho",
       data: {
           id : Element.value
       },
       success:function(response) {
             console.log(Element.id)
             for (let index = 0; index < document.getElementById('district-2').children.length; index++) {
                 document.getElementById('district-2').children[index].remove();
             }
             document.getElementById('district-2').innerHTML = response;
            }
   })
}

function Xa(Element) {
   $.ajax({
       method: "GET",
       url : "/get-xa",
       data: {
           id : Element.value
       },
       success:function(response) {

           console.log(Element.id)
             for (let index = 0; index < document.getElementById('district-3').children.length; index++) {
                 document.getElementById('district-3').children[index].remove();
             }
             document.getElementById('district-3').innerHTML = response;
       }
   })
}
function chinhSuaThongTin(event, id) {
   event.preventDefault();
   $.ajax({
       method : "GET",
       url: "sua-dia-chi",
       data: {
           HoTen: document.getElementsByName('HoTen')[0].value,
           phone : document.getElementsByName('phone')[0].value ,
           IDThanhPho : document.getElementById('district-1').value,
           IDQuan : document.getElementById('district-2').value,
           IDXa : document.getElementById('district-3').value,
           SoNha : document.getElementsByName('SoNha')[0].value,
           id : id

       },
       success:function(response) {
           if($.isEmptyObject(response.error)){
               document.getElementById('edit-address').style.display = 'none';
               $('#all-address').html(response.view);
               
               if( document.getElementById('edit-address').style.display == 'none') {
                   document.getElementsByName('HoTen')[0].value = "";
                   document.getElementsByName('phone')[0].value = "";
                   document.getElementById('district-1').value = "";
                   document.getElementById('district-2').value = "";
                   document.getElementById('district-3').value = "";
                   document.getElementsByName('SoNha')[0].value = "";
                   document.getElementsByClassName('print-error-msg')[0].innerText = "";
                   printErrorMsg('');
               }
           } else{
               printErrorMsg(response.error);
           }
       }
   })
}
function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
   }

function changeDefaultAddress(id) {
    $.ajax({
        method: "GET", 
        url: "/thay-doi-dia-chi",
        data: {
           id : id
        },
        success:function(response) {
            $('#all-address').html(response);
        }
    })
}


