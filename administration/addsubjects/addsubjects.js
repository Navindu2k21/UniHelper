function save(){
    var subcode = document.getElementById('subcode').value;
    var subname = document.getElementById('subname').value;
    var sem = document.getElementById('sem').value;

    if(subcode==''){
        alert('Please enter subject code!');
    } else if(subname==''){
        alert('Please enter subject name!');
    }else{
        //send data to addsubjectsdb.php file
        var url = "addsubjectsdb.php?id=save";
        url += "&subcode=" + subcode;
        url += "&subname=" + subname;
        url += "&sem=" + sem;
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


function update(oldsubcode){
    var sem = document.getElementById('sem').value;
    var subcode = document.getElementById('subcode').value;
    var subname = document.getElementById('subname').value;
    

    //send data to addsubjectsdb.php file
    var url = "addsubjectsdb.php?id=update";
    url += "&subcode=" + subcode;
    url += "&oldsubcode=" + oldsubcode;
    url += "&subname=" + subname;
    url += "&sem=" + sem;
    // alert(url);
    var htmlobj = $.ajax({ url: url, async: false });

    if(htmlobj.responseText == 1){
        alert("Updated Successful");
        location.replace('popuplist.php');
    } else {
        alert("Updating Error!");
    }
}