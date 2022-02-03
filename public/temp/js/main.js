function getjarak(val) {
    document.getElementById('jarak-tembak').innerHTML = val
    document.getElementById('form-jarak').value = val
    setTimeout(() => {
        $('#close-jarak').trigger('click');
    }, 500);
}

function getjenis(val) {
    document.getElementById('jenis-busur').innerHTML = val
    document.getElementById('form-jenis').value = val
    setTimeout(() => {
        $('#close-modal-busur').trigger('click');
    }, 500);
}
