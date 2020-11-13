$(function () {
    inisialisasi();
});

function printPDF(){
    printJS('income_report_id', 'html');
}

function inisialisasi(){
    $('#income_topdf').on('click', function(){
        printPDF();
    });
}