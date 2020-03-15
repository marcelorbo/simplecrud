<!-- HTML -->
<section class="container">
    <div class="row my-5">
        <div class="col-lg-9 mx-auto">
            <a href="<?= CONFIG["BASEURL"]. "/doadores/cadastrar" ?>" class="btn btn-primary post float-right mb-3 font-weight-light"><i class="fa fa-plus"></i> &nbsp;Cadastrar novo doador</a>
        </div>
        <div class="col-lg-9 mx-auto">
            <div class="card border-0 bg-white">
                <div class="bg-dark card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <span class="m-0 font-weight-bold text-white h5">Doadores cadastrados</span>
                </div>
                <div class="card-body">
                    <?= ($viewbag->table->Render()) ?>
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


