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
                    <input name="nome" type="text" class="limpar form-control mb-3 rounded-0" placeholder="Seu nome" required>
                    <input name="email" type="email" class="limpar form-control mb-3 rounded-0" placeholder="Seu e-mail" required>
                    <input name="telefone" type="text" class="limpar form-control mb-3 rounded-0" placeholder="Seu telefone" required>
                    <input name="nascimento" type="text" class="limpar form-control mb-3 rounded-0" placeholder="Data de Nascimento" required>
                </div>

                <div class="col-lg-6">
                    <input name="cep" type="text" class="limpar form-control mb-3 rounded-0" placeholder="CEP" required>
                    <div class="form-row">
                        <div class="col-lg-9 mb-3">
                            <input name="endereco" type="text" class="limpar form-control rounded-0 " placeholder="Endereço">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <input name="numero" type="text" class="limpar form-control rounded-0" placeholder="Número" required>
                        </div>
                    </div>
                    <input name="bairro" type="text" class="limpar form-control rounded-0 mb-3" placeholder="Bairro">
                    <div class="form-row">
                        <div class="col-lg-9 mb-3">
                            <input name="cidade" type="text" class="limpar form-control rounded-0 " placeholder="Cidade">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <input name="estado" type="text" class="limpar form-control rounded-0" placeholder="Estado">
                        </div>                        
                    </div>
                </div>                        
                    <input name="uri" type="hidden" value="<?php echo get_template_directory_uri();?>">
                </div>

                <div class="col-lg-12 text-center mt-4 mb-5 pb-3">
                    <input name="enviar" type="submit" value="Enviar Dados" class="rounded-0 btn btn-primary btn-sm">
                </div>
            </div>
        </form>
    </div>
</section>