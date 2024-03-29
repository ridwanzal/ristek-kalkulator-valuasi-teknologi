    $(function(){
    let access_token = null
    
    $('#p_username').attr('required', true);
    $('#p_username').attr('required', true);
    
    loader.hide();
    el_click_login.on('click', function(){
        localStorage.clear();
        sessionStorage.clear();
        el_click_login.prop('disabled', true)
        const _el_uname = $('#p_username');
        const el_pass = $('#p_password');
        
        let check_username_empty = checkEmpty(_el_uname);
        let check_pass_empty = checkEmpty(el_pass);
        if(!check_username_empty && !check_pass_empty){
                loader.show();
                $.ajax({
                    url : base_url_access,
                    type : 'POST',
                    crossDomain: true,   
		    beforeSend: function(request) {
                             request.setRequestHeader("Content-Type", 'application/x-www-form-urlencoded');
                             request.setRequestHeader("Authorization", 'Bearer ' + access_token);
                    },
                    dataType: "json",
                    data : access_api,
                    success : function(res){
                            access_token = res.token;   

                            sessionStorage.setItem('token', access_token);
                            console.log(access_token);

                            /**
                             * hit login services using query string api
                             * @param u (for user)
                             * @param p (for password)
                             * @result json of user information
                             */

                            const url_req = base_url_login + '?' + 'u='+_el_uname.val()+'&p='+el_pass.val()+' ';
                            console.log(url_req)
                            $.ajax({
                                url : url_req,
                                type : 'POST',
                                cache : true,
                                crossDomain : true,
                                beforeSend: function(request) {
                                    request.setRequestHeader("Content-Type", 'application/x-www-form-urlencoded');
                                    request.setRequestHeader("Authorization", 'Bearer ' + access_token);
                                },
                                success : function(res){
                                    console.log(res.message)
                                    if(res.message == 'success'){
                                        localStorage.setItem('userdetails', JSON.stringify(res.author));
                                        let userdetails = res.author;
                                        let session_data = {
                                            'token' : access_token,
                                            'userdetails' : userdetails
                                        }
                                        console.log(session_data)
    
                                        setTimeout(function(){
                                            loader.hide();
                                            $.ajax({
                                                url : web_url + '/process_login',
                                                type : 'POST',
                                                cache : true,
                                                data : session_data,
                                                success : function(res){
                                                    sessionStorage.setItem('index_luaran_paten', 1)
                                                    console.log('apa nih response');
                                                    console.log(res);
                                                    el_click_login.prop('disabled', false)
                                                    /**
                                                     * redirect to manage
                                                     */
                                                    window.location.replace(web_url + '/manage');
                                                }
                                            });
                                        }, 10);
                                    }else{
                                        loader.hide();
                                        el_click_login.prop('disabled', false)
                                        Swal.fire(
                                            'Login gagal',
                                            'Email & Password salah',
                                            'error'
                                        )
                                    }
                                },
                                done : function(res){
                                    console.log(res);
                                    el_click_login.prop('disabled', false)
                                },
                                failed : function(res){
                                    console.log(res)
                                    Swal.fire(
                                        'Login gagal',
                                        'Email & Password salah',
                                        'error'
                                    )
                                    el_click_login.prop('disabled', false)
                                },
                                error: function(res){
                                    console.log(res)
                                    Swal.fire(
                                        'Login gagal',
                                        'Email & Password salah',
                                        'error'
                                    )
                                    el_click_login.prop('disabled', false)
                                }
                            });
                    }
                });
        }else{
            // alert('Please check input field')
            Swal.fire(
                'Login gagal',
                'Email & Password kosong',
                'warning'
              )
            el_click_login.prop('disabled', false)
        }
    })
});


