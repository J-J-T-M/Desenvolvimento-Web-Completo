$(document).ready(() => {
	$('#documentation').on('click', () =>{
        // $('#pagina').load('documentation.html') // load por default ele é get
		// $.get('documentation.html', data => {
		// 	$('#pagina').html(data)
		// })
		$.post('documentation.html', data => {
			$('#pagina').html(data)
		})

    })

    $('#support').on('click', () =>{
        // $('#pagina').load('support.html')
		// $.get('support.html', data => {
		// 	$('#pagina').html(data)
		// })
		$.post('support.html', data => {
			$('#pagina').html(data)
		})

    })

	// ajax
	$('#competence').on('change', e => {
		
		let competence = $(e.target).val() 
		console.log(competence)
		
		$.ajax({
			type: 'GET',
			url: 'dashboard.controller.php',
			data: `competence=${competence}`, //x-www-form-urlencoded
			dataType: 'json',
			success: dados => {
				$('#salesNumbers').html(dados.salesNumbers),
				$('#salesAmount').html(dados.salesAmount),
				$('#activeClients').html(dados.activeClients),
				$('#inactivesClients').html(dados.inactivesClients),
				$('#totalComplaints').html(dados.totalComplaints),
				$('#totalOfSuggestions').html(dados.totalOfSuggestions),
				$('#totalOfPraise').html(dados.totalOfPraise),
				$('#totalExpenses').html(dados.totalExpenses)
			},
			error: erro => { console.log(erro)}

		 }) //método, url, dados, sucesso, erro
	})

})