//function for displaying values
function dis(val) {
    var countpoint = document.getElementById('count-point');
    document.getElementById("display").value += val
    let x = document.getElementById("display").value
    countpoint.innerHTML = x.split('+').length
    let y = eval(x)
    document.getElementById("result").value = y
}
//function for clearing the display
function clr() {
    document.getElementById("display").value = ""
    document.getElementById("result").value = ""
    document.getElementById('count-point').innerHTML = 0
}

// auto insert +
$('.button').click(function () {
    setTimeout(function () {
        document.getElementById("display").value += "+"
    }, 100);
});

function setpoint(val) {
    var result = document.getElementById('result').value
    var counting = document.getElementById('display').value
    var counting = counting.split("+");
    document.getElementById('rambahan' + val).innerHTML = result
    document.getElementById('input' + val).innerHTML = counting
    setTimeout(() => {
        $('#close-point-modal').trigger('click');
        document.getElementById("display").value = ""
        document.getElementById("result").value = ""
        document.getElementById('count-point').innerHTML = 0
    }, 500);
}

function countpoint() {
    var tds = document.getElementById('countit').getElementsByTagName('td');
    var sum = 0;
    for (var i = 0; i < tds.length; i++) {
        if (tds[i].className == 'rambahancount') {
            sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
        }
        document.getElementById('total').innerHTML = sum
        document.getElementById('form-total').value = sum
    }
}
