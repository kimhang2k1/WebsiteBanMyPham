function add() {
    if(document.getElementById('myModal').style.display == 'none'){

    }
      
    else {
        $.ajax({
            method : "GET",
            url: "them-dia-chi-giao-hang",
            data: {
                HoTen: document.getElementsByName('HoTen')[0].value,
                SDT : document.getElementsByName('phone')[0].value ,
                IDThanhPho : document.getElementById('district-1').value,
                IDQuan : document.getElementById('district-2').value,
                IDXa : document.getElementById('district-3').value,
                SoNha : document.getElementsByName('SoNha')[0].value,
                
    
    
            },
            success:function(response) {
             $('#myAddress').html(response);
             document.getElementById('myModal').style.display = 'none'
        }
        })
    }
}