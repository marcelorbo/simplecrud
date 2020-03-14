<!-- Start HTML -->

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="<?= CONFIG["BASEURL"]. "/assets/images/alpha-logo-white.png" ?>" style="width: 4vh;">  
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- section -->
<section class="bg-light text-dark">
    <!-- container -->
    <div class="container py-5">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-lg-12">
                <!-- card -->
                <div class="card bg-white border-1">
                    <!-- card body -->
                    <div class="card-body">

                        <!-- form -->
                        <form method="POST" action="<?= CONFIG["BASEURL"]. "/tests/form" ?>">
                            <div class="form-row">
                                <div class="form-group col-lg-5 mb-3">
                                    <label for="nome">Nome</label>
                                    <input name="nome" type="text" class="form-control">                                    
                                </div>
                                <div class="form-group col-lg-7 mb-4">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control">
                                </div>                                
                            </div>
                            <button class="btn btn-primary">Salvar</button>
                        </form>
                        <!-- .// end form -->     

                    </div>
                    <!-- . end card body -->
                </div>
                <!-- .// end card -->                
            </div>
            <!-- .// end col -->            
        </div>
        <!-- .// end row -->
    </div>
    <!-- .// container -->
</section>
<!-- .// section -->


<!-- //. End HTML -->

<!-- Custom Page Script -->    
<script>
    // ------------------- //
    // Custom Page Script  //
    // ------------------- //              
    var page = (function() {

        function init() {

        }
        return {
            init: init
        };
    }());
</script>


