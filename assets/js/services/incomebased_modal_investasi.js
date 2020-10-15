$(function(){
    //method ini harus dipanggil dalam rangka menjaga persistensi
    display_investasi();
});

const _inv_qty = $('#inv_qty');
_inv_qty.on('keyup', function(){
    let result = money.format(_inv_qty.val());
    _inv_qty.val(result);
});
const _inv_unit_rp = $('#inv_unit_rp');
_inv_unit_rp.on('keyup', function(){
    let result = money.format(_inv_unit_rp.val());
    _inv_unit_rp.val(result);
});
const _inv_total_rp = $('#inv_total_rp');
_inv_total_rp.on('keyup', function(){
    let result = money.format(_inv_total_rp.val());
    _inv_total_rp.val(result);
});
const _inv_depresiasi = $('#inv_depresiasi');
_inv_depresiasi.on('keyup', function(){
    let result = money.format(_inv_depresiasi.val());
    _inv_depresiasi.val(result);
});

_inv_qty.on('change', function(){
    let total_harga = money.reverse(_inv_qty.val()) * money.reverse(_inv_unit_rp.val());
    let result = money.format(String(total_harga));
    _inv_total_rp.val(result);
});

_inv_unit_rp.on('change', function(){
    let total_harga = money.reverse(_inv_qty.val()) * money.reverse(_inv_unit_rp.val());
    let result = money.format(String(total_harga));
    _inv_total_rp.val(result);
});

    //untuk LOOKUP tabel Discount Factor
    $(".pencarian").focusin(function() {
        $("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
    });
    // function in berfungsi untuk memindahkan data kolom yang di klik menuju text box
    function masuk(txt, data) {
        document.getElementById('discount_factor').value = data; // ini berfungsi mengisi value  yang ber id textbox
        $("#myModal").modal('hide'); // ini berfungsi untuk menyembunyikan modal
    }
    
    //untuk LOOKUP modal form biaya_investasi
    $("#biaya_investasi").focusin(function() {
        $("#modalInvestasi").modal('show'); // ini fungsi untuk menampilkan modal
    });
    
    let model_investasi = {
        obj_investasi : {
            data : []
        }
    };  

    function requery_investasi(){
        //jika objek terisi, ambil datanya kemudian tempatkan di sessionStorage
        if (model_investasi.obj_investasi.data.length>0){
            sessionStorage.setItem("arr_obj_investasi",JSON.stringify(model_investasi.obj_investasi.data));
        }else{
            // sessionStorage.setItem("arr_obj_investasi",JSON.stringify("[]"));
        }
        //jika sessionStorage terisi, ambil datanya kemudian tempatkan di objek
        let check_sess_storage = sessionStorage.hasOwnProperty('arr_obj_investasi');
        if(check_sess_storage){
            let arr_obj_investasi = JSON.parse(sessionStorage.getItem('arr_obj_investasi'));
            model_investasi.obj_investasi.data=[];
            if(arr_obj_investasi.length > 0){
                for(let i=0; i < arr_obj_investasi.length; i++){
                    item_investasi = {
                        obj_inv_komponen : '' + arr_obj_investasi[i].obj_inv_komponen,
                        obj_inv_qty : '' + arr_obj_investasi[i].obj_inv_qty,
                        obj_inv_unit : '' + arr_obj_investasi[i].obj_inv_unit,
                        obj_inv_unit_rp : '' + arr_obj_investasi[i].obj_inv_unit_rp,
                        obj_inv_total_rp : '' + arr_obj_investasi[i].obj_inv_total_rp,
                        obj_inv_depresiasi : '' + arr_obj_investasi[i].obj_inv_depresiasi
                    };
                    model_investasi.obj_investasi.data.push(item_investasi);                    
                }
                // alert(model_investasi.obj_investasi.data);
            }else{
                // model_investasi.obj_investasi.data=[];
            }
        }else{
            // model_investasi.obj_investasi.data=[];
        }        
    }
    
    function add_investasi(){
        item_investasi = {
               obj_inv_komponen : '' + document.getElementById("inv_komponen").value,
               obj_inv_qty : '' + document.getElementById("inv_qty").value,
               obj_inv_unit : '' + document.getElementById("inv_unit").value,
               obj_inv_unit_rp : '' + document.getElementById("inv_unit_rp").value,
               obj_inv_total_rp : '' + money.reverse(document.getElementById("inv_total_rp").value),
               obj_inv_depresiasi : '' + document.getElementById("inv_depresiasi").value
           };
        model_investasi.obj_investasi.data.push(item_investasi);
        sessionStorage.setItem("arr_obj_investasi",JSON.stringify(model_investasi.obj_investasi.data));        
    }

    function display_investasi(){
        requery_investasi();
        let check_sess_storage = sessionStorage.hasOwnProperty('arr_obj_investasi');
         if(check_sess_storage){
             let arr_obj_investasi = JSON.parse(sessionStorage.getItem('arr_obj_investasi'));
             if(arr_obj_investasi.length > 0){
                 $('#dataku').empty();	        	
                 let v_total = 0;
                 let v_depresiasi = 0;
                 for(let i=0; i < arr_obj_investasi.length; i++){
                    v_total = v_total + Number(arr_obj_investasi[i].obj_inv_total_rp);
                    //hanya yang bernilai tidak sama dengan 0 (nol) saja yang dihitung
                    if(Number(arr_obj_investasi[i].obj_inv_depresiasi)!=0){
                        v_depresiasi = v_depresiasi + (Number(arr_obj_investasi[i].obj_inv_total_rp)/Number(arr_obj_investasi[i].obj_inv_depresiasi));
                    }
                    let adapter = 
                     `<tr>
                         <td>`+(i+1)+`.</td>
                         <td>`+arr_obj_investasi[i].obj_inv_komponen+`</td>
                         <td>`+arr_obj_investasi[i].obj_inv_qty+`</td>
                         <td>`+arr_obj_investasi[i].obj_inv_unit+`</td>
                         <td>`+arr_obj_investasi[i].obj_inv_unit_rp+`</td>
                         <td>`+money.format(String(arr_obj_investasi[i].obj_inv_total_rp))+`</td>
                         <td>`+arr_obj_investasi[i].obj_inv_depresiasi+`</td>
                         <td><input type="button" id="hapus" class="btn btn-sm btn-outline-danger btn-block" onClick="hapusItem(this,'`+ arr_obj_investasi[i].obj_inv_komponen +`')" href="javascript:void(0)" value="&#215;"></input></td>
                     </tr>`;
                     $('#dataku').append(adapter);
                     $('#total').empty();
                     $('#total').append(money.format(String(v_total)));      
                     document.getElementById('biaya_investasi').value = money.format(String(v_total));
                     document.getElementById('biaya_depresiasi').value = money.format(String(v_depresiasi));                  
                 }
             }else{
                 $('#dataku').empty();
                 $('#total').empty();
                 document.getElementById('biaya_investasi').value = 0.00;
             }	        	    
         }
         
    }

    function hapusItem(txt, data) {
        let indeks = model_investasi.obj_investasi.data.findIndex( o => o.obj_inv_komponen === data);
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
                model_investasi.obj_investasi.data.splice(indeks, 1);
                sessionStorage.setItem("arr_obj_investasi",JSON.stringify(model_investasi.obj_investasi.data));
                display_investasi();
              Swal.fire(
                'Terhapus!',
                'Item Data Telah Dihapus.',
                'success'
              )
            }
        })        
    }

    //Ketika tombol Item Investasi Di-Klik
    const tombol_inv_ok = $('#inv_ok');
    tombol_inv_ok.on('click', function(){
        //validasi form supaya terisi
        $('#inv_komponen').attr('required', true);
        $('#inv_qty').attr('required', true);
        $('#inv_unit').attr('required', true);
        $('#inv_unit_rp').attr('required', true);
        $('#inv_total_rp').attr('required', true);
        $('#inv_depresiasi').attr('required', true);

        //validasi cek isi
        const _inv_komponen = $('#inv_komponen');
        const _inv_qty = $('#inv_qty');
        const _inv_unit = $('#inv_unit');
        const _inv_unit_rp = $('#inv_unit_rp');
        const _inv_total_rp = $('#inv_total_rp');
        const _inv_depresiasi = $('#inv_depresiasi');

        //cek komponen terisi
        let v_inv_komponen = checkEmpty(_inv_komponen);
        let v_inv_qty = checkEmpty(_inv_qty);
        let v_inv_unit = checkEmpty(_inv_unit);
        let v_inv_unit_rp = checkEmpty(_inv_unit_rp);
        let v_inv_total_rp = checkEmpty(_inv_total_rp);
        let v_inv_depresiasi = checkEmpty(_inv_depresiasi);
        
        //menangkap variabel yang diinput
        let nilai_inv_komponen= $('#inv_komponen').val();
        let nilai_inv_qty= $('#inv_qty').val();
        let nilai_inv_unit= $('#inv_unit').val();
        let nilai_inv_unit_rp= $('#inv_unit_rp').val();
        let nilai_inv_total_rp= $('#inv_total_rp').val();
        let nilai_inv_depresiasi= $('#inv_depresiasi').val();

        //selection formula
        if(!v_inv_komponen && !v_inv_qty && !v_inv_unit && !v_inv_unit_rp && !v_inv_total_rp && !v_inv_depresiasi){
            add_investasi();
            display_investasi();
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
                title: 'Periksa Input Biaya Komponen Investasi'
            })
        }
    })