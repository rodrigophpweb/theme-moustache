// Busca CEP Usando a Api dos Correios
$(document).ready(function() {

	function limpa_formulário_cep() {
	    // Limpa valores do formulário de cep.
	    $("input[name='endereco']").val("");
	    $("input[name='bairro']").val("");
	    $("input[name='cidade']").val("");
	    $("input[name='estado']").val("");
	}

	//Quando o campo cep perde o foco.
	$("input[name='cep']").blur(function() {

	    //Nova variável "cep" somente com dígitos.
	    var cep = $(this).val().replace(/\D/g, '');

	    //Verifica se campo cep possui valor informado.
	    if (cep != "") {

	        //Expressão regular para validar o CEP.
	        var validacep = /^[0-9]{8}$/;

	        //Valida o formato do CEP.
	        if(validacep.test(cep)) {

	            //Preenche os campos com "..." enquanto consulta webservice.
	            $("input[name='endereco']").val("...");
	            $("input[name='bairro']").val("...");
	            $("input[name='cidade']").val("...");
	            $("input[name='estado']").val("...");

	            //Consulta o webservice viacep.com.br/
	            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

	                if (!("erro" in dados)) {
	                    //Atualiza os campos com os valores da consulta.
	                    $("input[name='endereco']").val(dados.logradouro);
	                    $("input[name='bairro']").val(dados.bairro);
	                    $("input[name='cidade']").val(dados.localidade);
	                    $("input[name='estado']").val(dados.uf);
	                } //end if.
	                else {
	                    //CEP pesquisado não foi encontrado.
	                    limpa_formulário_cep();
	                    alert("CEP não encontrado.");
	                }
	            });
	        } //end if.
	        else {
	            //cep é inválido.
	            limpa_formulário_cep();
	            alert("Formato de CEP inválido.");
	        }
	    } //end if.
	    else {
	        //cep sem valor, limpa formulário.
	        limpa_formulário_cep();
	    }
	});
});

// Mascara de Entrada usando JQuery Mask
$(document).ready(function(){
	$("input[name='nascimento']").mask("00/00/0000");
	$("input[name='cep']").mask('00000-000');
});

// Para um digito a mais no caso de celular for de São Paulo
var celular = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(celular.apply({}, arguments), options);
    }
};

$("input[name='telefone']").mask(celular, spOptions);


// Autocomplete na busca em ajax
jQuery(function($){
	var searchRequest;
	$("input[type='search']").autoComplete({
		minChars: 3,
		source: function(term, suggest){
			try { searchRequest.abort(); } catch(e){}
			searchRequest = $.post(scripts_js.ajax, { search: term, action: 'search_site' }, function(res) {
				suggest(res.data);
			});
		}
	});
})



// Enviando o formulário via Ajax
$(function () {
    var uri = $('input[name="uri"]').val()     
    $('form[name=contato]').on('submit', function (e) {
        e.preventDefault();
		$.ajax({
			type: 'post',
			url: uri + '/post.php',
			data: $('form[name="contato"]').serialize(),
			success: function() {
				alert('Seus dados foram enviados com sucesso!');
            	$('.contato')[0].reset();
			}
      	});
    });
});

