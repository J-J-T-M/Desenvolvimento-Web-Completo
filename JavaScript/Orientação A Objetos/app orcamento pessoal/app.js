class Expense{
    constructor(year, month, day, type, description, expenseValue){
        this.year = year;
        this.month = month;
        this.day = day;
        this.type = type;
        this.description = description;
        this.expenseValue   = expenseValue;
    }
    validateData (){
        // precorrer todos os elementos do metodo registerExpense
        // this[i] recupera o value dos atribudos 
        for( let i in this){
           if(this[i] == undefined || this[i] == null || this[i] == '')  {return false} 
        }
        return true
    }
}
class Bd{

    constructor(){
        let id = localStorage.getItem('id')

        id === null ? localStorage.setItem('id', 0) : id = id

    }

    getNextId(){
        let nextId = localStorage.getItem('id')

        return parseInt(nextId) + 1
    }
    toRecord(expense){
        // gravando no localStorage
        let id = this.getNextId()
        
        localStorage.setItem(id, JSON.stringify(expense))
        
        localStorage.setItem('id', id) 
    }
    retrieveRecord(){
        // array de despesas
        let expenses = Array()

        // recuperar todas as depesas
       let id = localStorage.getItem('id')
       for(let i = 1 ; i <= id ; i++){

        // recuperar a despesa
        let expense = JSON.parse(localStorage.getItem(i))

        // verificar que o indice foi removido
        if(expense === null){
            continue
        }

        expense.id = i
        expenses.push(expense)
       }
       return expenses
    }
    search(expensefilter){
        let filteredExpenses = Array()

        filteredExpenses = this.retrieveRecord()

        // ano
        expensefilter.year !='' ? filteredExpenses = filteredExpenses.filter(d => d.year == expensefilter.year) : null

        // mes
        expensefilter.month !='' ? filteredExpenses = filteredExpenses.filter(d => d.month == expensefilter.month) : null

        // dia
        expensefilter.day !='' ? filteredExpenses = filteredExpenses.filter(d => d.day == expensefilter.day) : null

        // tipo
        expensefilter.type !='' ? filteredExpenses = filteredExpenses.filter(d => d.type == expensefilter.type) : null

        // descrição
        expensefilter.description !='' ? filteredExpenses = filteredExpenses.filter(d => d.description == expensefilter.description) : null

        // valor
        expensefilter.expenseValue !='' ? filteredExpenses = filteredExpenses.filter(d => d.expenseValue == expensefilter.expenseValue) : null

        // retornando o array de despesas filtradas 
        return filteredExpenses
    }
    // removendo elemento
    remove(id){
        localStorage.removeItem(id)
    }
}

let bd = new Bd();

function registerExpense(){
    let year = document.getElementById('ano')
    let month = document.getElementById('mes')
    let day = document.getElementById('dia')
    let type = document.getElementById('tipo')
    let description = document.getElementById('descricao')
    let expenseValue = document.getElementById('valor')
    
    let expense = new Expense(
        year.value,
        month.value,
        day.value,
        type.value,
        description.value,
        expenseValue.value
    )
    if (expense.validateData()) {
        bd.toRecord(expense)

        document.getElementById('modal_titulo').innerHTML = 'Registro inserido com sucesso'
        document.getElementById('modal_titulo').className ="modal-header text-success"
        document.getElementById('modal_conteudo').innerHTML = 'Despesa foi cadastrado com sucesso'
        document.getElementById('modal_button').className ="btn btn-success"
        document.getElementById('modal_button').innerHTML = 'Voltar'

        $('#modalRegistraDespresa').modal('show') 

        year.value = ''
        month.value = ''
        day.value = ''
        type.value = ''
        description.value = ''
        expenseValue.value = ''

    }else {
       document.getElementById('modal_titulo').innerHTML = 'Erro na inclusão do registro campos inválidos'
       document.getElementById('modal_titulo').className ="modal-header text-danger"
       document.getElementById('modal_conteudo').innerHTML = 'Existem campos obrigatórios que não foram preenchidos '
       document.getElementById('modal_button').className ="btn btn-danger"
       document.getElementById('modal_button').innerHTML = 'Voltar e corrigir'

       $('#modalRegistraDespresa').modal('show') 
    }
    
    

}
function loadExpenseList (expenses = Array(), filter = false){
    
    if(expenses.length == 0 && filter == false){
        expenses = bd.retrieveRecord()
    }
    // selecionando o elemento tbody da tabelas
    let listExpenses = document.getElementById('listaDespesas')

    listExpenses.innerHTML = ''

    // percorrer o array expenses listando cada despesa de forma dinamica
    expenses.forEach(function(d){
        
        // criando as linhas tr
        let line = listExpenses.insertRow()

        // criando as colunas td
        line.insertCell(0).innerHTML =`${d.day}/${d.month}/${d.year}`
        
        // ajustar o tipo 
        switch (parseInt(d.type)){

            case 1 : d.type = 'Alimentação'
                break
            case 2 : d.type = 'Educação'
                break
            case 3 : d.type = 'Lazer'
                break
            case 4 : d.type = 'Saúde'
                break
            case 5 : d.type = 'Transporte'
                break
        }
        line.insertCell(1).innerHTML = d.type
        line.insertCell(2).innerHTML = d.description
        line.insertCell(3).innerHTML = `R$ ${parseFloat(d.expenseValue)}`

        // criar botão para excluir
        let btn = document.createElement('button')
        btn.className = 'btn btn-danger'
        btn.innerHTML = '<i class="fas fa-times"></i>'
        // adicionando id para cada butão
        btn.id = `id_despesa_${d.id}`
        let btn1 = document.getElementById('modal_button1')
        btn.onclick = function () {
            // aqui estou removendo a string id_despesa_ para ficar somente o id para conseguir localizar no localstorage
            let id = this.id.replace('id_despesa_', '')

            displayModal ()
            btn1.onclick = function () {
                deleteExpense (id)
            }
            
        }

        line.insertCell(4).append(btn)
    
    })

}
function searchExpense(){
    let year = document.getElementById('ano').value
    let month = document.getElementById('mes').value
    let day = document.getElementById('dia').value
    let type = document.getElementById('tipo').value
    let description = document.getElementById('descricao').value
    let expenseValue = document.getElementById('valor').value

    let expense = new Expense(year, month, day, type, description, expenseValue)
    
    let expenses = bd.search(expense)

    loadExpenseList (expenses ,true)

}
function displayModal (){
        document.getElementById('modal_titulo').innerHTML = 'Cuidado'
        document.getElementById('modal_titulo').className ="modal-header text-warning"
        document.getElementById('modal_conteudo').innerHTML = 'Deseja excluir a despesa selecionada'
        document.getElementById('modal_button').className ="btn btn-success"
        document.getElementById('modal_button').innerHTML = 'Não'
        document.getElementById('modal_button1').innerHTML = 'Excluir'
        document.getElementById('modal_button1').className ="btn btn-danger"

        $('#modal').modal('show') 
}
function deleteExpense(id){
    
    bd.remove(id)

    window.location.reload()
}