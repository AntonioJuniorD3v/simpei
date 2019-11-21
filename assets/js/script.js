//Script da Modal desativar 
$('#modalDesativar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) //Botão que acionou o modal
    var id = button.data('id')// Extrai informação dos atributos data-*
    // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
    // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
    var modal = $(this)
    modal.find('#id').val(id)
})

//Script da Modal Editar Equipamento
$('#modalEditar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) //Botão que acionou o modal
    var id = button.data('id')
    var nome = button.data('nome')
    var modelo = button.data('modelo')
    var patrimonio = button.data('patrimonio')
    var estado = button.data('estado')
    var periodoPreditiva = button.data('periodo-preditiva')
    var periodoPreventiva = button.data('periodo-preventiva')
    var checklistPreditiva = button.data('checklist-preditiva')
    var checklistPreventiva = button.data('checklist-preventiva')

    // Extrai informação dos atributos data-*
    // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
    // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
    var modal = $(this)
    modal.find('#id').val(id)
    modal.find('#nome').val(nome)
    modal.find('#modelo').val(modelo)
    modal.find('#patrimonio').val(patrimonio)
    modal.find('#estadoo').val(estado)
    modal.find('#periodoPreditiva').val(periodoPreditiva)
    modal.find('#periodoPreventiva').val(periodoPreventiva)



    $('#checklistPreditivaEditar').tokenfield('setTokens', checklistPreditiva);
    $('#checklistPreventivaEditar').tokenfield('setTokens', checklistPreventiva);

})

//Script da Modal Editar Usuario
$('#modalEditar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) //Botão que acionou o modal
    var id = button.data('id')
    var nome = button.data('nome')
    var usuario = button.data('usuario')
    var funcao = button.data('funcao')
    var estado = button.data('estado')
    var matricula = button.data('matricula') // Extrai informação dos atributos data-*
    // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
    // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
    if(funcao == 1){
        funcao = 'Analista';
    } else{
        funcao = 'Técnico';
    }

    if(estado == 1){
        estado = 'Ativado';
    } else{
        estado = 'Desativado';
    }
    
    var modal = $(this)
    modal.find('#id').val(id)
    modal.find('#nome').val(nome)
    modal.find('#usuario').val(usuario)
    modal.find('#funcao').val(funcao)
    modal.find('#estado').val(estado)
    modal.find('#matricula').val(matricula)

})

//Autocomplete página Editar
$(function(){
	$('#busca').on('keyup', function(){
        var texto = $(this).val();

		$.ajax({
			url:'http://localhost/simpei/equipamento/buscar',
			type:'POST',
			dataType:'json',
			data:{texto:texto},
			success:function(json) {
				var html = '';

				for(var i in json) {
                    //html += '<li><a href="usuario.php?id='+json[i].id+'">'+json[i].nome+'</a></li>';
                    html += '<tr><td>'+json[i].id+'</td><td><a href="equipamento?id=json[i].id" >'+json[i].nome+'</a></td><td>'+json[i].modelo+'</td><td>'+json[i].proximaManutencao+'</td><td><div class=""><span class="badge bg-'+json[i].color+'">'+json[i].estado+'</span></div></td><td><div class="btn-group" role="group" aria-label="Exemplo básico"><button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#modalEditar" data-id="'+ json[i].id+' " data-nome="'+ json[i].nome+'" data-modelo="'+ json[i].modelo+'" data-patrimonio="'+ json[i].patrimonio+'" data-estado="'+ json[i].estado+'">Editar</button>&nbsp;&nbsp;<button type="submit" class="btn btn-danger btn-sm" data-id="'+ json[i].id+'" data-toggle="modal" data-target="#modalDesativar">Desativar</button></div></td></tr>';
                }

				$('#resultado').html(html);
			}
		});
	});

});

//Autocomplete página Ordem de Serviço
$(function(){
	$('#buscaEquipamento').on('keyup', function(){
        var texto = $(this).val();

		$.ajax({
			url:'http://localhost/simpei/equipamento/buscar',
			type:'POST',
			dataType:'json',
			data:{texto:texto},
			success:function(json) {
				var html = '';

				for(var i in json) {
                    //html += '<li><a href="usuario.php?id='+json[i].id+'">'+json[i].nome+'</a></li>';
                    html += '<tr><td>'+json[i].id+'</td><td data-nome="'+json[i].nome+'"data-id="'+json[i].id+'">'+json[i].nome+'</td><td>'+json[i].modelo+'</td><td><div class="btn-group" role="group" aria-label="Exemplo básico"><button type="button" class="btn btn-success btn-sm btnSelecionarEquipamento" >Selecionar</button></div></td></tr>';
                }

				$('#resultado').html(html);
			}
		});
	});

});

//Script da Modal Selecionar Equipamento - Ordem de Serviço
$(document).on("click",'.btnSelecionarEquipamento', function(event){
    event.preventDefault;    
    var nome = $(this).closest('tr').find('td[data-nome]').data('nome');
    var id = $(this).closest('tr').find('td[data-id]').data('id');

    $("#inputEquipamento").val(nome);
    $("#idEquipamento").val(id);
    $("#modalPesquisarEquipamento").modal('hide');
})

$( document ).ready(function() {
    document.getElementById("dataFinal").innerHTML = dataAtualFormatada(0);
});

$("#selectPrioridade").change(function(){

    var prioridade = $(this).val();

    switch (prioridade) {
        case 'Muito Baixa':
            document.getElementById("dataFinal").innerHTML = dataAtualFormatada(30);
            break;
        case 'Baixa':
            document.getElementById("dataFinal").innerHTML = dataAtualFormatada(15);
            break;
        case 'Média':
            document.getElementById("dataFinal").innerHTML = dataAtualFormatada(7);
            break;
        case 'Alta':
            document.getElementById("dataFinal").innerHTML = dataAtualFormatada(3);
            break;
        case 'Muito Alta':
            document.getElementById("dataFinal").innerHTML = dataAtualFormatada(0);
            break;
    }

    function dataAtualFormatada(dias){
        var data = new Date(new Date().getTime() + (dias * 24 * 60 * 60 * 1000)),
            dia  = data.getDate().toString(),
            diaF = (dia.length == 1) ? '0'+dia : dia,
            mes  = (data.getMonth()+1).toString(), //+1 pois no getMonth Janeiro começa com zero.
            mesF = (mes.length == 1) ? '0'+mes : mes,
            anoF = data.getFullYear();
            $("#inputDataFinal").val(anoF+"-"+mesF+"-"+diaF);
        return diaF+"/"+mesF+"/"+anoF;
    }
});


//Gerar Relatorio Ordens de Serviço
$('#formRelatorioOrdemServicoo').on('submit', function(e) {
    e.preventDefault();
  
    var equipeTecnica = $('select[name=equipeTecnica]').val();
    var tecnico = $('select[name=tecnico]').val();
    var data = $('input[name=data]').val();
    var tipoManutencao = $('input[name=tipoManutencao]').val();
    var equipamento = $('input[name=equipamento]').val();

    $.ajax({  
      type:'POST',
      url:'http://localhost/simpei/relatorio/gerarRelatorio',
      data:{equipeTecnica:equipeTecnica, tecnico:tecnico, data:data, tipoManutencao:tipoManutencao, equipamento:equipamento },
      success:function(msg) {
        //window.location.href="./register";
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        // window.location.href="./login/validate";
    }     
    });

    $("#tableRelatorioOrdemServico").load(location.href + "#tableRelatorioOrdemServico");
   
  
  });