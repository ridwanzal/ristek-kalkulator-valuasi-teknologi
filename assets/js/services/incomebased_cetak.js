$(function () {
    inisialisasi();
});

function printPDF_income(){
    printJS('income_report_id', 'html');
}

function inisialisasi(){
    $('#income_topdf').on('click', function(){
        printPDF_income();
    });
}