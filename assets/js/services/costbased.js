const resarchlist = $('#research_list');

$(function () {
    get_daftar_penelitian();
});


function get_daftar_penelitian(){
    let arr_temp_scopus = [];
    let get_scopus = JSON.parse(sessionStorage.getItem('get_scopus'));
    for(let i=0; i < get_scopus.length; i++){
        let obj_temp = {
            'label' : 'Scopus - ' + get_scopus[i].title,
            'value' : '' + get_scopus[i].title
        }
    
        arr_temp_scopus.push(obj_temp);
    }

    let get_google = JSON.parse(sessionStorage.getItem('get_google'));
    for(let i=0; i < get_google.length; i++){
        let obj_temp = {
            'label' : 'Google Scholar - ' + get_google[i].title,
            'value' : '' + get_google[i].title
        }
    
        arr_temp_scopus.push(obj_temp);
    }

    console.log(arr_temp_scopus);
    resarchlist.autocomplete({
        source : arr_temp_scopus
    });
}