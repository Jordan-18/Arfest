//function for displaying values
function dis(val)
{
    document.getElementById("display").value+=val
    let x = document.getElementById("display").value
    let y = eval(x)
    document.getElementById("result").value = y
}
//function for clearing the display
function clr()
{
    document.getElementById("display").value = ""
    document.getElementById("result").value = ""
}
// auto insert +
$('.button').click(function(){
    setTimeout(function(){
        document.getElementById("display").value+="+"
    },100);
});

function setpoint(val)
{
    console.log(val)
    var result = document.getElementById('result').value
    document.getElementById('rambahan'+val).innerHTML = result
    setTimeout(() => {
        $('#close-point-modal').trigger('click');
        document.getElementById("display").value = ""
        document.getElementById("result").value = ""
    }, 500);
}