<script type="text/javascript">

    function postalCodeSettlement() {
        let postalCode = $('#postcode').val();
        $.ajax({
            type:"GET",
            url:"{{url('postalcodeSettlementsDDDW')}}",
            data: { postalcode: postalCode },
            success:function(res){
                $("#settlement").empty();
                if(res){
                    if (res.length == 1) {
                        $("#settlement").append('<option value="'+(res[0].settlement)+'">'+(res[0].settlement)+'</option>');
                    } else {
                        $.each(res,function(key,value){
                            $("#settlement").append('<option></option>');
                            $("#settlement").append('<option value="'+value.id+'">'+value.id+'</option>');
                        });
                    }
                }
            }
        });
    };
</script>
