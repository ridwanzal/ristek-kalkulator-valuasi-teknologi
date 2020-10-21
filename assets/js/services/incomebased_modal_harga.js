$(function(){
    //method ini harus dipanggil dalam rangka menjaga persistensi
    display_harga();
    format_harga_rupiah();
});

//definisi objek model
let model_harga = {
    obj_harga : {
        data : []
    }
};

//untuk LOOKUP modal form harga jual
$("#harga_tahun1").focusin(function() {
    $("#modalHarga").modal('show'); // ini fungsi untuk menampilkan modal
});

function kalkulasi_harga(){
    let market_value = Number(money.reverse(_harga_cogs.val())) + Number(money.reverse(_harga_rf_value.val())) + Number(money.reverse(_harga_mf_value.val())) + Number(money.reverse(_harga_marketing_value.val())) + Number(money.reverse(_harga_profit_value.val()));
    let result = money.format(String(market_value));
    _harga_hargajual.val(result);
}

function format_harga_rupiah(){
    const _harga_cogs = $('#harga_cogs');
    let result = money.format(_harga_cogs.val());
    _harga_cogs.val(result);
}

const _harga_cogs = $('#harga_cogs');
_harga_cogs.on('keyup', function(){
    let result = money.format(_harga_cogs.val());
    _harga_cogs.val(result);
});

//binding elemen
const _harga_rf_persen = $('#harga_rf_persen');
const _harga_rf_value = $('#harga_rf_value');
const _harga_mf_persen = $('#harga_mf_persen');
const _harga_mf_value = $('#harga_mf_value');
const _harga_marketing_persen = $('#harga_marketing_persen');
const _harga_marketing_value = $('#harga_marketing_value');
const _harga_profit_persen = $('#harga_profit_persen');
const _harga_profit_value = $('#harga_profit_value');
const _harga_hargajual = $('#harga_hargajual');

// keyup
_harga_rf_persen.on('keyup', function(){
    let result = money.format(_harga_rf_persen.val());
    _harga_rf_persen.val(result);
});
_harga_mf_persen.on('keyup', function(){
    let result = money.format(_harga_mf_persen.val());
    _harga_mf_persen.val(result);
});
_harga_marketing_persen.on('keyup', function(){
    let result = money.format(_harga_marketing_persen.val());
    _harga_marketing_persen.val(result);
});
_harga_profit_persen.on('keyup', function(){
    let result = money.format(_harga_profit_persen.val());
    _harga_profit_persen.val(result);
});
// change
_harga_rf_persen.on('change', function(){
    let risk_factor = (money.reverse(_harga_rf_persen.val())/100) * money.reverse(_harga_cogs.val());
    let result = money.format(String(risk_factor));
    _harga_rf_value.val(result);
    kalkulasi_harga();
});
_harga_mf_persen.on('change', function(){
    let market_fee = (money.reverse(_harga_mf_persen.val())/100) * money.reverse(_harga_cogs.val());
    let result = money.format(String(market_fee));
    _harga_mf_value.val(result);
    kalkulasi_harga();
});
_harga_marketing_persen.on('change', function(){
    let marketing = (money.reverse(_harga_marketing_persen.val())/100) * money.reverse(_harga_cogs.val());
    let result = money.format(String(marketing));
    _harga_marketing_value.val(result);
    kalkulasi_harga();
});
_harga_profit_persen.on('change', function(){
    let profit = (money.reverse(_harga_profit_persen.val())/100) * money.reverse(_harga_cogs.val());
    let result = money.format(String(profit));
    _harga_profit_value.val(result);
    kalkulasi_harga();
});

function add_harga(){
    item_harga = {
           obj_harga_cogs : '' + document.getElementById("harga_cogs").value,
           obj_harga_rf_persen : '' + money.reverse(document.getElementById("harga_rf_persen").value),
           obj_harga_rf_value : '' + money.reverse(document.getElementById("harga_rf_value").value),
           obj_harga_mf_persen : '' + money.reverse(document.getElementById("harga_mf_persen").value),
           obj_harga_mf_value : '' + money.reverse(document.getElementById("harga_mf_value").value),
           obj_harga_marketing_persen : '' + money.reverse(document.getElementById("harga_marketing_persen").value),
           obj_harga_marketing_value : '' + money.reverse(document.getElementById("harga_marketing_value").value),
           obj_harga_profit_persen : '' + money.reverse(document.getElementById("harga_profit_persen").value),
           obj_harga_profit_value : '' + money.reverse(document.getElementById("harga_profit_value").value),
           obj_harga_hargajual : '' + document.getElementById("harga_hargajual").value
       };
    model_harga.obj_harga.data.push(item_harga);
    sessionStorage.setItem("arr_obj_harga",JSON.stringify(model_harga.obj_harga.data));        
}

function update_harga(){
    item_harga = {
           obj_harga_cogs : '' + document.getElementById("harga_cogs").value,
           obj_harga_rf_persen : '' + money.reverse(document.getElementById("harga_rf_persen").value),
           obj_harga_rf_value : '' + money.reverse(document.getElementById("harga_rf_value").value),
           obj_harga_mf_persen : '' + money.reverse(document.getElementById("harga_mf_persen").value),
           obj_harga_mf_value : '' + money.reverse(document.getElementById("harga_mf_value").value),
           obj_harga_marketing_persen : '' + money.reverse(document.getElementById("harga_marketing_persen").value),
           obj_harga_marketing_value : '' + money.reverse(document.getElementById("harga_marketing_value").value),
           obj_harga_profit_persen : '' + money.reverse(document.getElementById("harga_profit_persen").value),
           obj_harga_profit_value : '' + money.reverse(document.getElementById("harga_profit_value").value),
           obj_harga_hargajual : '' + document.getElementById("harga_hargajual").value
       };
    sessionStorage.setItem("arr_obj_harga",JSON.stringify(model_harga.obj_harga.data));        
}

function display_harga(){
    requery_harga();
    let check_sess_storage = sessionStorage.hasOwnProperty('arr_obj_harga');
     if(check_sess_storage){
         let arr_obj_harga = JSON.parse(sessionStorage.getItem('arr_obj_harga'));
         if(arr_obj_harga.length > 0){
             for(let i=0; i < arr_obj_harga.length; i++){
                v_harga_cogs = arr_obj_harga[i].obj_harga_cogs;
                v_harga_rf_persen = arr_obj_harga[i].obj_harga_rf_persen;
                v_harga_rf_value = arr_obj_harga[i].obj_harga_rf_value;
                v_harga_mf_persen = arr_obj_harga[i].obj_harga_mf_persen;
                v_harga_mf_value = arr_obj_harga[i].obj_harga_mf_value;
                v_harga_marketing_persen = arr_obj_harga[i].obj_harga_marketing_persen;
                v_harga_marketing_value = arr_obj_harga[i].obj_harga_marketing_value;
                v_harga_profit_persen = arr_obj_harga[i].obj_harga_profit_persen;
                v_harga_profit_value = arr_obj_harga[i].obj_harga_profit_value;
                v_harga_hargajual = arr_obj_harga[i].obj_harga_hargajual;
                //display from sessionStorage
                document.getElementById('harga_cogs').value = money.format(String(v_harga_cogs));
                document.getElementById('harga_rf_persen').value = money.format(String(v_harga_rf_persen));
                document.getElementById('harga_rf_value').value = money.format(String(v_harga_rf_value));
                document.getElementById('harga_mf_persen').value = money.format(String(v_harga_mf_persen));
                document.getElementById('harga_mf_value').value = money.format(String(v_harga_mf_value));
                document.getElementById('harga_marketing_persen').value = money.format(String(v_harga_marketing_persen));
                document.getElementById('harga_marketing_value').value = money.format(String(v_harga_marketing_value));
                document.getElementById('harga_profit_persen').value = money.format(String(v_harga_profit_persen));
                document.getElementById('harga_profit_value').value = money.format(String(v_harga_profit_value));
                document.getElementById('harga_hargajual').value = money.format(String(v_harga_hargajual));
                document.getElementById('harga_tahun1').value = money.format(String(v_harga_hargajual));
             }
         }else{
            document.getElementById('harga_cogs').value = 0.00;
            document.getElementById('harga_rf_persen').value = 0.00;
            document.getElementById('harga_rf_value').value = 0.00;
            document.getElementById('harga_mf_persen').value = 0.00;
            document.getElementById('harga_mf_value').value = 0.00;
            document.getElementById('harga_marketing_persen').value = 0.00;
            document.getElementById('harga_marketing_value').value = 0.00;
            document.getElementById('harga_profit_persen').value = 0.00;
            document.getElementById('harga_profit_value').value = 0.00;
            document.getElementById('harga_hargajual').value = 0.00;
            document.getElementById('harga_tahun1').value = 0.00;
         }	        	    
     }
     
}

function requery_harga(){
    //jika objek terisi, ambil datanya kemudian tempatkan di sessionStorage
    if (model_harga.obj_harga.data.length>0){
        sessionStorage.setItem("arr_obj_harga",JSON.stringify(model_harga.obj_harga.data));
    }else{
        // sessionStorage.setItem("arr_obj_harga",JSON.stringify("[]"));
    }
    //jika sessionStorage terisi, ambil datanya kemudian tempatkan di objek
    let check_sess_storage = sessionStorage.hasOwnProperty('arr_obj_harga');
    if(check_sess_storage){
        let arr_obj_harga = JSON.parse(sessionStorage.getItem('arr_obj_harga'));
        model_harga.obj_harga.data=[];
        if(arr_obj_harga.length > 0){
            for(let i=0; i < arr_obj_harga.length; i++){
                item_harga = {
                    obj_harga_cogs : '' + arr_obj_harga[i].obj_obj_harga_cogs,
                    obj_harga_rf_persen : '' + arr_obj_harga[i].obj_harga_rf_persen,
                    obj_harga_rf_value : '' + arr_obj_harga[i].obj_harga_rf_value,
                    obj_harga_mf_persen : '' + arr_obj_harga[i].obj_harga_mf_persen,
                    obj_harga_mf_value : '' + arr_obj_harga[i].obj_harga_mf_value,
                    obj_harga_marketing_persen : '' + arr_obj_harga[i].obj_harga_marketing_persen,
                    obj_harga_marketing_value : '' + arr_obj_harga[i].obj_harga_marketing_value,
                    obj_harga_profit_persen : '' + arr_obj_harga[i].obj_harga_profit_persen,
                    obj_harga_profit_value : '' + arr_obj_harga[i].obj_harga_profit_value,
                    obj_harga_hargajual : '' + arr_obj_harga[i].obj_harga_hargajual
                };
                model_harga.obj_harga.data.push(item_harga);                    
            }
            // alert(model_harga.obj_harga.data);
        }else{
            // model_harga.obj_harga.data=[];
        }
    }else{
        // model_harga.obj_harga.data=[];
    }        
}

//Ketika tombol Item harga Di-Klik
const tombol_btn_harga_jual = $('#btn_harga_jual');
tombol_btn_harga_jual.on('click', function(){
    //validasi form supaya terisi
    $('#harga_cogs').attr('required', true);
    $('#harga_rf_persen').attr('required', true);
    $('#harga_rf_value').attr('required', true);
    $('#harga_mf_persen').attr('required', true);
    $('#harga_mf_value').attr('required', true);
    $('#harga_marketing_persen').attr('required', true);
    $('#harga_marketing_value').attr('required', true);
    $('#harga_profit_persen').attr('required', true);
    $('#harga_profit_value').attr('required', true);
    $('#harga_hargajual').attr('required', true);

    //validasi cek isi
    const _harga_cogs = $('#harga_cogs');
    const _harga_rf_persen = $('#harga_rf_persen');
    const _harga_rf_value = $('#harga_rf_value');
    const _harga_mf_persen = $('#harga_mf_persen');
    const _harga_mf_value = $('#harga_mf_value');
    const _harga_marketing_persen = $('#harga_marketing_persen');
    const _harga_marketing_value = $('#harga_marketing_value');
    const _harga_profit_persen = $('#harga_profit_persen');
    const _harga_profit_value = $('#harga_profit_value');
    const _harga_hargajual = $('#harga_hargajual');


    //cek komponen terisi
    let v_harga_cogs = checkEmpty(_harga_cogs);
    let v_harga_rf_persen = checkEmpty(_harga_rf_persen);
    let v_harga_rf_value = checkEmpty(_harga_rf_value);
    let v_harga_mf_persen = checkEmpty(_harga_mf_persen);
    let v_harga_mf_value = checkEmpty(_harga_mf_value);
    let v_harga_marketing_persen = checkEmpty(_harga_marketing_persen);
    let v_harga_marketing_value = checkEmpty(_harga_marketing_value);
    let v_harga_profit_persen = checkEmpty(_harga_profit_persen);
    let v_harga_profit_value = checkEmpty(_harga_profit_value);
    let v_harga_hargajual = checkEmpty(_harga_hargajual);
    
    //menangkap variabel yang diinput
    let nilai_harga_cogs= $('#harga_cogs').val();
    let nilai_harga_rf_persen= $('#harga_rf_persen').val();
    let nilai_harga_rf_value= $('#harga_rf_value').val();
    let nilai_harga_mf_persen= $('#harga_mf_persen').val();
    let nilai_harga_mf_value= $('#harga_mf_value').val();
    let nilai_harga_marketing_persen= $('#harga_marketing_persen').val();
    let nilai_harga_marketing_value= $('#harga_marketing_value').val();
    let nilai_harga_profit_persen= $('#harga_profit_persen').val();
    let nilai_harga_profit_value= $('#harga_profit_value').val();
    let nilai_harga_hargajual= $('#harga_hargajual').val();

    //selection formula
    if(!v_harga_cogs && !v_harga_rf_persen && !v_harga_rf_value && !v_harga_mf_persen && !v_harga_mf_value && !v_harga_marketing_persen && !v_harga_marketing_value && !v_harga_profit_persen && !v_harga_profit_value && !v_harga_hargajual){
        if (model_harga.obj_harga.data.length>0){
            update_harga();
            display_harga();
        }else{
            add_harga();
            display_harga();
        }    
    }else{
        //alert('Please check input field');
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'error',
            title: 'Periksa Input Penentuan Harga Jual'
        })
    }
})