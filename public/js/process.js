
function previousImage() {
    document.getElementById('image-decription-productss').scrollLeft -= 86;
}
function nextImage() {
    document.getElementById('image-decription-productss').scrollLeft += 86;
}
function onHover(a) {
    var anh = a.src;
    document.getElementById('images').src = anh;
}
function changeColor(IDMau) {
    document.getElementById('images').src = document.getElementById(IDMau).src;
    document.getElementById('idColor').value = IDMau;
}
var i = 1;
function increase() {
    i++;
    document.getElementById('amount').value = i;
}
function decrease() {
    if(i <= 1) {
        document.getElementById('amount').value = 1;
    }
    else {
        i--;
        document.getElementById('amount').value = i;
    }
}
function increaseNumber(STT) {
    var sum = new Number(document.getElementById('mainPrice').innerHTML.replaceAll(',',''));
    var num = new Number(document.getElementById(STT +'amount').value)
    num++;
    document.getElementById(STT+'amount').value = num;
    var price = new Number(document.getElementById(STT +'money').innerText.replace(',',''))
    var bill = num * price;
    sum+= price;
    document.getElementById(STT +'total-money').innerHTML = bill.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    if (document.getElementById(STT + 'Checkbox').checked) {
      document.getElementById('mainPrice').innerHTML = sum.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
    $.ajax({
        method  : "GET",
        url : "/sua-so-luong-san-pham",
        data : {
            num : num,
            STT : STT
        },
        success:function(response) {

        }
})
   
}
function decreaseNumber(STT) {
    var sum = new Number(document.getElementById('mainPrice').innerHTML.replaceAll(',',''));
    var num = new Number(document.getElementById(STT +'amount').value)
    num--;
    if(num < 1) 
        num = 1;
    document.getElementById(STT+'amount').value = num;
    var price = new Number(document.getElementById(STT +'money').innerText.replace(',',''))
    var bill = num * price;
    sum-= price;
    document.getElementById(STT +'total-money').innerHTML = bill.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    if (document.getElementById(STT + 'Checkbox').checked) {
            document.getElementById('mainPrice').innerHTML = sum.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
    $.ajax({
        method  : "GET",
        url : "/sua-so-luong-san-pham",
        data : {
            num : num,
            STT: STT
        },
        success:function(response) {
           
        }
    })
}
function toggle(source) {
    var sum = new Number(document.getElementById('mainPrice').innerHTML.replaceAll(',',''));
    checkboxes = document.getElementsByName('item');
    if (source.checked) {
        for(var i = 0; i < checkboxes.length ;i++) {
            checkboxes[i].checked = true;
            var id = checkboxes[i].parentElement.parentElement.id;
            var price = new Number(document.getElementById(id +'total-money').innerHTML.replaceAll(',',''));
            sum += price;
          } 
          checkboxes[checkboxes.length - 1].checked = true;      
               document.getElementById('mainPrice').innerHTML = sum.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
    else {
        for(var i = 0; i < checkboxes.length ;i++) {
            checkboxes[i].checked = false;
          }
        document.getElementById('mainPrice').innerHTML = 0;
    }
    
    numberSelected.innerHTML = source.checked ? checkboxes.length : 0;
    totalProduct.innerHTML = source.checked ? checkboxes.length : 0;
}
function onchangetoggle(element) {
var sum = new Number(document.getElementById('mainPrice').innerHTML.replaceAll(',',''));
var num = new Number(document.getElementById('numberSelected').innerHTML);
element.data = true;
if (element.checked && element.data === true)
{  
    element.unchecked
    num++;
    var id = element.parentElement.parentElement.id;
    var price = new Number(document.getElementById(id +'total-money').innerHTML.replaceAll(',',''));
    sum += price;
    document.getElementById('numberSelected').innerHTML = num;
    document.getElementById('totalProduct').innerHTML = num;
    document.getElementById('mainPrice').innerHTML = sum.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    $.ajax({
        method: "GET",
        url : "them-san-pham-thanh-toan",
        data : {
            id : id
        },
        success : function(response) {
            
        }
    })
}
else {
    element.checked 
    if(num <= 0) {
        document.getElementById('numberSelected').innerHTML = 0;
        document.getElementById('mainPrice').innerHTML = 0;
    }
    else {
        num--;
        var id = element.parentElement.parentElement.id;
        var price = new Number(document.getElementById(id +'total-money').innerHTML.replaceAll(',',''));
        sum -= price;
        document.getElementById('numberSelected').innerHTML = num;
        document.getElementById('totalProduct').innerHTML = num;
        document.getElementById('mainPrice').innerHTML = sum.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        $.ajax({
            method: "GET",
            url : "xoa-san-pham-thanh-toan",
            data : {
                id : id,
            },
            success : function() {
                
            }
        })
    }
    
}
}
 
