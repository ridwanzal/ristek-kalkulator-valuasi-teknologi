$(function(){
    //method ini harus dipanggil dalam rangka menjaga persistensi
    display_fcost();
});

//definisi objek model
let model_fcost = {
    obj_fcost : {
        data : []
    }
};

//untuk LOOKUP modal form biaya_tetap
$("#biaya_tetap").focusin(function() {
    $("#modalFCOST").modal('show'); // ini fungsi untuk menampilkan modal
});

const _fcost_rp = $('#fcost_rp');
_fcost_rp.on('keyup', function(){
    let result = money.format(_fcost_rp.val());
    _fcost_rp.val(result);
});

function add_fcost(){
    item_fcost = {
           obj_fcost_item : '' + document.getElementById("fcost_item").value,
           obj_fcost_rp : '' + money.reverse(document.getElementById("fcost_rp").value),
           obj_fcost_keterangan : '' + document.getElementById("fcost_keterangan").value
       };
    model_fcost.obj_fcost.data.push(item_fcost);
    sessionStorage.setItem("arr_obj_fcost",JSON.stringify(model_fcost.obj_fcost.data));        
}

function display_fcost(){
    requery_fcost();
    let check_sess_storage = sessionStorage.hasOwnProperty('arr_obj_fcost');
     if(check_sess_storage){
         let arr_obj_fcost = JSON.parse(sessionStorage.getItem('arr_obj_fcost'));
         if(arr_obj_fcost.length > 0){
             $('#data_fcost').empty();	        	
             let v_total = 0;
             for(let i=0; i < arr_obj_fcost.length; i++){
                v_total = v_total + Number(arr_obj_fcost[i].obj_fcost_rp);
                let adapter = 
                 `<tr>
                     <td>`+(i+1)+`.</td>
                     <td>`+arr_obj_fcost[i].obj_fcost_item+`</td>
                     <td>`+money.format(String(arr_obj_fcost[i].obj_fcost_rp))+`</td>
                     <td>`+arr_obj_fcost[i].obj_fcost_keterangan+`</td>
                     <td><input type="button" id="hapus_fcost" class="btn btn-sm btn-outline-danger btn-block" onClick="hapusFCOST(this,'`+ arr_obj_fcost[i].obj_fcost_item +`')" href="javascript:void(0)" value="&#215;"></input></td>
                 </tr>`;
                 $('#data_fcost').append(adapter);
                 $('#total_fcost').empty();
                 $('#total_fcost').append(money.format(String(v_total)));      
                 document.getElementById('biaya_tetap').value = money.format(String(v_total));
             }
         }else{
             $('#data_fcost').empty();
             $('#total_fcost').empty();
             document.getElementById('biaya_tetap').value = 0.00;
         }	        	    
     }
     
}

function requery_fcost(){
    //jika objek terisi, ambil datanya kemudian tempatkan di sessionStorage
    if (model_fcost.obj_fcost.data.length>0){
        sessionStorage.setItem("arr_obj_fcost",JSON.stringify(model_fcost.obj_fcost.data));
    }else{
        // sessionStorage.setItem("arr_obj_fcost",JSON.stringify("[]"));
    }
    //jika sessionStorage terisi, ambil datanya kemudian tempatkan di objek
    let check_sess_storage = sessionStorage.hasOwnProperty('arr_obj_fcost');
    if(check_sess_storage){
        let arr_obj_fcost = JSON.parse(sessionStorage.getItem('arr_obj_fcost'));
        model_fcost.obj_fcost.data=[];
        if(arr_obj_fcost.length > 0){
            for(let i=0; i < arr_obj_fcost.length; i++){
                item_fcost = {
                    obj_fcost_item : '' + arr_obj_fcost[i].obj_fcost_item,
                    obj_fcost_rp : '' + arr_obj_fcost[i].obj_fcost_rp,
                    obj_fcost_keterangan : '' + arr_obj_fcost[i].obj_fcost_keterangan
                };
                model_fcost.obj_fcost.data.push(item_fcost);                    
            }
            // alert(model_fcost.obj_fcost.data);
        }else{
            // model_fcost.obj_fcost.data=[];
        }
    }else{
        // model_fcost.obj_fcost.data=[];
    }        
}

function hapusFCOST(txt, data) {
    let indeks = model_fcost.obj_fcost.data.findIndex( o => o.obj_fcost_item === data);
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
            model_fcost.obj_fcost.data.splice(indeks, 1);
            sessionStorage.setItem("arr_obj_fcost",JSON.stringify(model_fcost.obj_fcost.data));
            display_fcost();
          Swal.fire(
            'Terhapus!',
            'Item Data Telah Dihapus.',
            'success'
          )
        }
    })        
}

//Ketika tombol Item fcost Di-Klik
const tombol_fcost_ok = $('#fcost_ok');
tombol_fcost_ok.on('click', function(){
    //validasi form supaya terisi
    $('#fcost_item').attr('required', true);
    $('#fcost_rp').attr('required', true);
    $('#fcost_keterangan').attr('required', true);

    //validasi cek isi
    const _fcost_item = $('#fcost_item');
    const _fcost_rp = $('#fcost_rp');
    const _fcost_keterangan = $('#fcost_keterangan');

    //cek komponen terisi
    let v_fcost_item = checkEmpty(_fcost_item);
    let v_fcost_rp = checkEmpty(_fcost_rp);
    let v_fcost_keterangan = checkEmpty(_fcost_keterangan);
    
    //menangkap variabel yang diinput
    let nilai_fcost_item= $('#fcost_item').val();
    let nilai_fcost_rp= $('#fcost_rp').val();
    let nilai_fcost_keterangan= $('#fcost_keterangan').val();

    //selection formula
    if(!v_fcost_item && !v_fcost_rp && !v_fcost_keterangan){
        add_fcost();
        display_fcost();
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
            title: 'Periksa Input Biaya Tetap (Fixed Cost)'
        })
    }
})