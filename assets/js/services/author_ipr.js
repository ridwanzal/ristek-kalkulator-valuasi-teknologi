$(function () {
    get_ipr();
});


function get_ipr(){
    let check_sess_storage = sessionStorage.hasOwnProperty('get_ipr');
    if(check_sess_storage){   
        let get_ipr = JSON.parse(sessionStorage.getItem('get_ipr'));
        for(let i=0; i < get_ipr.length; i++){
            console.log(get_ipr);
            let adapter = `<ul class="list-group list-group-flush">
                                <li class="list-group-item pub_item">
                                    <div class="pub_title">`+get_ipr[i].title+`</div>
                                    <div class="pub_item_journal">`+get_ipr[i].inventor+`&nbsp|&nbsp Tahun Permohonan : `+get_ipr[i].tahun_permohonan+`</div>
                                    <div style="float:right;">
                                    </div>
                                </li></li>
                            </ul>`;
            $('.container_ipr').append(adapter);
        }
        loader.hide();
    }else{
        /**
         * @sinta_id  userdetails.sinta_id //userdetails diambil dari localstorage
        */
        let api_endpoint = base_url_api + '/author/detail/ipr/' + userdetails.sinta_id;
        $.ajax({
            url : api_endpoint,
            type : 'GET',
            cache : true,
            success : function(res){
                console.log(res);
                let results = res.author.hki.results;
                
                if(results.length > 0){
                    sessionStorage.setItem('get_ipr', JSON.stringify(results));
                    for(let i=0; i < results.length; i++){
                        console.log(results);
                        let adapter = `<ul class="list-group list-group-flush">
                                            <li class="list-group-item pub_item">
                                                <div class="pub_title">`+results[i].title+`</div>
                                                <div class="pub_item_journal">`+results[i].inventor+`&nbsp|&nbsp`+results[i].year+`</div>
                                                <div style="float:right;">
                                                </div>
                                            </li></li>
                                        </ul>`;
                        $('.container_ipr').append(adapter);
                    }
                    loader.hide();
                }else{
                    let adapter = `<div class="alert alert-secondary" role="alert">
                                        Data Tidak Ditemukan
                                   </div>`;
                    $('.container_ipr').append(adapter);
                }
            }
        })
    }
}
