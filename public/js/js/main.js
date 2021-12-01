$(document).ready(function() {
    $('.btn-cancelar').on('click', ()=> { window.history.back(); });

    $('body').on('click', '.delete-form button', function(e) {
        e.preventDefault();
        var form = $(this).parents('form.delete-form');
        if (!$('#dataConfirmModal').length) {
            $('body').append('<div class="modal fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="dataConfirmLabel">Confirmación</h4></div><div class="modal-body text-justify">Esta a punto de eliminar un registro.<br> <strong>¿Esta seguro de continuar?</strong></div><div class="modal-footer"><a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a><button class="btn btn-primary" id="dataConfirmOK">Continuar</button></div></div></div></div>');
        } else {
            $('#dataConfirmModal').unbind('click');
        }
        $('body').on('click', '#dataConfirmOK', function() {
            form.submit();
        });
        $('#dataConfirmModal').modal({show:true});
    });
});

jQuery.validator.addMethod("validDate", function(value, element) {
    return this.optional(element) || moment(value,"DD/MM/YYYY").isValid();
}, "Por favor coloque una fecha válida en formato día/mes/año");
