var removeButton = document.querySelectorAll("#removeItemInCart");
cartTotalCal();

function cartTotalCal() {
    var price = document.querySelectorAll("#singlePrice");
    var itemBox = document.querySelectorAll("#checkItem");
    var quantity = document.querySelectorAll("#inputQuantity");
    for (let index = 0; index < quantity.length; index++) {
        console.log(quantity[index].value);
    }
    for (let index = 0; index < price.length; index++) {
        console.log(price[index].innerText);
    }
    for (let index = 0; index < itemBox.length; index++) {
        if (itemBox[index].checked == false) {
            console.log(itemBox[index].checked);
        };
    }
    var total = 0.0;
    for (let index = 0; index < itemBox.length; index++) {
        if (itemBox[index].checked == true) {
            total += quantity[index].value * parseFloat(price[index].innerText.replace("RM ", ""));
            console.log(total)
        };
    }
    document.getElementById("cartTotal").innerHTML = "RM " + total.toFixed(2);

}

for (let index = 0; index < removeButton.length; index++) {
    var button = removeButton[index];
    button.addEventListener("click", function(event) {
        var buttonClicked = event.target;
        buttonClicked.parentElement.parentElement.remove();
        cartTotalCal();
    });
}