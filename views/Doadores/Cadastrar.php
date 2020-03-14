<!-- HTML -->
<section class="container">
    <div class="row my-5">
        <div class="col-lg-9 mx-auto">
            <a href="<?= CONFIG["BASEURL"]. "/doadores/cadastrar" ?>" class="btn btn-primary post float-right mb-3 font-weight-light"><span class=""><i class="fa fa-plus d-block d-lg-none"></i></span> <span class="d-none d-lg-block"> <i class="fa fa-plus"></i> Cadastrar novo doador</span></a>
            <a href="<?= CONFIG["BASEURL"]. "/doadores/listar" ?>" class="btn btn-primary post float-right mb-3 mr-2 font-weight-light"><span class=""><i class="fa fa-list d-block d-lg-none"></i></span> <span class="d-none d-lg-block"><i class="fa fa-list"></i> Voltar a listagem</span></a>
        </div>
        <div class="col-lg-9 mx-auto">
            <div class="card border-0 bg-white">
                <div class="bg-dark card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <span class="m-0 font-weight-bold text-white h5">Cadastro de novo doador</span>
                </div>
                <div class="card-body">
                    <?php require("Forms/Doador.php") ?>                                                
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //. HTML -->

<!-- Page Script -->    
<script>
    var page = (function() {

        function init() {

        }
        return {
            init: init
        };
    }());
</script>


