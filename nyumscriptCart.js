var removeButton = document.querySelectorAll("#removeItemInCart");
var itemLine = document.querySelectorAll("#itemHr");
cartTotalCal();

function cartTotalCal() {
    var quantity = document.querySelectorAll("#inputQuantity");
    var price = document.querySelectorAll("#singlePrice");
    for (let index = 0; index < quantity.length; index++) {
        console.log(quantity[index].value);
    }
    for (let index = 0; index < price.length; index++) {
        console.log(price[index].innerText);
    }
    var total = 0.0;
    for (let index = 0; index < quantity.length; index++) {
        total += quantity[index].value*parseFloat(price[index].innerText.replace("RM ",""));
        console.log(total)
    }
    document.getElementById("cartTotal").innerHTML = "RM "+total;

}

for (let index = 0; index < removeButton.length; index++) {
    var button = removeButton[index];
    button.addEventListener("click", function(event){
        var buttonClicked = event.target;
        buttonClicked.parentElement.parentElement.remove();
        updateCartTotal();
    });

}

function updateCartTotal() {
    var row = document.getElementsByClassName("row py-xxl-3 py-sm-4 align-items-center");
    // var priceCol = row.getElementsByClassName("col align-self-center");
    // var price = priceCol.getElementsByClassName("text-success fw-bold");
    console.log(row);
}
