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