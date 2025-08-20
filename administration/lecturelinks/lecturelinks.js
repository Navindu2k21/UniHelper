function save(){
    var subcode = document.getElementById('subject').options[document.getElementById('subject').value-1].innerHTML.split(' - ')[0];
    // var subname = document.getElementById('subject').options[document.getElementById('subject').value-1].innerHTML.split(' - ')[1];
    var metid = document.getElementById('metid').value;
    var metpass = document.getElementById('metpass').value;
    var metlink = document.getElementById('metlink').value;

    if(metid==''){
        if(metlink==''){
            alert('Some fields are blanks!');
        }
    } else if(metlink==''){
        if(metid=='' || metpass==''){
            alert('Some fields are blanks!');
        }
    }else{
        //send data to addsubjectsdb.php file
        var url = "lecturelinksdb.php?id=save";
        url += "&subcode=" + subcode;
        // url += "&subname=" + subname;
        url += "&metid=" + metid;
        url += "&metpass=" + metpass;
        url += "&metlink=" + metlink;
        // alert(url);
        var htmlobj = $.ajax({ url: url, async: false });

        if(htmlobj.responseText == 1){
            alert("Saved Successful");
            location.replace(location.href);
        } else {
            alert("Saving Error!");
        }

        

    }
}