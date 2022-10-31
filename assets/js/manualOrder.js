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

function addToCartAdmin(id) {
    let val = document.querySelector('#users').value;
    handleXMLOrder(id, '.row .products-cart', 'addToCartPId=' + id + '&user_idx=' + val);
}
/*

function increase() {
    let quantity = event.target.previousElementSibling.innerText;
    quantity++;
    let user = document.querySelector('#users').value;
    let product_id = event.target.parentElement.getAttribute("p-id")
    event.target.previousElementSibling.innerText = quantity;
    handleXMLOrder(quantity, '', 'increasQuantity=' + quantity + '&user_idx=' + user + '&p_id=' + product_id);
}

function decrease() {
    if (event.target.nextElementSibling.innerText > 1)
        event.target.nextElementSibling.innerText--;

    let quantity = event.target.nextElementSibling.innerText;
    let user = document.querySelector('#users').value;
    let product_id = event.target.parentElement.getAttribute("p-id")
    handleXMLOrder(quantity, '', 'increasQuantity=' + quantity + '&user_idx=' + user + '&p_id=' + product_id);
}
*/
function removeFromCart(id) {
    let val = document.querySelector('#users').value;
    handleXMLOrder(id, '', 'removeFromCart=' + id + '&user_idx=' + val);
}