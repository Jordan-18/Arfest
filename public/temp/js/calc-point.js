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

// 
function insertrow()
{
    var table = document.getElementById("mytable");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '';
    cell2.innerHTML = '';
    cell3.innerHTML = '';
    cell4.innerHTML = '<a href="" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Set Point</a>';
    cell5.innerHTML = '<a href="" class="btn btn-danger">Delete</a>';
}