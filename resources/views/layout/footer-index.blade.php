<script src="{{ asset('assets/js/bundle.js?ver=3.1.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=3.1.0') }}"></script>
<script src="{{ asset('assets/js/charts/gd-default.js?ver=3.1.0') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    function city(number)
    {
        var idProvince = number;
        console.log(idProvince);
        $("#city_id").html('<option value=" " disabled selected>Pilih Salah Satu Kota ...</option>');
        $.ajax({
            url: "{{ route('dashboard.fetchCity') }}",
            type: "POST",
            data: {
                province_id: idProvince,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function (result) {
                $('#city_id').html('<option value=" " disabled selected>Pilih Salah Satu Kota ...</option>');
                $.each(result.city, function (key, value) {
                    $("#city_id").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
            }
        });

    }
    // $(document).ready(function () {
    //     $('select#province_id').on('click', function () {

            // var idProvince = this.value;
            // $("#city_id").html('');
            // $.ajax({
            //     url: "{{ route('dashboard.fetchCity') }}",
            //     type: "POST",
            //     data: {
            //         province_id: idProvince,
            //         _token: '{{ csrf_token() }}'
            //     },
            //     dataType: 'json',
            //     success: function (result) {
            //         $('#city_id').html('<option value="">Pilih Kota ...</option>');
            //         $.each(result.states, function (key, value) {
            //             $("#city_id").append('<option value="' + value
            //                 .id + '">' + value.name + '</option>');
            //         });
            //     }
            // });
    //     });
    // });
</script>
</body>

</html>