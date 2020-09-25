const base_url_access = 'http://api.sinta.ristekdikti.go.id/fusio/public/consumer/login';
const base_url_login = 'http://api.sinta.ristekdikti.go.id/v2/author/login';
const base_url_api = 'http://api.sinta.ristekdikti.go.id/v2';
const web_url = 'http://localhost/ristek-kalkulator-valuasi-teknologi';
const el_click_login = $('#submit_login');
const access_api = {
    username : 'KALKULATORHKI',
    password : 'f0rmyAcc3ss'
};

const userdetails = JSON.parse(localStorage.getItem('userdetails'));
const loader = {
    show : function(){
        $('.loader').css({
            'visibility' : 'visible'
        });
    },
    hide : function(){
        $('.loader').css({
            'visibility' : 'hidden'
        });
    }
}

// module helper

function checkEmpty(el){
    if(el.val() == '' || el.val() == null){
        el.css({
            'border-bottom' : '1px solid #fc3503'
        });
        return true;
    }else{
        el.css({
            'border-bottom' : '1px solid #ccc'
        })
        return false;
    }
}

const money = {
    format : function(str){
        let number_string = str.replace(/[^,\d]/g, '').toString(),
        split	= number_string.split(','),
        sisa 	= split[0].length % 3,
        rupiah 	= split[0].substr(0, sisa),
        ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    },
    formatdec : function(){

    },
    reverse : function(str){
        let rupiah = str;
        let clean = rupiah.replace(/\D/g, '');
        return clean
    }
}