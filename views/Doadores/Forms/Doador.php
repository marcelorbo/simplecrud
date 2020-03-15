<form name="formDoador" method="POST" class="forms-sample">
    <div class="form-row">
        
        <?php if(!empty($viewbag->model)): ?>
            <!-- guarda id doador -->
            <input type="hidden" name="id" value="<?= $viewbag->model->id ?? 0 ?>" />

            <!-- endereço -->
            <?php $address = $viewbag->model->getAddress(); ?>
        <?php endif ?>              

        <div class="form-group col-md-12">
            <span class="h5 text-muted">Dados cadastrais</span>
            <hr>
        </div>

        <!---------------------->
        <!-- dados cadastrais -->
        <!---------------------->        
        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="" required="true" value="<?= $viewbag->model->nome ?? "" ?>" />
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="text" class="form-control email" name="email" placeholder="" required="true" value="<?= $viewbag->model->email ?? "" ?>" />
        </div>

        <div class="form-group col-md-6">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control cpf" name="cpf" placeholder="" required="true" value="<?= $viewbag->model->cpf ?? "" ?>" />
        </div>        

        <div class="form-group col-md-6">
            <label for="datanascimento">Data Nascimento</label>
            <input type="text" class="form-control calendar" name="datanascimento" placeholder="" required="true" date-br="true" value="<?= !empty($viewbag->model->datanascimento) ? dateBR($viewbag->model->datanascimento) : "" ?>" />
        </div>               

        <div class="form-group col-md-6">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control phone" name="telefone" placeholder="" required="true" value="<?= $viewbag->model->telefone ?? "" ?>" />
        </div>                       

        <div class="form-group col-md-6">
            <label for="celular">Celular</label>
            <input type="text" class="form-control phone" name="celular" placeholder="" value="<?= $viewbag->model->celular ?? "" ?>" />
        </div>                       

        <div class="form-group col-md-4">
            <label for="intervalodoacao">Intervalo doação</label>
            <select name="intervalodoacao" class="custom-select form-control" required="true">
                <option value="">Selecione.</option>
                <?php foreach($viewbag->intervalosdoacao as $intervalo): ?>
                    <option value="<?= $intervalo->id ?>"><?= $intervalo->nome ?></option>
                <?php endforeach ?>
            </select>            
        </div>        

        <div class="form-group col-md-4">
            <label for="valordoacao">Valor</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>            
                <input type="text" class="form-control money" name="valordoacao" placeholder="" money-br="true" value="<?= $viewbag->model->valordoacao ?? "" ?>" />
            </div>
        </div>                               

        <div class="form-group col-md-4">
            <label for="formapagamento">Forma de pagamento</label>
            <select name="formapagamento" class="custom-select form-control" required="true">
                <option value="">Selecione.</option>
                <?php foreach($viewbag->formaspagamento as $formapagamento): ?>
                    <option value="<?= $formapagamento->id ?>"><?= $formapagamento->nome ?></option>
                <?php endforeach ?>
            </select>            
        </div>       

        <div class="form-group col-md-12 mb-5">
            <label for="observacoes">Observações <small class="text-muted">opcional</small></label>
            <textarea class="form-control custom-textarea" name="observacoes" placeholder="Observações sobre o cadastro..."><?= $viewbag->model->observacoes ?? "" ?></textarea>
        </div>  
        <!----------------------------->
        <!-- // fim dados cadastrais -->
        <!----------------------------->
        
        <div class="form-group col-md-12">
            <span class="h5 text-muted">Endereço</span>
            <hr>
        </div>

        <!---------------------->
        <!-- endereço -->
        <!---------------------->
        <?php if(!empty($address)): ?>
            <!-- guarda id doador -->
            <input type="hidden" name="idendereco" value="<?= $address->id ?? 0 ?>" />
        <?php endif ?>              

        <div class="form-group col-md-3">
            <label for="cep">CEP</label>
            <input type="text" class="form-control cep" name="cep" required="true" value="<?= $address->cep ?? "" ?>" />
        </div>

        <div class="form-group col-md-9">
            <label for="logradouro">Endereço</label>
            <input type="text" class="form-control" name="logradouro" value="<?= $address->logradouro ?? "" ?>" />
        </div>

        <div class="form-group col-md-3">
            <label for="numero">Número</label>
            <input type="text" class="form-control" name="numero" value="<?= $address->numero ?? "" ?>" />
        </div>        

        <div class="form-group col-md-3">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" name="complemento" value="<?= $address->complemento ?? "" ?>" />
        </div>                

        <div class="form-group col-md-6">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" value="<?= $address->bairro ?? "" ?>" />
        </div>                        

        <div class="form-group col-md-9">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" name="cidade" required="true" value="<?= $address->cidade ?? "" ?>" />
        </div>                                

        <div class="form-group col-md-3 mb-5">
            <label for="uf">UF</label>
            <select id="uf" name="uf" class="custom-select form-control" required="true">
                <option value="">Selecione.</option>
                <option value="SP">SP</option>                
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MG">MG</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>                
            </select>                        
        </div>                
        <!---------------------->
        <!-- // fim endereço -->
        <!---------------------->

    </div>
    <button class="btn btn-success font-weight-bold"><i class="fa fa-save"></i> &nbsp; Salvar</button>
</form>