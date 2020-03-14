<form name="formDoador" method="POST" class="forms-sample">
    <div class="form-row">
        
        <?php if(!empty($viewbag->model)): ?>
            <input type="hidden" name="id" value="<?= $viewbag->model->id ?? 0 ?>" />
        <?php endif ?>              

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
            <input type="text" class="form-control calendar" name="datanascimento" placeholder="" required="true" date-br="true" value="<?= $viewbag->model->datanascimento ?? "" ?>" />
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
                    <option <?php echo !empty($viewbag->model) ? ($viewbag->model->intervalodoacao == $intervalo) ? "selected" : "" : "" ?> ><?= $intervalo ?></option>
                <?php endforeach ?>
            </select>            
        </div>        

        <div class="form-group col-md-4">
            <label for="valor">Valor</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>            
                <input type="text" class="form-control money" name="valor" placeholder="" money-br="true" value="<?= $viewbag->model->valor ?? "" ?>" />
            </div>
        </div>                               

        <div class="form-group col-md-4">
            <label for="formapagamento">Forma de pagamento</label>
            <select name="formapagamento" class="custom-select form-control" required="true">
                <option value="">Selecione.</option>
                <?php foreach($viewbag->formaspagamento as $formapagamento): ?>
                    <option <?php echo !empty($viewbag->model) ? ($viewbag->model->formapagamento == $formapagamento) ? "selected" : "" : "" ?> ><?= $formapagamento ?></option>
                <?php endforeach ?>
            </select>            
        </div>       

        <div class="form-group col-md-12">
            <label for="observacoes">Observações <small class="text-muted">opcional</small></label>
            <textarea class="form-control custom-textarea" name="observacoes" placeholder="Observações sobre o cadastro..."><?= $viewbag->model->observacoes ?? "" ?></textarea>
        </div>              
    </div>
    <button class="btn btn-success font-weight-light"><i class="fa fa-save"></i> Salvar</button>
</form>