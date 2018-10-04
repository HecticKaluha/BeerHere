document.addEventListener('DOMContentLoaded',function() {
    document.querySelector('select[name="schooljaar"]').onchange=changeEventHandler;
},false);

function changeEventHandler(event) {
    if(event.target.value){
        var startYear = event.target.value.split('-');
        console.log(startYear);
        updateDatepicker(startYear)
    }
}

function updateDatepicker(startYear){
    jQuery("#example-daterange1,#example-daterange2").unbind().removeData().datepicker({
        startDate: new Date(startYear[0], 1 - 1, 1),
        daysOfWeekDisabled: [0,6],
        assumeNearbyYear: false,
        autoclose: false,
        beforeShowDay: $.noop,
        beforeShowMonth: $.noop,
        beforeShowYear: $.noop,
        beforeShowDecade: $.noop,
        beforeShowCentury: $.noop,
        calendarWeeks: false,
        clearBtn: false,
        toggleActive: false,
        daysOfWeekHighlighted: [],
        datesDisabled: [],
        endDate: Infinity,
        forceParse: true,
        format: 'dd-mm-yyyy',
        keepEmptyValues: false,
        keyboardNavigation: true,
        language: 'en',
        minViewMode: 0,
        maxViewMode: 4,
        multidate: false,
        multidateSeparator: ',',
        orientation: "auto",
        rtl: false,
        startView: 0,
        todayBtn: false,
        todayHighlight: false,
        updateViewDate: true,
        weekStart: 0,
        disableTouchKeyboard: false,
        enableOnReadonly: true,
        showOnFocus: true,
        zIndexOffset: 10,
        container: 'body',
        immediateUpdates: false,
        title: '',
        templates: {
            leftArrow: '&#x00AB;',
            rightArrow: '&#x00BB;'
        }
    });
}

$('document').ready(function(){
    if(document.getElementById('example2-select2'))
    {
        var startYearInput = document.getElementById('example2-select2').value;
        if(startYearInput != "" && startYearInput != null)
        {
            var startYear = startYearInput.split('-');
            updateDatepicker(startYear);
        }

    }
});


