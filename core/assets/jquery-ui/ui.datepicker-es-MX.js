/* Inicialización en español para la extensión 'UI date picker' para jQuery. */
/* Traducido por Vester (xvester@gmail.com). */
/* Modificado y corregido por Ultiminio Ramos Galán uramos@gmail.com */
/* 2013-02-15 */
(function($) {
   $.datepicker.regional['es-MX'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 weekHeader: 'Sm',
 dateFormat: 'yy-mm-dd',
 firstDay: 0,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: '',
 changeMonth: true,
 changeYear: true,
 showOtherMonths: true,
 selectOtherMonths: true
 };
    $.extend($.datepicker.defaults, $.datepicker.regional['es-MX']);
})(jQuery);