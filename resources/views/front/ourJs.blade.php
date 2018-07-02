<!-- The code below fetches data from the database without refreshing the page eg Gmail-->

<script>
$(document).ready(function(){
    
        $("#findBtn").click(function(){
            var cat = $("#catID").val();
            var price = $("#priceID").val();
            //alert(cat);
            //alert(price);
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '{{url('/productsCat')}}',
                data: 'cat_id=' + cat + '&price=' + price,
                success:function(response){
                    console.log(response);
                    $("#productData").html(response);
                }
            });
        });
   
});
</script>

