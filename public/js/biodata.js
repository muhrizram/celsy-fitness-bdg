const labelSasar = document.getElementById('labelSasar');

if (document.querySelector('input[name="sasaran"]')) {
    document.querySelectorAll('input[name="sasaran"]').forEach((elem) => {
      elem.addEventListener("change", function(event) {
        var item = event.target.value;
        if(item == "turun" || item == "tambah"){
            labelSasar.classList.remove('hidden');
        }else{
            labelSasar.classList.add('hidden');
        }
      });
    });
  }