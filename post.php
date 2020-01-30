<?php
	
	/*
	*
	* As linhas 14 até 27 são as variáveis onde estou armanezando as informações
	* do formulário através do metódo POST. 
	* 
	* Para obter mais informações sobre variáveis estou colocando um link 
	* abaixo para estudo, direto do site oficial do PHP
	* https://www.php.net/manual/pt_BR/language.variables.basics.php
	*
	*/

	$assunto        = 'Formulário de Contato';
	$corpo 			= "
		Assunto: 					".$assunto."
		Nome: 						".$_POST['nome']." 
		Email: 						".$_POST['email']."
		Telefone:					".$_POST['telefone']."
		Data de Nascimento: 		".$_POST['nascimento']."
		CEP: 						".$_POST['cep']."
		Endereço:					".$_POST['endereco']."
		Número:						".$_POST['numero']."
		Bairro:						".$_POST['bairro']."
		Cidade:						".$_POST['cidade']."
		Estado:						".$_POST['estado']."
	";

	/*
	* A Função é responsável por realizar o disparo dar informações por email.
	* essa função depende de alguns paramêtros como:
	* Destinatário: Para qual e-mail será enviado os dados.
	* Assunto: Seria o subject o assunto referente a informação a ser enviada.
	* Corpo: São os dados armazenados na variável.
	* Remetente: Onde será exibido qual email está sendo enviado.
	* 
	* Para mais definição sobre a função mail você pode ler o link abaixo
	* https://www.php.net/manual/pt_BR/function.mail.php
	*
	*/
	mail('rodrigo.mct@gmail.com', $assunto, $corpo, 'From: contato@moustache.com.br');
	
	
	/*
	*
	* Função echo responsável por imprimir uma string(texto) na tela o.
	* 
	* Veja com mais detalhes no link abaixo.
	* https://www.php.net/manual/pt_BR/function.echo.php
	*
	*/

	
?>