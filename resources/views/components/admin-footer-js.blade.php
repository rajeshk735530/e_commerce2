<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<!--app JS-->
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://developercodez.com/developerCorner/parsley/parsley.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.min.js" integrity="sha512-Knad2JJvcddGNKm03ySDgeTKXQfBjH0XPrFqUyzM0BuJhKkVfLzoOK5Ii9jsLmbZTXM8YNqn42suHyIEbQXboQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });

    $(document).ready(function(f){
        $('#formSubmit').on('submit', (function(e) {
            if($(this).parsley().Validator()){
                e.preventDefault();
                var formData = new FormData(this);
                var html = '<button class="btn btn-primary" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>';
                var html1 = '<input type="submit" id="submitButton" class="btn btn-primary px-4" />';

                $('#submitButton').html(html);
                $.ajax({
                    type        :'POST',
                    url         :$(this).attr('action'),
                    data        :formData,
                    cache       :false,
                    contentType :false,
                    processData :false,

                    success:function(result){
                        if (result.status == 'Success') {
                            showAlert(result.status, result.message);
                            $('#submitButton').html(html1);
                        }else{
                            showAlert(result.status, result.message);
                            $('#submitButton').html(html1);
                        }
                    },
                    error:function(result){
                        console.log(result);
                    }
                });
            }
        }));
    });

    $(document).ready(() => {
        $('#photo').change(function () {
            const file = this->files[0];
            if(file){
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview").attr("src", event.target.result)
                };
                reader.readAsDataURL(file);
            }
        });
    });

</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>