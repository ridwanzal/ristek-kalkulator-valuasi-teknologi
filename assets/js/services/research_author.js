$(function(){
    get_google();
    get_scopus();
    get_googlescholar_image();
})

function get_googlescholar_image(){
    const img_uri = 'https://scholar.googleusercontent.com/citations?view_op=view_photo&user='+userdetails.google_id+'&citpid=1';
    $('#img_user').attr('src', img_uri);
}

function get_google(){
    let check_sess_storage = sessionStorage.hasOwnProperty('get_google');
    // cache the data to session storage
    if(check_sess_storage){   
        let get_google = JSON.parse(sessionStorage.getItem('get_google'));
        for(let j=0; j < get_google.length; j++){
            let adapter_gsc = `<ul class="list-group list-group-flush">
                                <li class="list-group-item pub_item">
                                    <div class="pub_title">`+get_google[j].title+`</div>
                                    <div class="pub_item_journal">`+get_google[j].jurnal_name+`&nbsp|&nbsp`+get_google[j].year+`</div>
                                </li></li>
                            </ul>`;
            $('.container_gschoolar').append(adapter_gsc);
        }
        loader.hide();
    }else{
        /**
         * @sinta_id  userdetails.sinta_id //userdetails diambil dari localstorage
        */
        let api_endpoint = base_url_api + '/author/detail/google/' + userdetails.sinta_id;
        $.ajax({
            url : api_endpoint,
            type : 'GET',
            success : function(res){
                console.log(res);
                let results = res.author.g_scholar.results;
                sessionStorage.setItem('get_google', JSON.stringify(results));
                for(let i=0; i < results.length; i++){
                    console.log(results);
                    let adapter = `<ul class="list-group list-group-flush">
                                        <li class="list-group-item pub_item">
                                            <div class="pub_title">`+results[i].title+`</div>
                                            <div class="pub_item_journal">`+results[i].jurnal_name+`&nbsp|&nbsp`+results[i].year+`</div>
                                        </li></li>
                                    </ul>`;
                    $('.container_gschoolar').append(adapter);
                }
                loader.hide();
            }
        })
    }
}

function get_scopus(){
    let check_sess_storage = sessionStorage.hasOwnProperty('get_scopus');
    if(check_sess_storage){   
        let get_scopus = JSON.parse(sessionStorage.getItem('get_scopus'));
        for(let j=0; j < get_scopus.length; j++){
            let adapter_scp = `<ul class="list-group list-group-flush">
                                <li class="list-group-item pub_item">
                                    <div class="pub_title">`+get_scopus[j].title+`</div>
                                    <div class="pub_item_journal">`+get_scopus[j].publicationName+`&nbsp;|&nbsp;vol.`+get_scopus[j].volume+`,&nbsp`+get_scopus[j].coverDisplayDate+`</div>
                                </li></li>
                            </ul>`;
            $('.container_scopus').append(adapter_scp);
        }
        loader.hide();
    }else{
        console.log('get scopus data')
         /**
         * @google_id  userdetails.google_id //userdetails diambil dari localstorage
        */
        let api_endpoint = base_url_api + '/author/detail/scopus/' + userdetails.sinta_id;
        $.ajax({
           url : api_endpoint,
           type : 'GET',
           success : function(res){
                console.log(res);
                let results = res.author.scopus.results;
                sessionStorage.setItem('get_scopus', JSON.stringify(results));
                for(let i=0; i < results.length; i++){
                    console.log(results);
                    let adapter = `<ul class="list-group list-group-flush">
                                        <li class="list-group-item pub_item">
                                            <div class="pub_title">`+results[i].title+`</div>
                                            <div class="pub_item_journal">`+results[i].publicationName+`&nbsp;|&nbsp;vol.`+results[i].volume+`,&nbsp`+results[i].coverDisplayDate+`</div>
                                        </li></li>
                                    </ul>`;
                    $('.container_scopus').append(adapter);
                }
                loader.hide();
           }
       })
    }
}

