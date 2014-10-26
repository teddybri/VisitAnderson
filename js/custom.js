/*
 * Custom JQuery file
 */

$(function(){
    /* date picker */
    $('#datetimepicker1').datetimepicker({
        language: 'en',
        pick12HourFormat: true
    });
    $('#datetimepicker2').datetimepicker({
        language: 'en',
        pick12HourFormat: true
    });

    /* add row to table */
    $('#add-row').on('click', function(e) { Table.addRow($('#table-name').val()) });
    /* close row */
    $('#close-row').on('click', function(e) { Table.closeRow($('#table-name').val()) });

    /* edit row person table */
    $('.edit-row').on('click', function(e) { Person.editRow($(this).val()) });
    $('.edit-row-tr').on('click', function(e) { Person.editRow($(this).attr('id')) });
})


var Table = {
    addRow: function(tableName) {
        /* clear out any values */
        $('.form-control').val("");

        /* set actionType to add */
        $('#actionType').val('add');

        /* display */
        $('#' + tableName + '-form').show();
    },

    closeRow: function(tableName) {
        /* hide */
        $('#' + tableName + '-form').hide();  
    },
}


var Person = {
    editRow: function(rowId) {
        location.href = "#top";
        /* change value to edit */
        $('#actionType').val('edit');

        /* show form */
        $('#person-form').show();

        /* populate */
        $('#form-fname').val($('#person-fname-' + rowId).text().replace(/\s/g, ''));
        $('#form-lname').val($('#person-lname-' + rowId).text().replace(/\s/g, ''));
        $('#form-email').val($('#person-email-' + rowId).text().replace(/\s/g, ''));
        $('#form-mobile').val($('#person-mobile-' + rowId).text().replace(/\s/g, ''));
        $('#form-home').val($('#person-home-' + rowId).text().replace(/\s/g, ''));
        $('#form-address').val($('#person-address-' + rowId).val());
        $('#form-city').val($('#person-city-' + rowId).val());
        $('#form-state').val($('#person-state-' + rowId).val());
        $('#form-zip').val($('#person-zip-' + rowId).val());
    }
}
