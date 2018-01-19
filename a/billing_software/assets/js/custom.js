	$(document).ready(function() {
		$(document).on( 'change',".statusChange",function(){
			var that = $(this);											  
			var table = $(this).data('table');
			var index = $(this).data('index');
			var id =  $(this).data('id');
			
			var action = "status";
		
			if($(this).prop("checked"))					  
			{
				var value = 1;
			}
			else
			{
				var value = 0;
			}
			
			$.ajax({
			type: "POST",
			url: "ajax.php",
			dataType: 'json',
			data: {action:action , table:table, index:index , id:id,value:value},
			success: function(data){
				if(data.error == 0)
				{
					
				}
				if(data.error == 1)
				{
					alert(data.message);
				}
				
			},
			error : function(data) {  }
			});
			
			 
		});
		
	$(document).on( "click",".deleteRecord", function() {
													  
		if (!confirm("Are you sure?")) {
        	return false;
    	}
		var that = $(this);											  
		var table = $(this).data('table');
		var index = $(this).data('index');
		var id =  $(this).data('id');
		
		var action = "delete";
		
		$.ajax({
			type: "POST",
			url: "ajax.php",
			dataType: 'json',
			data: {action:action , table:table, index:index , id:id},
			success: function(data){
				if(data.error == 0)
				{
					that.parent().parent().remove();
					alert(data.message);
				}
				if(data.error == 1)
				{
					alert(data.message);
				}
				
			},
			error : function(data) {  }
			});
		
	});
});

