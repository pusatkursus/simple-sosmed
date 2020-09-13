<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

	</head>
	<body>
		<div class="col-md-4 col-md-offset-4">
			<select class="form-control" name="cat" id="cat" required="required">
		<option>--Pilih Kategori--</option>
		<?php 
			$url = "https://sosmedpedia.com/getservice";
			$json = file_get_contents($url);
			$obj = json_decode($json, TRUE);
			foreach($obj as$v) 
			{
				 if ($v['category'] == $v['category'])
		         {
		             echo "<option value='".$v['category']."'>".$v['category']."</option>";
		         }
				
			}
		?>
		</select>

		<select class="form-control" name="hasilnya" id="hasilnya" required="required">
		<option>--Pilih Layanan--</option>

		</select>
		</div>


		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
$(document).ready(function(){
    
    // var selects = $('#hasilnya, #cat');
    // $('#hasilnya').chained('#cat');
    // selects.chosen({width: '300px'})
    
    // selects.on('change', function(){
    //     selects.trigger('chosen:updated');
    // });


	$('#cat').change(function(){
	    
        var cat =$(this).val();
        //alert(cat);
        $.ajax({
            url : "filter.php",
            method : "POST",
            data : {cat: cat},
            async : false,
            dataType : 'json',
            success: function(data){
                
                var html = '';
                var i;
                 $.each(data, function(i, item) {
                 	html += '<option value='+item.id+'>'+item.name+' '+item.price+'/1K</option>';
                 });
                // for(i=0; i<data.length; i++){
                //     html += '<option value='+data[i].id+'>'+data[i].name+' '+data[i].price+'/1K</option>';
                // }
                $('#hasilnya').html(html);
                 
            }
        });
    });
});
</script>
	</body>
</html>