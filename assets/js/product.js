/////////////////////////////deete single Order //////////////////////
let delete_btns = document.querySelectorAll("#delete-product");
delete_btns.forEach((btn)=>btn.addEventListener("click",deleteorder));
function deleteorder(){
  const id = this.dataset.productId;
 fetch(`http://localhost/delete.php?product_id=${id}`)
  .then((res) => res.json()) 
  .then((data)=> {
   if(data){
    let btn = document.querySelector(`button[data-product-id='${id}']`);

    btn.parentElement. parentElement.remove();
   }
 
  });
} 

//////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////
var value;
var increment = document.querySelectorAll('.qtyplus');
var decrement = document.querySelectorAll('.qtyminus');
increment.forEach((btn)=>btn.addEventListener('click', incrementValue));
decrement.forEach((btn)=>btn.addEventListener('click', decrementValue));

function incrementValue(event) {
  
  var value = event.target.parentElement.previousElementSibling.children[0].value;
  if (isNaN(value) || value < 1) {
    value = 1;
  }
  
  value++;
  event.target.parentElement.previousElementSibling.children[0].value = value;
  productpagetotal();
  //productpagemaxtotal();
  
} 


function decrementValue(event) {
  
  var value = event.target.parentElement.nextElementSibling.children[0].value;
  if (isNaN(value) || value < 1) {
    value = 1;
  }
  
  value--;
  event.target.parentElement.nextElementSibling.children[0].value = value;
  productpagetotal();
  //productpagemaxtotal();
}

function productpagetotal() {
var totalPrice = parseInt(document.querySelector('#product-total-price').dataset.price); 
  var quantity = document.querySelectorAll('.input-number');
 var sum = totalPrice * quantity;
sum = Math.round(sum * 100) / 100;
totalPrice.innerHTML = '$'+ sum;
}

function productpagemaxtotal() {
var totalPrice = document.querySelector('.product-maxtotal-price');
var price = totalPrice.dataset.price;
var quantity = document.getElementById('input-number').value;
var sum = price * quantity;
sum = Math.round(sum * 100) / 100;
totalPrice.innerHTML = '$'+ sum;
}

///////////////////////////////////////////////////////////////////////////////////////////////
















