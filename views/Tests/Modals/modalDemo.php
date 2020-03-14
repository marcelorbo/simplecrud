<!-- Form -->
<form name="formModalDemo" method="POST" class="forms-sample" action="<?= CONFIG["BASEURL"]. "/tests/tableajax" ?>">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Mensagem</h4>
            <button type="button" class="close text-white" data-dismiss="modal">×</button>
            <!-- hidden fields -->
            <?php if(!empty($viewbag->model)): ?>
                <input type="hidden" name="idorgao" value="<?= $viewbag->model->id ?? 0 ?>" />
            <?php endif ?>              
        </div>
        <!-- .End Modal Header -->        

        <!-- Modal body -->
        <div class="modal-body">
            <!--     
            <label for="servico">#</label>
            <p class=""><?= !empty($viewbag->model) ? "#". $viewbag->model->id . " ". $viewbag->model->orgao : "" ?></p>
            -->

            <!-- form body -->    
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="servico">Nome</label>
                    <input type="text" class="form-control clear" name="nome" placeholder="Nome" required="true" value="" />
                </div>
                <div class="form-group col-md-12">
                    <label for="servico">Email</label>
                    <input type="text" class="form-control clear" name="email" placeholder="Email" required="true" value="" />
                </div>                
                <!-- <div class="form-group col-md-12">
                    <label for="situacao">Situação</label>
                    <select name="situacao" class="custom-select form-control clear" required="true">
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>                                            
                </div> -->         
                <div class="form-group col-md-12">
                    <label for="observacoes">Mensagem <small class="text-muted">opcional</small></label>
                    <textarea class="form-control custom-textarea clear" name="observacoes" placeholder="Observações ... "></textarea>
                
                    <input type="hidden" name="id" class="clear" value=""/>
                </div>              
            </div>
            <!-- // form body -->                

        </div>
        <!-- . // End Modal Body -->

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>

          <!-- form submit -->
            <button class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">salvar</span>
            </button>

        </div> 
        <!-- .// End Modal Footer -->               

</form>
<!-- .end Form -->