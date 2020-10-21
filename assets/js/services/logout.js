function logout(){
    Swal.fire({
        // title: 'Are you sure?',
        text: "Anda yakin ingin keluar ?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, saya yakin',
        cancelButtonText : 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
            let check_userdetails = localStorage.getItem('userdetails');
            let check_token = sessionStorage.getItem('token');
            if(check_userdetails != null || check_token != null){
               localStorage.clear();
               sessionStorage.clear();
               window.location.replace(web_url + '/logout');
            }
        }
    })
}