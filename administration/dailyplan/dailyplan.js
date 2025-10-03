function save() {

    var date = document.getElementById('date').childNodes[1].value;
    if(date==''){
        alert("Please select a date!");
        return;
    }
    // Check if the date already exists
    if (!chkDateExist()) {
        if(confirm("Data already save for this date.Do you want to overwrite it?")){
            updatePlan();
        }
        return;
    }else{
        savePlan();
    }
}

function savePlan(){
    // Initialize arrays to store each row's data
    var rowNumbers = [];
    var works = [];
    var types = [];

    var date = document.getElementById('date').childNodes[1].value;

    // Collect data from each row
    for (var i = 1; i <= 24; i++) {
        var rowno = i;
        var work = document.getElementById('plantbl').rows[i + 1].cells[1].childNodes[1].value;
        var type = document.getElementById('plantbl').rows[i + 1].cells[2].childNodes[1].value;

        rowNumbers.push(rowno);
        works.push(work);
        types.push(type);
    }

    // Send the data as a POST request
    $.ajax({
        url: "dailyplandb.php?id=save",
        type: "POST",
        data: {
            date: date,
            rowno: rowNumbers,
            work: works,
            type: types
        },
        success: function(response) {
            if (response == "1") {
                alert("Saved Successfully");
                location.replace(location.href);
            } else {
                alert("Saving Error!");
            }
        },
        error: function() {
            alert("An error occurred while saving.");
        }
    });
}


function updatePlan(){

    // Initialize arrays to store each row's data
    var rowNumbers = [];
    var works = [];
    var types = [];

    var date = document.getElementById('date').childNodes[1].value;

    // Collect data from each row
    for (var i = 1; i <= 24; i++) {
        var rowno = i;
        var work = document.getElementById('plantbl').rows[i + 1].cells[1].childNodes[1].value;
        var type = document.getElementById('plantbl').rows[i + 1].cells[2].childNodes[1].value;

        rowNumbers.push(rowno);
        works.push(work);
        types.push(type);
    }

    // Send the data as a POST request
    $.ajax({
        url: "dailyplandb.php?id=update",
        type: "POST",
        data: {
            date: date,
            rowno: rowNumbers,
            work: works,
            type: types
        },
        success: function(response) {
            if (response == "1") {
                alert("Updated Successfully");
                location.replace(location.href);
            } else {
                alert("Updating Error!");
            }
        },
        error: function() {
            alert("An error occurred while updating.");
        }
    });
}


function search() {
    var date = document.getElementById('date').childNodes[1].value;

    var url = 'dailyplanxml.php?request=search&date=' + date;
    var htmlobj = $.ajax({ url: url, async: false });

    var rownoNodes = htmlobj.responseXML.getElementsByTagName("rowno");
    var workNodes = htmlobj.responseXML.getElementsByTagName("work");
    var typeNodes = htmlobj.responseXML.getElementsByTagName("type");

    // Loop through each entry in the XML response
    for (var i = 0; i < rownoNodes.length; i++) {
        var rowno = parseInt(rownoNodes[i].childNodes[0].nodeValue, 10);
        var work = parseInt(workNodes[i].childNodes[0].nodeValue, 10);
        var type = parseInt(typeNodes[i].childNodes[0].nodeValue, 10);

        document.getElementById('plantbl').rows[rowno + 1].cells[1].childNodes[1].selectedIndex = work;
        document.getElementById('plantbl').rows[rowno + 1].cells[2].childNodes[1].selectedIndex = type;
    }    
}

function chkDateExist() {
    var date = document.getElementById('date').childNodes[1].value;
    var url = 'dailyplandb.php?id=chkDateExist&date=' + date;
    var htmlobj = $.ajax({ url: url, async: false });

    if (htmlobj.responseText == "1") {
        // alert("Date already saved. Please click the search button.");
        return false; // Indicate date exists
    } else {
        return true; // Date does not exist, can proceed
    }
}
