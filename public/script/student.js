const checkinbt = document.querySelector('.check-in-js');
const checkoutbt = document.querySelector('.check-out-js');
const modalIn = document.querySelector('.modal-in-js');
const modalOut = document.querySelector('.modal-out-js');
const cform = document.querySelector('.cform-js');
const closeIn = document.querySelector('.close-in-js');
const closeOut = document.querySelector('.close-out-js');

checkinbt.addEventListener('click',function(){
    modalIn.classList.add('open');
});
closeIn.addEventListener('click', function(){
    modalIn.classList.remove('open');
});
modalIn.addEventListener('click', function(event){
    event.stopPropagation();
});

checkoutbt.addEventListener('click',function(){
    modalOut.classList.add('open');
});
closeOut.addEventListener('click', function(){
    modalOut.classList.remove('open');
});
modalOut.addEventListener('click', function(event){
    event.stopPropagation();
});

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


