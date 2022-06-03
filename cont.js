var counterVal = 0;

function incrementClick() {
    updateDisplay(++counterVal);
    if (counterVal >= 3) {
        swal({
            text: "Deseja Realizar um Cadastro?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((cadastrar) => {
            if (cadastrar) {
                window.open("http://localhost/FATEC/BLOG/cadastro")
            }
        })
        counterVal = 0;            
    }
}

function updateDisplay(val) {
    document.getElementById("counter-label").innerHTML = val;
}