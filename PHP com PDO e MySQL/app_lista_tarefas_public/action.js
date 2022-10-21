function edit(id, txt_task) {

    //criar um form de edição
    let form = document.createElement('form')
    form.action = 'tarefa_controller.php?acao=atualizar'
    form.method = 'post'
    form.className = 'row'

    //criar um input para entrada do texto
    let inputTask = document.createElement('input')
    inputTask.type = 'text'
    inputTask.name = 'task'
    inputTask.className = 'col-9 form-control'
    inputTask.value = txt_task

    //criar um input hidden para guardar o id da tarefa
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    //criar um button para envio do form
    let button = document.createElement('button')
    button.type = 'submit'
    button.className = 'col-3 btn btn-info'
    button.innerHTML = 'Atualizar'

    //incluir inputTarefa no form
    form.appendChild(inputTask)

    //incluir inputId no form
    form.appendChild(inputId)

    //incluir button no form
    form.appendChild(button)

    //selecionar a div tarefa
    let task = document.getElementById('task_'+id)

    //limpar o texto da tarefa para inclusão do form
    task.innerHTML = ''

    //incluir form na página
    task.insertBefore(form, task[0])

}

function remove (id)
{
    location.href = 'todas_tarefas.php?acao=remover&id='+id;
}

function taskAccomplished(id)
{
    location.href = 'todas_tarefas.php?acao=marcarRealizada&id='+id;
}