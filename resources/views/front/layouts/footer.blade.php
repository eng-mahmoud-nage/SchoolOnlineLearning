 <!-- BEGIN VENDOR JS-->
 <script src="{{url('/')}}/admin/app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
 <!-- BEGIN VENDOR JS-->
 <!-- BEGIN PAGE VENDOR JS-->
<script src="{{url('/')}}/admin/app-assets/vendors/js/jquery.steps.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/app-assets/vendors/js/pickadate/picker.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/app-assets/vendors/js/pickadate/picker.date.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/app-assets/vendors/js/pickadate/picker.time.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/app-assets/vendors/js/pickadate/legacy.js" type="text/javascript"></script>
<script src="{{url('/')}}/admin/app-assets/vendors/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{url('/')}}/admin/app-assets/js/wizard-steps.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

 <!-- BEGIN PAGE VENDOR JS-->
 <script src="{{url('/')}}/admin/app-assets/vendors/js/chartist.min.js" type="text/javascript"></script>
 <!-- END PAGE VENDOR JS-->
 <!-- BEGIN APEX JS-->
 <script src="{{url('/')}}/admin/app-assets/js/app-sidebar.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/js/notification-sidebar.js" type="text/javascript"></script>
 <script src="{{url('/')}}/admin/app-assets/js/customizer.js" type="text/javascript"></script>
 <!-- END APEX JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 <script src="{{url('/')}}/admin/app-assets/js/dashboard1.js" type="text/javascript"></script>

 
 {{-- <script type="text/javascript" src="{{url('/')}}/awselect/js/awselect.js"></script> --}}

 {{-- <script>
    $(document).ready(function(){ 
 $('select').awselect() 
});

function awalert(){
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
        };
</script> --}}


{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('../vendor/yajra/laravel-datatables-buttons/src/resources/assets/buttons.server-side.js') }}"></script>
@stack('scripts')
 <!-- Start Our scripts-->

 <!-- END PAGE LEVEL JS-->
</body>
<!-- END : Body-->

<!-- Mirrored from pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-5/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 22 Oct 2019 20:23:12 GMT -->

</html>