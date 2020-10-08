$('#tgl_publikasi').mask('0000-00-00');
$('#tahun_permohonan').mask('0000');

$(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,      
  });
});