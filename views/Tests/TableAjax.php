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

<!-- Modals -->

<!-- Principal -->
<div class="modal fadex" id="modalDemo">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    
        <?php require("Modals/modalDemo.php") ?>
      
    </div>
  </div>
</div>

<!-- .end Modals -->

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
                        <!-- table -->
                        <?= ($viewbag->table->Render()) ?>
                        <!-- .// end table -->                        
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
    
    // -------------------- //
    // Local Functions
    // -------------------- //
    function showModal(data)
    {
        event.preventDefault();
        $("#modalDemo").modal();  
    }

    // ----------------- //    
    // ajax table object //
    // ----------------- //        
    var table = {};

    // --------------- //    
    // Init JS
    // --------------- //    
    var page = (function() {

        // --------------- //    
        // Init            //
        // --------------- //        
        function init() {

            // --------------- //
            // Ajax DataTable  //
            // --------------- //            
            table = $('.table').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "searching": false,
                "ordering": false,                
                "ajax": {
                    'url': $("input[name=root]").val() + '/tests/tableajax',
                    'type': "POST",
                    'data': function(data) {
                        // data.property = 
                    }                    
                },                
                "sScrollX": "100%",
                "sScrollXInner": "110%",
                "bLengthChange": false,
                "searching": false,
                "language": {
                    "url": $("input[name=root]").val() + '/assets/js/json/datatables-pt-br.json'
                },
                "lengthMenu": [[5, 10], [5, 10]],                
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            var retorno = '<a href="#" onclick="removerServico('+data+');"><i class="fas fa-trash text-danger"></i></a>';
                            retorno += ' &nbsp; <a href="#" onclick="showModal('+data+')"><i class="fas fa-edit text-primary"></i></a>';
                            return retorno;
                        },
                        "targets": 0,
                        "width": "60px"
                    },
                ]                    
            }); 
            // ------------------- //                
            // .End Ajax DataTable //
            // ------------------- //    

        }
        return {
            init: init
        };
    }());
</script>


