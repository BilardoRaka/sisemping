<script src="{{ asset('assets/js/bundle.js?ver=3.1.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=3.1.0') }}"></script>
<script src="{{ asset('assets/js/charts/gd-default.js?ver=3.1.0') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    function city(number)
    {
        var idProvince = number;
        console.log(idProvince);
        $("#city_id").html('<option value=" " disabled selected>Pilih Salah Satu Kota</option>');
        $.ajax({
            url: "{{ route('dashboard.fetchCity') }}",
            type: "POST",
            data: {
                province_id: idProvince,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function (result) {
                $('#city_id').html('<option value=" " disabled selected>Pilih Salah Satu Kota</option>');
                $.each(result.city, function (key, value) {
                    $("#city_id").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
            }
        });

    }

    function validateNumber(evt) {
        var e = evt || window.event;
        var key = e.keyCode || e.which;

        if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
            // numbers   
            key >= 48 && key <= 57 ||
            // Numeric keypad
            key >= 96 && key <= 105 ||
            // Backspace and Tab and Enter
            key == 8 || key == 9 || key == 13 ||
            // Home and End
            key == 35 || key == 36 ||
            // left and right arrows
            key == 37 || key == 39 ||
            // Del and Ins
            key == 46 || key == 45) {
            // input is VALID
        } else {
            e.returnValue = false;
            if (e.preventDefault) e.preventDefault();
        }
    }

</script>
</body>

</html>