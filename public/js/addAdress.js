function add(event, IDDiaChi) {
        event.preventDefault();
        $.ajax({
            method : "GET",
            url: "them-dia-chi-giao-hang",
            data: {
                HoTen: document.getElementsByName('HoTen')[0].value,
                phone : document.getElementsByName('phone')[0].value ,
                IDThanhPho : document.getElementById('district-1').value,
                IDQuan : document.getElementById('district-2').value,
                IDXa : document.getElementById('district-3').value,
                SoNha : document.getElementsByName('SoNha')[0].value,
    
            },
            success:function(response) {
                if($.isEmptyObject(response.error)){
                    document.getElementById('myModal').style.display = 'none'
                    $('#myAddress').html(response.view);
                    
                    if( document.getElementById('myModal').style.display == 'none') {
                        document.getElementsByName('HoTen')[0].value = "";
                        document.getElementsByName('phone')[0].value = "";
                        document.getElementById('district-1').value = "";
                        document.getElementById('district-2').value = "";
                        document.getElementById('district-3').value = "";
                        document.getElementsByName('SoNha')[0].value = "";
                        document.getElementsByClassName('print-error-msg')[0].innerText = "";
                        printErrorMsg('');
                    }
                }else{
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

// function radioCheck() {
//     var parent = document.getElementsByClassName('input-radio')[0].childNodes;
//     for (let index = 0; index < parent.length; index++) {
//         if (index % 2 != 0) {
//             if (parent[index].childNodes[0].checked) {
//                 return parent[index].childNodes[0];
//             }
//         }
//     }
// }

function loadDiaChiAfterAdd() {

    var address = document.getElementsByName('diachi');
    for (var i = 0; i < address.length; i++) {
        if (address[i].checked) {
            var id = address[i].value;
        }
    }
        $.ajax({
            method:"GET",
            url: "get-address",
            data: {
                ID : id
    
            },
            success:function(response) {
                $('#default-address').html(response);
                document.getElementById('default-address').style.display = 'block'
                document.getElementById('myAddress').style.display = 'none'
               

                
    
            }
            
        })
    

}
// function loadDiaChiAfterAdd(IDDonHang) {
//     $.ajax({
//         method:"GET",
//         url: "get-address",
//         data: {
//             IDDiaChi : radioCheck().value

//         },
//         success:function(response) {
//             // $('#default-address').html(response);
//             document.getElementById('default-address').style.display = 'block'
//             document.getElementById('myAddress').style.display = 'none'
            

//         }
        
//     })
// }