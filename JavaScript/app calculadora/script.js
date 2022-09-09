function calcular(tipo , valor){
    if(tipo === 'acao'){
        if (valor === 'c')
        {
            document.getElementById('resultado').value = null  
        }
        if (valor === '+' || valor === '-' || valor === '/' || valor === '*' || valor === '.')
        {
            document.getElementById('resultado').value += valor
        }
        if(valor === '='){
            var result = eval(document.getElementById('resultado').value)
            document.getElementById('resultado').value = result
        }
    }
    else if(tipo === 'valor'){
        document.getElementById('resultado').value += valor
    }
    else{

    }
}