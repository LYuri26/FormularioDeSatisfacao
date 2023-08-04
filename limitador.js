// limitar_palavras.js

function limitarPalavras(textarea, maxPalavras, maxCaracteres) {
    const texto = textarea.value.trim();
    const palavras = texto.split(/\s+/);
    const numCaracteres = texto.length;
  
    if (palavras.length > maxPalavras || numCaracteres > maxCaracteres) {
      textarea.value = palavras.slice(0, maxPalavras).join(" ");
      alert("O comentário não pode exceder o limite de " + maxPalavras + " palavras e " + maxCaracteres + " caracteres.");
    }
  }
  