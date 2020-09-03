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
    console.log('get google scholar data')
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
            for(let i=0; i < results.length; i++){
                console.log(results);
                let adapter = `<ul class="list-group list-group-flush">
                                    <li class="list-group-item pub_item">
                                        <div>`+results[i].title+`</div>
                                        <div class="pub_item_journal">`+results[i].jurnal_name+`</div>
                                    </li></li>
                                </ul>`;
                $('.container_gschoolar').append(adapter);
            }
            loader.hide();
        }
    })
}

function get_scopus(){
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
            for(let i=0; i < results.length; i++){
                console.log(results);
                let adapter = `<ul class="list-group list-group-flush">
                                    <li class="list-group-item pub_item">
                                        <div>`+results[i].title+`</div>
                                        <div class="pub_item_journal">`+results[i].jurnal_name+`</div>
                                    </li></li>
                                </ul>`;
                $('.container_scopus').append(adapter);
            }
            loader.hide();
       }
   })
}

