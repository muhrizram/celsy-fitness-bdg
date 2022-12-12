const labelSasarTurun = document.getElementById('labelSasarTurun');
const labelSasarNaik = document.getElementById('labelSasarNaik');

if (document.querySelector('input[name="target"]')) {
    document.querySelectorAll('input[name="target"]').forEach((elem) => {
      elem.addEventListener("change", function(event) {
        var item = event.target.value;
        if(item == "turun"){
          labelSasarTurun.classList.remove('hidden');
          labelSasarNaik.classList.add('hidden');
        }else if(item == "naik"){
          labelSasarNaik.classList.remove('hidden');
          labelSasarTurun.classList.add('hidden');
        }else{
          labelSasarTurun.classList.add('hidden');
          labelSasarNaik.classList.add('hidden');
        }
      });
    });
  }