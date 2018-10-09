@extends('layouts.admin')

@section('title', ' | Appointment ')

@section('content')

<div class="content-wrapper" id="appointment">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Appointments
            <small>Appointments Details</small>
        </h1>   
    </section>


     <!-- Main content -->
     <appointment></appointment>
    

    

</div>


@section('FooterSection')
	<script type="text/javascript">
		
		//Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          $('#sdate').data(start.format('YYYY-MM-DD'));
          $('#edate').data(end.format('YYYY-MM-DD'));
        }
    );


	</script>
@endsection


@endsection    