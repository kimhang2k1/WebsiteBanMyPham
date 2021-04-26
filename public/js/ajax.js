function sortby(id) {
    $.ajax({
         method: "GET",
         url: '/sanphamsapxep',
         data: {
            LoaiSapXep : document.getElementById('sort').value,
            id : id
         },
         success: function(response) {
         var allProduct = document.getElementsByClassName('all-product')[0];
         allProduct.innerHTML = response;
         }
    });
}

function getRadioChecked() {
    var parent = document.getElementsByClassName('content-brand')[0].childNodes;
    for (let index = 0; index < parent.length; index++) {
        if (index % 2 != 0) {
            if (parent[index].childNodes[0].checked) {
                return parent[index].childNodes[0];
            }
        }
    }
}

function brand(id) {
    
    $.ajax({
        method:"GET",
        url: 'sanphamtheothuonghieu',
        data: {
            id : getRadioChecked().value
        },
      
            success: function(response) {
                var allProduct = document.getElementsByClassName('all-product')[0];
                allProduct.innerHTML = response;
            }
    });
}

function addCart(IDSanPham) {
   
    $.ajax({
        method: "GET",
        url : "/them-vao-gio-hang",
        data : {
            IDSanPham : IDSanPham,
            SoLuong: document.getElementById('amount').value,
            IDMau: document.getElementById('idColor').value
        },
        success : function(response) {
            $('#myCart').prepend(response.view);
            $('#numcart').html(response.num); 
        }
    })
}

function loadDeliveryAddress() {
            var delivery = document.getElementsByClassName('row-address-customer')[0];
            delivery.style.display = 'block';
            document.getElementsByClassName('address')[0].style.display = 'none'

    
}

function deleteCart(IDSanPham, IDMau, STT) {

    $.ajax({
       method: "GET",
       url: "/xoa-gio-hang",
       data : {
           IDSanPham: IDSanPham,
           IDMau :IDMau,
           STT: STT
        
       },
       success:function(response) {
           if (response == '') 
            document.getElementById(STT + 'delete').remove();
           else 
           document.getElementById('container').innerHTML = response
          
       }
    })
}

function loadThanhPho(Element) {
        $.ajax({
            method: "GET",
            url : "/load-thanh-pho",
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
function loadXa(Element) {
    $.ajax({
        method: "GET",
        url : "/load-xa",
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

function order() {
    $.ajax({
        method : "GET", 
        url : "dat-hang",
        data : {
            
        }
    })
}