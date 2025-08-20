function updatetimetbl() {
    // Collect all selected subjects
    let timetableData = [];
    
    // Loop through each row and cell to get the selected subject values
    $('table select').each(function() {
        const day = $(this).closest('td').index(); // Day of the week (1 for Monday, 7 for Sunday)
        const time = $(this).closest('tr').index(); // Time slot index
        const subjectCode = $(this).val(); // Selected subject code

        timetableData.push({ day: day, time: time, subjectCode: subjectCode });
    });

    // Send data to the backend PHP script using AJAX
    $.ajax({
        url: 'timetabledb.php',
        type: 'POST',
        data: { timetable: timetableData },
        success: function(response) {
            alert('Timetable updated successfully!');
        },
        error: function() {
            alert('Error updating timetable. Please try again.');
        }
    });
}
