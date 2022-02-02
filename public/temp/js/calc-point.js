//function for displaying values
function dis(val) {
    document.getElementById("display").value += val
    let x = document.getElementById("display").value
    let y = eval(x)
    document.getElementById("result").value = y
}
//function for clearing the display
function clr() {
    document.getElementById("display").value = ""
    document.getElementById("result").value = ""
}
// auto insert +
$('.button').click(function () {
    setTimeout(function () {
        document.getElementById("display").value += "+"
    }, 100);
});
