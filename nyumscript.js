// main script start

let scrollUpBtn = document.getElementById('scrollUp')

window.onscroll = function() { revealButton() };

function revealButton() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollUpBtn.style.opacity = "0.85";
        scrollUpBtn.style.transition = "opacity 0.2s";
    } else {
        scrollUpBtn.style.opacity = "0";
    }
}

function goUp() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function burgerAnimate() {
    let burger = document.querySelector('.hamburger');
    burger.classList.toggle('is-active')
}

//Shocking Sale Countdown

function handleTickInit(tick) {

    //var nextYear = (new Date()).getFullYear() + 1;

    Tick.count.down('2021-06-20').onupdate = function(value) {
        tick.value = value;
    };

}

// main script end