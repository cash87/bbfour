$(document).ready(function(){
    $("#formSuscribe").bootstrapValidator({
        excluded: [":disabled"],
        feedbackIcons: {
            valid: "glyphicon glyphicon-ok",
            invalid: "glyphicon glyphicon-remove",
            validating: "glyphicon glyphicon-refresh"
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: "Este campo es requerido"
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: "Este campo es requerido"
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: "Este campo es requerido"
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: "Este campo es requerido"
                    }
                }
            },
            zipcode: {
                validators: {
                    notEmpty: {
                        message: "Este campo es requerido"
                    }
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: "Este campo es requerido"
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: "Este campo es requerido"
                    }
                }
            },
            pswd: {
                validators: {
                    notEmpty: {
                        message: "Este campo es requerido"
                    }
                }
            },
        }
    }).on("success.form.bv", function(e) {
        $("#success_message").slideDown({ opacity: "show" }, "slow") // Do something ...
        $("#formSuscribe").data("bootstrapValidator").resetForm();
        e.preventDefault();
        controlador("RegisterFreeNewUser",true,$("#formSuscribe").serializeArray(),
            function(data,status){
                if(data.respuesta == true){
                    lruDir(data.page);
                }
            });
    });
});