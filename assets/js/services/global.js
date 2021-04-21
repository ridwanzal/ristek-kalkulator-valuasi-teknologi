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

/**
@param el input element to validate
*/
function validate_input(el){
    if(el.val() == ''){
        el.css({
            'border' : '1px solid red'
        });
        return false;
    }else{
        el.css({
            'border' : '1px solid #ced4da'
        });
        return true;
    }
}

function checkEmpty(el){
    if(el.val() == '' || el.val() == null){
        el.addClass('input_warning')
        return true;
    }else{
        el.addClass('input_normal');
        return false;
    }
}

/**
 * 
 * @param {*} param // number / numeric value to return to dec 
 */
function checkDec(el){
    var ex = /^[0-9]+\.?[0-9]*$/;
    if(ex.test(el.value)==false){
      el.value = el.value.substring(0,el.value.length - 1);
    }
}


const money = {
    init : function(str){
        console.log('init');
        if(str == undefined || str == '' || str == null){
            return 0;
        }else{
            console.log('masuk sini')
            str = str.toString();
            if(str.includes('.')){
                console.log('masuk sini dec')
                console.log(this.formatdec(str))
                return this.formatdec(str);
            }else{
                console.log('masuk sini bule')
                console.log(this.format(str))
                return  this.format(str);
            }
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
           str = str.toString();
            let split_result = str.split(".");
            let result = this.format(split_result[0]);
            return result + ',' + split_result[1].slice(0,2);
        }else{
            return '0';
        }
    },
    reverse : function(str){
        str = str.toString();
        if(str == undefined || str == null  || str == ''){
            return 0;
        }else{
              let rupiah = str;
              let clean = rupiah.replace(/\D/g, '');
              return Number(clean)
        }
    }
}


const dates = {
    today : function(){
        let d_names = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        let m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    }
}