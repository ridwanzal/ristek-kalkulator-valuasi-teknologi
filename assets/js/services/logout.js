function logout(){
    let check_userdetails = localStorage.getItem('userdetails');
    let check_token = sessionStorage.getItem('token');
    if(check_userdetails != null || check_token != null){
       localStorage.clear();
       sessionStorage.clear();

        window.location.replace(web_url + '/logout');
    }
}