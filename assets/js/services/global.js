const base_url_access = 'http://api.sinta.ristekdikti.go.id/fusio/public/consumer/login';
const base_url_login = 'http://api.sinta.ristekdikti.go.id/v2/author/login';
const base_url_api = 'http://api.sinta.ristekdikti.go.id/v2';
const web_url = 'http://sikav.ridwanzal.com';
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
