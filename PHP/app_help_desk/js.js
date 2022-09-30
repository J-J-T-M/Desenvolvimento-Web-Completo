function Modal(){
    document.getElementById('modal_titulo').innerHTML = 'Cuidado'
      document.getElementById('modal_titulo').className ="modal-header text-warning"
      document.getElementById('modal_conteudo').innerHTML = 'Deseja excluir a despesa selecionada'
      document.getElementById('modal_button').className ="btn btn-success"
      document.getElementById('modal_button').innerHTML = 'Não'
     
    $('#modal').modal('show') }