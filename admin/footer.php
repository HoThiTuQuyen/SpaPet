<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- SweetAlert2 -->
<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.js"></script>

<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- Page specific script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Thêm thư viện Select2 CSS -->

<!-- Thêm thư viện jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<!-- Thêm thư viện Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>




<script>
$(document).ready(function() {
    // Handle the click event of "Xem chi tiết" button
    $('.view-details-btn').on('click', function() {
        var madh = $(this).data('madh');

        // Make an AJAX request to fetch the order details
        $.ajax({
            type: 'POST',
            url: 'qiyshop/get_order_details.php',
            data: {
                madh: madh
            },
            success: function(response) {
                $('#orderDetailsContent').html(response);
            }
        });
    });
});
$(function() {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
})
</script>
</script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
$(function() {
    $("#summaryTable").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#summaryTable_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
//xem chi tiết dữ liệu - account
$('.view-data').click(function() {
    var password = $(this).attr('data-password');
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    var level = $(this).attr('data-level');
    var username = $(this).attr('data-username');
    document.getElementById('password').innerHTML = password;
    document.getElementById('id').innerHTML = id;
    document.getElementById('name').innerHTML = name;
    document.getElementById('username').innerHTML = username;
    document.getElementById('level').innerHTML = level;

    // console.log(password)
});

//xem chi tiết dữ liệu - khách hàng
$('.view-data-kh').click(function() {
    var makh = $(this).attr('data-makh');

    var tenkh = $(this).attr('data-tenkh');
    var email = $(this).attr('data-email');
    var matkhau = $(this).attr('data-matkhau');
    var sdt = $(this).attr('data-sdt');
    var diachi = $(this).attr('data-diachi');
    document.getElementById('makh').innerHTML = makh;

    document.getElementById('tenkh').innerHTML = tenkh;
    document.getElementById('email').innerHTML = email;
    document.getElementById('matkhau').innerHTML = matkhau;
    document.getElementById('sdt').innerHTML = sdt;
    document.getElementById('diachi').innerHTML = diachi;
    // console.log(password)
});

//xem chi tiết danh mục
$('.view-data-dm').click(function() {

    var madm = $(this).attr('data-madm');
    var tendm = $(this).attr('data-tendm');
    var motadm = $(this).attr('data-motadm');
    // var username = $(this).attr('data-username');
    // document.getElementById('password').innerHTML = password;
    document.getElementById('madm').innerHTML = madm;
    document.getElementById('tendm').innerHTML = tendm;
    document.getElementById('motadm').innerHTML = motadm;
    // document.getElementById('level').innerHTML = level;

    // console.log(password)
});
$('.view-data-dmchinh').click(function() {

    var madmchinh = $(this).attr('data-madmchinh');
    var tendmchinh = $(this).attr('data-tendmchinh');
    var motadmchinh = $(this).attr('data-motadmchinh');
    var madm = $(this).attr('data-madm');
    // var username = $(this).attr('data-username');
    // document.getElementById('password').innerHTML = password;
    document.getElementById('madmchinh').innerHTML = madmchinh;
    document.getElementById('tendmchinh').innerHTML = tendmchinh;
    document.getElementById('motadmchinh').innerHTML = motadmchinh;
    document.getElementById('madm').innerHTML = madm;
    // document.getElementById('level').innerHTML = level;

    // console.log(password)
});
$('.view-data-dmphu').click(function() {

    var madmphu = $(this).attr('data-madmphu');
    var tendmphu = $(this).attr('data-tendmphu');
    var madmchinh = $(this).attr('data-madmchinh');
    var motadmphu = $(this).attr('data-motadmphu');
    // var username = $(this).attr('data-username');
    // document.getElementById('password').innerHTML = password;
    document.getElementById('madmphu').innerHTML = madmphu;
    document.getElementById('tendmphu').innerHTML = tendmphu;
    document.getElementById('madmchinh').innerHTML = madmchinh;
    document.getElementById('motadmphu').innerHTML = motadmphu;
    // document.getElementById('level').innerHTML = level;

    // console.log(password)
});

//xem chi tiết thuong hiệu
$('.view-data-th').click(function() {

    var math = $(this).attr('data-math');
    var tenth = $(this).attr('data-tenth');
    var image_th = $(this).attr('data-image_th');
    var motath = $(this).attr('data-motath');

    document.getElementById('math').innerHTML = math;
    document.getElementById('tenth').innerHTML = tenth;
    document.getElementById('image_th').innerHTML = image_th;
    document.getElementById('motath').innerHTML = motath;

});
//xem chi tiết nhà cung cấp
$('.view-data-ncc').click(function() {

    var mancc = $(this).attr('data-mancc');
    var tenncc = $(this).attr('data-tenncc');
    var diachi = $(this).attr('data-diachi');
    var sdt = $(this).attr('data-sdt');
    // var username = $(this).attr('data-username');
    // document.getElementById('password').innerHTML = password;
    document.getElementById('mancc').innerHTML = mancc;
    document.getElementById('tenncc').innerHTML = tenncc;
    document.getElementById('diachi').innerHTML = diachi;
    document.getElementById('sdt').innerHTML = sdt;
    // document.getElementById('level').innerHTML = level;

    // console.log(password)
});

//xem chi tiết san pham
$('.view-data-sp').click(function() {

    var masp = $(this).attr('data-masp');
    var tensp = $(this).attr('data-tensp');
    var anhsp = $(this).attr('data-anhsp');
    var math = $(this).attr('data-math');
    var madmphu = $(this).attr('data-madmphu');
    var phanloai = $(this).attr('data-phanloai');
    var giaban = $(this).attr('data-giaban');
    var motasp = $(this).attr('data-motasp');
    // var username = $(this).attr('data-username');
    // document.getElementById('password').innerHTML = password;
    document.getElementById('masp').innerHTML = masp;
    document.getElementById('tensp').innerHTML = tensp;
    document.getElementById('anhsp').innerHTML = anhsp;
    document.getElementById('math').innerHTML = math;
    document.getElementById('madmphu').innerHTML = madmphu;
    document.getElementById('phanloai').innerHTML = phanloai;
    document.getElementById('giaban').innerHTML = giaban;
    document.getElementById('motasp').innerHTML = motasp;
    // document.getElementById('level').innerHTML = level;

    // console.log(password)
});

$(document).ready(function() {
    setInterval(function() {
        $('#report-mhs').load("banner.php");
    }, 5000);
})


$(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function() {

            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            })

        })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                    'background-color'),
                borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                    'background-color'),
                textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            };
        }
    });

    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //Random default events
        events: [{
                title: 'All Day Event',
                start: new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor: '#f56954', //red
                allDay: true
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor: '#f39c12' //yellow
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: '#0073b7', //Blue
                borderColor: '#0073b7' //Blue
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor: '#00c0ef' //Info (aqua)
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor: '#00a65a' //Success (green)
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'https://www.google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor: '#3c8dbc' //Primary (light-blue)
            }
        ],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
            'background-color': currColor,
            'border-color': currColor
        })
    })
    $('#add-new-event').click(function(e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
            return
        }

        // Create events
        var event = $('<div />')
        event.css({
            'background-color': currColor,
            'border-color': currColor,
            'color': '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
    })
});
</script>