/**
 * Created by tgdflto1 on 07/01/17.
 */
function updateUser(){
    let id = $('#id').val();
    let data = {};
    $(':input').each(function(index, element){
        data[element.name] = element.value;
    });
    let callback= function(type, msg){
        if(type == "success"){
            window.location.replace(`/user`);
        }else if(type == "error"){
            console.log("fuck");
            console.log(msg);
        }
    };
    update(`/user/${id}`, data, callback);
}

function deleteUser(id){
    let callback = function(type, msg){
        if(type == "success"){
            //window.location.replace(`/user`);
        }else if(type == "error"){
            console.log("fuck");
            console.log(msg);
        }
    };
    destroy(`/user/${id}`, callback);
}