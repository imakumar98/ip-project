function selectType(value){
    if(value=='classroom'){
        $('#zoom-url').prop('disabled',true);
        
    }else{
        $('#zoom-url').attr('disabled',false);
        $('#zoom-url').val('');
        
    }
}


//FUNCTION TO SUBMIT FORM
function submitThisForm(event, formId){
    event.preventDefault();

    var data = $('#'+formId).serialize();

    console.log(data);

    $.ajax({
        url: 'includes/validate_globals.php',
        method: 'POST',
        data: data,
        beforeSend: ()=>{
            $('#'+formId).find('.submit-button').prop('disabled',true);
        //     $('#add-ambassador-form').find('.submit-button').html('SAVING');
        },
        success: (response)=>{

            console.log(response);
            // var response = JSON.parse(response);
            // if(response.success){
            // 	$('add-ambassador-form')[0].reset();
            // 	$('#add-ambassador-form').find('.submit-button').html('SAVED');
            // 	$('#add-ambassador-success-alert').css('display','block');

            // }else{

            // }
            // console.log(response);

            // if(response.success){
            //     window.location.reload();
            // }else{
            //     console.log('SOmething went wrong');
            // }

            // window.location.reload();

            console.log(response);

           
        }
    });
}