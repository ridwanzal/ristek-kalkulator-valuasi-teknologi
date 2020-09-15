$(function () {
    
});


function get_ipr(){
    let check_sess_storage = sessionStorage.hasOwnProperty('get_ipr');
    if(check_sess_storage){   
        let get_google = JSON.parse(sessionStorage.getItem('get_ipr'));
        for(let j=0; j < get_google.length; j++){
            let adapter_gsc = `<ul class="list-group list-group-flush">
                                <li class="list-group-item pub_item">
                                    <div class="pub_title">`+get_google[j].title+`</div>
                                    <div class="pub_item_journal">`+get_google[j].jurnal_name+`&nbsp|&nbsp`+get_google[j].year+`</div>
                                    <div style="float:right;">
                                        <a href="`+web_url+`/manage/add/costbased">Kalkulasi Cost based</a>&nbsp;&nbsp;
                                        <a href="`+web_url+`/manage/add/incomebased">Kalkulasi Income based</a>
                                    </div>
                                </li></li>
                            </ul>`;
            $('.container_gschoolar').append(adapter_gsc);
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
                let results = res.author.g_scholar.results;
                sessionStorage.setItem('get_google', JSON.stringify(results));
                for(let i=0; i < results.length; i++){
                    console.log(results);
                    let adapter = `<ul class="list-group list-group-flush">
                                        <li class="list-group-item pub_item">
                                            <div class="pub_title">`+results[i].title+`</div>
                                            <div class="pub_item_journal">`+results[i].jurnal_name+`&nbsp|&nbsp`+results[i].year+`</div>
                                            <div style="float:right;">
                                                <a href="`+web_url+`/manage/add/costbased">Kalkulasi Cost based</a>&nbsp;&nbsp;
                                                <a href="`+web_url+`/manage/add/incomebased">Kalkulasi Income based</a>
                                            </div>
                                        </li></li>
                                    </ul>`;
                    $('.container_gschoolar').append(adapter);
                }
                loader.hide();
            }
        })
    }
}
