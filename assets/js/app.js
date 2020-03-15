var app = (function() {

    /* ----------- */
    /* show overlay */
    /* ----------- */
    function lock() {
        $(".spinner-container").fadeIn(500);
    }

    /* ----------- */
    /* remove overlay */
    /* ----------- */
    function unlock() {
        $(".spinner-container").fadeOut('fast');
    }

    /* ----------- */
    /* message */
    /* ----------- */
    function message(body) {
        $snackbar = $("#snackbar");
        $snackbar.html(body);
        $snackbar.addClass('show');
        setTimeout(function() { $snackbar.removeClass("show"); }, 3000);
    }

    /* ----------- */
    /* toast message */
    /* ----------- */
    function toast(json) {
        $icon = (json.status == "success" ? "check" : "exclamation-triangle");
        app.message('<i class="fas fa-' + $icon + '"></i> ' + ($icon != "check" ? " Oops, tivemos um problema. " : "") + json.message);
    }

    /* ----------- */
    /* get */
    /* ----------- */
    function get(json) {
        $.ajax({
            url: $("input[name=root]").val() + json.url,
            method: 'GET',
            contentType: 'application/json',
            dataType: 'json',
            success: json.success,
            error: json.error
        });
    }
    /* ----------- */
    /* post */
    /* ----------- */
    function post(json) {
        $.ajax({
            url: $("input[name=root]").val() + json.url,
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: json.data,
            success: json.success,
            error: json.error
        });
    }
    /* .end */

    /* ----------------- */
    /* Init              */
    /* ----------------- */
    function init() {

        // ----------------- //
        // Default Loading  //
        // ----------------- //
        $(".spinner-container").fadeOut('fast');

        // ----------------- //
        // Custom Functions  //
        // ----------------- //
        $(".post").click(function() {
            $(".spinner-container").fadeIn(500);
        });

        $(".post-confirm").click(function() {
            let mensagem = $(this).attr("data-message");
            let _confirm = confirm(mensagem);
            if (_confirm) {
                $(".spinner-container").fadeIn(500);
            }
            return _confirm;
        });

        // ----------------- //
        // BS JS //
        // ----------------- //          
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();

        // ------------- //
        // Masks //
        // ------------- //
        $('.money').mask("#.##0,00", { reverse: true });
        $('.numeric').mask("#0", { reverse: true });
        $('.phone').mask("(99) 99999999#");
        $('.calendar').mask("99/99/9999");
        $('.cpf').mask("999.999.999-99");
        $(".cnpj").mask("99.999.999/9999-99");
        $('.rg').mask("99.999.999-A");
        $('.cep').mask("99999-999");

        // ------------- //        
        // consulta CEP /
        // ------------- //        
        $(".cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {
                    $(".spinner-container").fadeIn(500);

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("input[name=logradouro]").val('');
                    $("input[name=bairro]").val('');
                    $("input[name=cidade]").val('');
                    $("select[name=uf]").val('');
                    // $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("input[name=logradouro]").val(dados.logradouro);
                            $("input[name=bairro]").val(dados.bairro);
                            $("input[name=cidade]").val(dados.localidade);
                            $("select[name=uf]").val(dados.uf);
                            // $("#ibge").val(dados.ibge);
                            $(".spinner-container").fadeOut('fast');
                        } //end if.
                        else {
                            // CEP pesquisado não foi encontrado.
                            app.message("CEP não encontrado.");
                            $(".spinner-container").fadeOut('fast');
                        }
                    });
                } //end if.
                else {
                    app.message("Formato de CEP inválido.");
                    $(".spinner-container").fadeOut('fast');
                }
            } //end if.
            else {
                // cep sem valor, limpa formulário.
                $(".spinner-container").fadeOut('fast');
            }
        });

        // ------------- //
        // Custom Validators //
        // ------------- //
        jQuery.validator.addMethod("date-br", function(value, element) {
            return new moment(value, "DD/MM/YYYY").isValid();
        }, "data inválida!");

        jQuery.validator.addMethod("money-br", function(value, element) {
            return (value != "");
        }, "");

        // ------------- //
        // Forms Validator //
        // ------------- //
        var forms = $("form");
        forms.each(function(i) {
            $(this).validate({
                errorElement: "em",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertBefore(element.next("label"));
                    } else {
                        error.insertBefore(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });

            $(this).submit(function() {
                if ($(this).valid()) {
                    $(".spinner-container").fadeIn(500);
                }
            });
        });

        // ---------------- //
        // Ajax form submit //
        // ---------------- //
        $(".ajax-form").submit(function(event) {
            event.preventDefault();

            if ($(this).valid()) {

                $(".spinner-container").fadeIn(500);

                $form = $(this);
                var action = $form.attr("action");
                var serializedData = $form.serialize();

                $.ajax({
                    url: action,
                    method: 'POST',
                    data: serializedData,
                    success: function(res) {
                        console.log(res);
                        app.toast(res);
                        $(".spinner-container").fadeOut('fast');
                    },
                    error: function(err) {
                        console.log(err);
                        app.toast(err);
                        $(".spinner-container").fadeOut('fast');
                    }
                });

            }

        });


        // ----------------- //
        // Default Datatable //
        // ----------------- //
        $('.table-default').DataTable({
            "sScrollX": "100%",
            "sScrollXInner": "110%",
            "bLengthChange": false,
            "lengthMenu": [
                [5, 10],
                [5, 10]
            ],
            "searching": false,
            "order": [
                [1, "desc"]
            ],
            "ordering": false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            }
        });

        $.validator.messages.required = '*';
        $.validator.messages.email = '';

        // ------------- //
        // Call Page JS //
        // ------------- //        
        if (typeof page != "undefined") {
            page.init();
        }

    }

    return {
        init: init,
        lock: lock,
        unlock: unlock,
        message: message,
        toast: toast,
        get: get,
        post: post
    };
}());