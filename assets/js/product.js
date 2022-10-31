/////////////////////////////delete single Order //////////////////////
/*delete_btns = document.querySelectorAll("#delete-product");
delete_btns.forEach((btn) => btn.addEventListener("click", deleteorder));
function deleteorder() {
  const id = this.dataset.productId;
  fetch(`http://localhost/delete.php?product_id=${id}`)
    .then((res) => res.json())
    .then((data) => {
      if (data) {
        let btn = document.querySelector(`button[data-product-id='${id}']`);

        btn.parentElement.parentElement.remove();
      }

    });
}*/

//////////////////////////////////////////////////////////////////////////////


function handleXMLOrder(str, selector, query) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(query);
      if (selector.length == 0) { }
      else if (query.includes("removeFromCart"))
        document.querySelector('div[p-id="' + str + '"]').remove();
      else {
        console.log(this.responseText.value);
        if ((this.responseText).includes("here"))
          document.querySelector('div[p-id="' + str + '"] p.quantity').innerHTML = (this.responseText)

        else
          document.querySelector(selector).innerHTML += (this.responseText);
      }
    }


  }

  xmlhttp.open("GET", "requests.php?" + query, true);
  xmlhttp.send();
}

//////////////////////////////////////////////////////////

function incrementValue() {

  var value = event.target.parentElement.previousElementSibling.children[0].value;
  if (isNaN(value) || value < 1) {
    value = 1;
  }

  value++;
  event.target.parentElement.previousElementSibling.children[0].value = value;
  product_id = event.target.getAttribute("data-product-id");
  //productpagetotal();
  productpagemaxtotal();
  handleXMLOrder(value, '', 'increasQuantity=' + value + '&p_id=' + product_id);
}


function decrementValue() {

  var value = event.target.parentElement.nextElementSibling.children[0].value;
  if (isNaN(value) || value < 1) {
    value = 1;
  }

  value--;
  event.target.parentElement.nextElementSibling.children[0].value = value;
  product_id = event.target.getAttribute("data-product-id");
  handleXMLOrder(value, '', 'increasQuantity=' + value + '&p_id=' + product_id);

  //productpagetotal();
  productpagemaxtotal();
}

function productpagetotal() {
  var totalPrice = parseInt(document.querySelector('#product-total-price').dataset.price);
  var quantity = document.querySelectorAll('.input-number');
  var sum = totalPrice * quantity;
  sum = Math.round(sum * 100) / 100;
  totalPrice.innerHTML = '$' + sum;
}

function productpagemaxtotal() {
  var totalPrice = document.querySelector('.product-maxtotal-price');

  let quantity = document.querySelectorAll('input[name="quantity"]');
  let price = document.querySelectorAll('#product-total-price');
  let sum = 0;
  for (let i = 0; i < price.length; i++) {
    sum += parseInt(price[i].innerText) * parseInt(quantity[i].value);
  }
  console.log("f");
  totalPrice.innerHTML = '$' + sum;
}

///////////////////////////////////////////////////////////////////////////////////////////////


function deleteItem(id) {

  handleXMLOrder(id, '', 'removeFromCart=' + id);
  event.target.parentElement.parentElement.remove()
  productpagemaxtotal();

  
}


/*delete_btns = document.querySelectorAll("#delete-product");
delete_btns.forEach((btn) => btn.addEventListener("click", deleteorder));
function deleteorder() {
  const id = this.dataset.productId;
  fetch(`http://localhost/delete.php?product_id=${id}`)
    .then((res) => res.json())
    .then((data) => {
      if (data) {
        let btn = document.querySelector(`button[data-product-id='${id}']`);

        btn.parentElement.parentElement.remove();
      }

    });
}*/













