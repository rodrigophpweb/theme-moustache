<!-- Formulário -->
<section id="formulario">
    <div class="container">
        <div class="row pt-5 mt-4 mb-5">
            <div class="col-lg-12 text-center">
                <h2>Formulário de Contato</h2>
            </div>
        </div>
        <form name="contato" class="contato">
            <div class="row">
                <div class="col-lg-6">
                    <input name="nome" type="text" class="limpar form-control mb-3 rounded-0" placeholder="Seu nome">
                    <input name="email" type="email" class="limpar form-control mb-3 rounded-0" placeholder="Seu e-mail" required>
                    <input name="telefone" type="text" class="limpar form-control mb-3 rounded-0" placeholder="Seu telefone">
                    <input name="nascimento" type="text" class="limpar form-control mb-3 rounded-0" placeholder="Data de Nascimento">
                </div>

                <div class="col-lg-6">
                    <input name="cep" type="text" class="limpar form-control mb-3 rounded-0" placeholder="CEP">                        
                    <div class="row mb-3">
                        <input name="endereco" type="text" class="limpar form-control ml-3 rounded-0 col-lg-8" placeholder="Endereço">
                        <input name="numero" type="text" class="limpar form-control col-lg-3 ml-3 rounded-0" placeholder="Número">
                    </div>
                    <input name="bairro" type="text" class="limpar form-control mb-3" placeholder="Bairro">
                    <div class="row">
                        <input name="cidade" type="text" class="limpar form-control ml-3 rounded-0 col-lg-8" placeholder="Cidade">
                        <input name="estado" type="text" class="limpar form-control col-lg-3 ml-3 rounded-0" placeholder="Estado">
                        <input name="uri"    type="hidden" value="<?php echo get_template_directory_uri();?>">
                    </div>
                </div>

                <div class="col-lg-12 text-center mt-4 mb-5 pb-3">
                    <input name="enviar" type="submit" value="Enviar Dados" class="rounded-0 btn btn-primary btn-sm">
                </div>
            </div>
        </form>
    </div>
</section>