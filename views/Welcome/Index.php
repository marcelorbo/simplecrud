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

<section class="bg-success text-white">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <ul>
                    <h5>Basics</h5>
                    <hr>
                    <li>Route</li>
                    <li>Basic CRUD</li>
                    <li>Basic CRUD</li>                        
                </ul>
            </div>
            <div class="col-lg-3">
                <?php
                
                ?>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-3"></div>                                    
        </div>
    </div>
</section>

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


