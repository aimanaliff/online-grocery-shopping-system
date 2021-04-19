var removeButton = document.querySelectorAll("#removeItemInCart");
var itemLine = document.querySelectorAll("#itemHr");

for (let index = 0; index < removeButton.length; index++) {
    var button = removeButton[index];
    button.addEventListener("click", function(event){
        var buttonClicked = event.target;
        buttonClicked.parentElement.parentElement.remove();
    });

}

// for (let index = 0; index < itemLine.length; index++) {
//     console.log(itemLine[index]);
//     // var itemHR = itemLine[index];

    
// }