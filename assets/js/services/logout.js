function logout(){
    let check_userdetails = localStorage.getItem('userdetails');
    let check_token = sessionStorage.getItem('token');
    if(check_userdetails != null || check_token != null){
        localStorage.removeItem('userdetails');
        sessionStorage.removeItem('token');
        sessionStorage.removeItem('get_google');
        sessionStorage.removeItem('get_scopus')
        window.location.replace(web_url + '/logout');
    }
}