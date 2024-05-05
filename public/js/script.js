function alterText(){
  const form = document.querySelector('.form');

  function alterHtml(event){
    const btn = document.querySelector('.btn');
    btn.innerHTML = "Enviando...";
  }

  form.addEventListener("submit", alterHtml)
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