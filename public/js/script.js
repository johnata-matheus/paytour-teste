function alterText(){
  const btn = document.querySelector('.btn');

  function alterHtml(event){
    btn.innerHTML = "Enviando...";
  }

  btn.addEventListener("click", alterHtml)
}

function formatTell(){
  document.getElementById('telefone').addEventListener('input', function(event) {
    var telefone = event.target.value.replace(/\D/g, ''); 
    var telefoneFormatado = telefone.replace(/^(\d{2})(\d)/, "($1) $2");
  
    event.target.value = telefoneFormatado;
  });
}

alterText();
formatTell();