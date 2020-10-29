const base_url_access = 'http://api.sinta.ristekdikti.go.id/fusio/public/consumer/login';
const base_url_login = 'http://api.sinta.ristekdikti.go.id/v2/author/login';
const base_url_api = 'http://api.sinta.ristekdikti.go.id/v2';

const userdetails = JSON.parse(localStorage.getItem('userdetails'));
const author_overview = JSON.parse(sessionStorage.getItem('get_author_overview'));
const author_research = JSON.parse(sessionStorage.getItem('get_research'));
const author_ipr = JSON.parse(sessionStorage.getItem('get_ipr'));

const access_token_saved = sessionStorage.getItem('token');

/**
 * environment checking
 */
 
let web_url = '';
let env = '';
env = location.href.includes('localhost') ? 'dev' : 'production';
console.log(env);
if(env == 'dev'){
    web_url = 'http://localhost/ristek-kalkulator-valuasi-teknologi';
}else{
    web_url = 'http://sikav.ridwanzal.com';
}

const el_click_login = $('#submit_login');
const access_api = {
    username : 'KALKULATORHKI',
    password : 'f0rmyAcc3ss'
};

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
        el.addClass('input_warning')
        return true;
    }else{
        el.addClass('input_normal');
        return false;
    }
}

const money = {
    init : function(str){
        str = str.toString();
        if(str.includes('.')){
            return this.formatdec(str);
        }else{
            return  this.format(str);
        }
    },
    format : function(str){
        if(str == undefined || str == null  || str == ''){
            return 0;
        }else{
            str = str.toString();
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
        }   
    },
    formatdec : function(str){
        if(str !== undefined){
            str.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            return str;
        }
    },
    reverse : function(str){
        if(str == undefined || str == null  || str == ''){
            return 0;
        }else{
            let rupiah = str;
            let clean = rupiah.replace(/\D/g, '');
            return clean
        }
    }
}


const dates = {
    today : function(){
        let d_names = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        let m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    }
}