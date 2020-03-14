<!-- Start HTML -->

<!-- Custom Css -->
<style>
    #editor {
        min-height: 300px;
    }
</style>
<!-- .// Custom Css -->

<!-- Navbar -->
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
<!-- .// Navbar -->

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

                        <!-- Editor -->
                        <div id="editor"></div>                        
                        <!-- .// Editor -->

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
    var quill = {};

    var page = (function() {

        function init() {

            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike', 'image'],        // toggled buttons
                ['blockquote', 'code-block'],

                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                // [{ 'direction': 'rtl' }],                         // text direction

                // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],

                // ['clean']                                         // remove formatting button
            ];

            quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    imageResize: {
                        displaySize: true
                    },                    
                    toolbar: toolbarOptions
                }                
            });

        }
        return {
            init: init
        };
    }());
</script>


