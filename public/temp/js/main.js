function getjarak(val)
{
    document.getElementById('jarak-tembak').innerHTML = val 
    setTimeout(() => {
        $('#close-jarak').trigger('click');
    }, 500);
}
function getjenis(val)
{
    document.getElementById('jenis-busur').innerHTML = val 
    setTimeout(() => {
        $('#close-modal-busur').trigger('click');
    }, 500);
}