$(document).ready(function(){


	//ADD AMBASSADOR BUTTON CLICK
	$('#add-ambassador-button').on('click',function(){
		$(this).prop('disabled',true);
		$('#ambassador-form-div').css('display','block');
	});

	//ADD COLLEGE BUTTON CLICK
	$('#add-college-button').on('click',function(){
		$(this).prop('disabled',true);
		$('#college-form-div').css('display','block');
	});

	//ADD BATCH BUTTON CLICK
	$('#add-batch-button').on('click',function(){
		$(this).prop('disabled',true);
		$('#batch-form-div').css('display','block');
	});


	//ADD AMBASSADOR FORM SUBMISSION
	$('#add-ambassador-form').on('submit',function(event){
		event.preventDefault();
		var data = $('#add-ambassador-form').serialize();
		
		$.ajax({
			url: 'includes/validate_globals.php',
			method: 'POST',
			data: data,
			beforeSend: ()=>{
				$('#add-ambassador-form').find('.submit-button').prop('disabled',true);
				$('#add-ambassador-form').find('.submit-button').html('SAVING');
			},
			success: (response)=>{
				// var response = JSON.parse(response);
				// if(response.success){
				// 	$('add-ambassador-form')[0].reset();
				// 	$('#add-ambassador-form').find('.submit-button').html('SAVED');
				// 	$('#add-ambassador-success-alert').css('display','block');

				// }else{

				// }
				// console.log(response);

				window.location.reload();
			}
		});

		
	});


	//ADD AMBASSADOR FORM SUBMISSION
	$('#add-college-form').on('submit',function(event){
		event.preventDefault();
		var data = $('#add-college-form').serialize();
		
		$.ajax({
			url: 'includes/validate_globals.php',
			method: 'POST',
			data: data,
			beforeSend: ()=>{
				$('#add-college-form').find('.submit-button').prop('disabled',true);
				$('#add-college-form').find('.submit-button').html('SAVING');
			},
			success: (response)=>{
				// var response = JSON.parse(response);
				// if(response.success){
				// 	$('add-ambassador-form')[0].reset();
				// 	$('#add-ambassador-form').find('.submit-button').html('SAVED');
				// 	$('#add-ambassador-success-alert').css('display','block');

				// }else{

				// }
				// console.log(response);

				window.location.reload();
			}
		});

		
	});


	$('#days').on('change',function(){
		var days = $(this).val();
		$.ajax({
			url: 'includes/validate_globals.php',
			method: 'POST',
			data: 'days='+days,
			
			success: (response)=>{
				var ambassadors = JSON.parse(response);
				var html = '';
				var ambassadorHTML = "<li class='list-group-item d-flex px-3'><span class='text-semibold text-fiord-blue'>name</span><span class='ml-auto text-right text-semibold text-reagent-gray'>username</span></li>"; 
				for(var i=0; i<ambassadors.length; i++){
					html = html + "<li class='list-group-item d-flex px-3'><span class='text-semibold text-fiord-blue'>"+ambassadors[i].name+"</span><span class='ml-auto text-right text-semibold text-reagent-gray'>"+ambassadors[i].user_id+"</span></li>"; 

				}


				$('#ambassador-list').html(html);
			}
		});

	});



});