$(function(){
    //method ini harus dipanggil dalam rangka menjaga persistensi
    display_cogs();
});

//definisi objek model
let model_cogs = {
    obj_cogs : {
        data : []
    }
};

//untuk LOOKUP modal form biaya_cogs
$("#biaya_cogs").focusin(function() {
    $("#modalCOGS").modal('show'); // ini fungsi untuk menampilkan modal
});

const _cogs_qty = $('#cogs_qty');
_cogs_qty.on('keyup', function(){
    let result = money.format(_cogs_qty.val());
    _cogs_qty.val(result);
});
const _cogs_unit_rp = $('#cogs_unit_rp');
_cogs_unit_rp.on('keyup', function(){
    let result = money.format(_cogs_unit_rp.val());
    _cogs_unit_rp.val(result);
});
const _cogs_total_rp = $('#cogs_total_rp');
_cogs_total_rp.on('keyup', function(){
    let result = money.format(_cogs_total_rp.val());
    _cogs_total_rp.val(result);
});

_cogs_qty.on('change', function(){
    let total_harga = money.reverse(_cogs_qty.val()) * money.reverse(_cogs_unit_rp.val());
    let result = money.format(String(total_harga));
    _cogs_total_rp.val(result);
});

_cogs_unit_rp.on('change', function(){
    let total_harga = money.reverse(_cogs_qty.val()) * money.reverse(_cogs_unit_rp.val());
    let result = money.format(String(total_harga));
    _cogs_total_rp.val(result);
});

function add_cogs(){
    item_cogs = {
           obj_cogs_komponen : '' + document.getElementById("cogs_komponen").value,
           obj_cogs_qty : '' + document.getElementById("cogs_qty").value,
           obj_cogs_unit : '' + document.getElementById("cogs_unit").value,
           obj_cogs_unit_rp : '' + document.getElementById("cogs_unit_rp").value,
           obj_cogs_total_rp : '' + money.reverse(document.getElementById("cogs_total_rp").value),
           obj_cogs_remark : '' + document.getElementById("cogs_remark").value
       };
    model_cogs.obj_cogs.data.push(item_cogs);
    sessionStorage.setItem("arr_obj_cogs",JSON.stringify(model_cogs.obj_cogs.data));        
}

function display_cogs(){
    requery_cogs();
    let check_sess_storage = sessionStorage.hasOwnProperty('arr_obj_cogs');
     if(check_sess_storage){
         let arr_obj_cogs = JSON.parse(sessionStorage.getItem('arr_obj_cogs'));
         if(arr_obj_cogs.length > 0){
             $('#data_cogs').empty();	        	
             let v_total = 0;
             for(let i=0; i < arr_obj_cogs.length; i++){
                v_total = v_total + Number(arr_obj_cogs[i].obj_cogs_total_rp);
                let adapter = 
                 `<tr>
                     <td>`+(i+1)+`.</td>
                     <td>`+arr_obj_cogs[i].obj_cogs_komponen+`</td>
                     <td>`+arr_obj_cogs[i].obj_cogs_qty+`</td>
                     <td>`+arr_obj_cogs[i].obj_cogs_unit+`</td>
                     <td>`+arr_obj_cogs[i].obj_cogs_unit_rp+`</td>
                     <td>`+money.format(String(arr_obj_cogs[i].obj_cogs_total_rp))+`</td>
                     <td>`+arr_obj_cogs[i].obj_cogs_remark+`</td>
                     <td><input type="button" id="hapus_cogs" class="btn btn-sm btn-outline-danger btn-block" onClick="hapusCOGS(this,'`+ arr_obj_cogs[i].obj_cogs_komponen +`')" href="javascript:void(0)" value="&#215;"></input></td>
                 </tr>`;
                 $('#data_cogs').append(adapter);
                 $('#total_cogs').empty();
                 $('#total_cogs').append(money.format(String(v_total)));      
                 document.getElementById('biaya_cogs').value = money.format(String(v_total));
                 //tambahan untuk modal harga_jual
                 document.getElementById('harga_cogs').value = money.format(String(v_total));
             }
         }else{
             $('#data_cogs').empty();
             $('#total_cogs').empty();
             document.getElementById('biaya_cogs').value = 0.00;
             //tambahan untuk modal harga_jual
             document.getElementById('harga_cogs').value = 0.00;
         }	        	    
     }
     
}

function requery_cogs(){
    //jika objek terisi, ambil datanya kemudian tempatkan di sessionStorage
    if (model_cogs.obj_cogs.data.length>0){
        sessionStorage.setItem("arr_obj_cogs",JSON.stringify(model_cogs.obj_cogs.data));
    }else{
        // sessionStorage.setItem("arr_obj_cogs",JSON.stringify("[]"));
    }
    //jika sessionStorage terisi, ambil datanya kemudian tempatkan di objek
    let check_sess_storage = sessionStorage.hasOwnProperty('arr_obj_cogs');
    if(check_sess_storage){
        let arr_obj_cogs = JSON.parse(sessionStorage.getItem('arr_obj_cogs'));
        model_cogs.obj_cogs.data=[];
        if(arr_obj_cogs.length > 0){
            for(let i=0; i < arr_obj_cogs.length; i++){
                item_cogs = {
                    obj_cogs_komponen : '' + arr_obj_cogs[i].obj_cogs_komponen,
                    obj_cogs_qty : '' + arr_obj_cogs[i].obj_cogs_qty,
                    obj_cogs_unit : '' + arr_obj_cogs[i].obj_cogs_unit,
                    obj_cogs_unit_rp : '' + arr_obj_cogs[i].obj_cogs_unit_rp,
                    obj_cogs_total_rp : '' + arr_obj_cogs[i].obj_cogs_total_rp,
                    obj_cogs_remark : '' + arr_obj_cogs[i].obj_cogs_remark
                };
                model_cogs.obj_cogs.data.push(item_cogs);                    
            }
            // alert(model_cogs.obj_cogs.data);
        }else{
            // model_cogs.obj_cogs.data=[];
        }
    }else{
        // model_cogs.obj_cogs.data=[];
    }        
}

function hapusCOGS(txt, data) {
    let indeks = model_cogs.obj_cogs.data.findIndex( o => o.obj_cogs_komponen === data);
    //konfirmasi penghapusan data
    Swal.fire({
        title: 'Hapus Item?',
        text: data + ", Item Data Terpilih Akan Dihapus...",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            model_cogs.obj_cogs.data.splice(indeks, 1);
            sessionStorage.setItem("arr_obj_cogs",JSON.stringify(model_cogs.obj_cogs.data));
            display_cogs();
          Swal.fire(
            'Terhapus!',
            'Item Data Telah Dihapus.',
            'success'
          )
        }
    })        
}

//Ketika tombol Item cogs Di-Klik
const tombol_cogs_ok = $('#cogs_ok');
tombol_cogs_ok.on('click', function(){
    //validasi form supaya terisi
    $('#cogs_komponen').attr('required', true);
    $('#cogs_qty').attr('required', true);
    $('#cogs_unit').attr('required', true);
    $('#cogs_unit_rp').attr('required', true);
    $('#cogs_total_rp').attr('required', true);
    $('#cogs_remark').attr('required', true);

    //validasi cek isi
    const _cogs_komponen = $('#cogs_komponen');
    const _cogs_qty = $('#cogs_qty');
    const _cogs_unit = $('#cogs_unit');
    const _cogs_unit_rp = $('#cogs_unit_rp');
    const _cogs_total_rp = $('#cogs_total_rp');
    const _cogs_remark = $('#cogs_remark');

    //cek komponen terisi
    let v_cogs_komponen = checkEmpty(_cogs_komponen);
    let v_cogs_qty = checkEmpty(_cogs_qty);
    let v_cogs_unit = checkEmpty(_cogs_unit);
    let v_cogs_unit_rp = checkEmpty(_cogs_unit_rp);
    let v_cogs_total_rp = checkEmpty(_cogs_total_rp);
    let v_cogs_remark = checkEmpty(_cogs_remark);
    
    //menangkap variabel yang diinput
    let nilai_cogs_komponen= $('#cogs_komponen').val();
    let nilai_cogs_qty= $('#cogs_qty').val();
    let nilai_cogs_unit= $('#cogs_unit').val();
    let nilai_cogs_unit_rp= $('#cogs_unit_rp').val();
    let nilai_cogs_total_rp= $('#cogs_total_rp').val();
    let nilai_cogs_remark= $('#cogs_remark').val();

    //selection formula
    if(!v_cogs_komponen && !v_cogs_qty && !v_cogs_unit && !v_cogs_unit_rp && !v_cogs_total_rp && !v_cogs_remark){
        add_cogs();
        display_cogs();
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
            title: 'Periksa Input Biaya COGS'
        })
    }
})