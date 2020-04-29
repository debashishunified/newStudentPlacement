$(document).on('change','.change_placement_delected',function(){
	var data_id=$(this).attr('data_id');
	var value=$(this).val();
	if(data_id){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
		  method : "GET",
		  url: "/update_selected_placement/"+data_id+"/"+value,
		  success: function(response){
		   if(response == "done"){
		   	location.reload();
		   }else{
		   	alert('Please try after some times');
		   	location.reload();
		   }
		  }
		});
	}
});
$(document).on('change','.change_placement_date',function(){
	var date=$(this).val();
	if(date){
		$.ajax({
			method : "GET",
			url : "/change_placement_date/"+date,
			data : { date : date },
			success : function (response){
				$('.college_placement_company').html(response);
			}
		});
	}
});

$(document).on('click','#selected_student_id',function(){
	var collegeId=$(this).attr('data_id');
	if(collegeId){
		$.ajax({
			method : "GET",
			url : "/selected_student_details/"+collegeId,
			data : { collegeId : collegeId },
			success : function (response){
				$('#selected_student_name').html(response);
			}
		});
	}
});
$(document).ready( function () {
    $('.dataTable').DataTable();
} );
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})