var count = 1;
var answers_count = 0;

function addQuestion(){
	answers_count ++ ;
	$('#answers-count').val(answers_count);
	$('.questions').append('<div class="form-group question-div-' + count +'">' +
		 						'<label class="control-label col-sm-2">Question '+ count + '</label>' + 
		 							'<div class="col-sm-10">' + 
										'<input type="text" class="form-control question" name="question' + count +'"  placeholder="Enter Question">' +
										    // start choice s
											    '<div class="radio">' +
											      '<label><input value="radio" type="radio" name="type' + count +'" checked>Radio</label>' +
											    '</div>' +
											    '<div class="radio">' +
											      '<label><input value="checkbox" type="radio" name="type' + count + '">CheckBox</label>' +
											    '</div>' +	
											    '<div class="radio">' +
											      '<label><input value="text" type="radio" name="type' + count + '">Text</label>' +
											    '</div>' +
										    // end choices

										    // start answers
										    '<div class="answares' + count +'">'+
										    	'<input type="text" class="form-control answer" name="answer' + answers_count + 'q' + count +'" placeholder="Enter Answer">' +	
										    '</div>'+
										  	
										  	'<button onclick="addOption('  + count + '),event.preventDefault();" class="add-question btn btn-primary">Add Option</button>' +
										  	// end answers							
									' </div>' +	
							'</div>	<hr>'	
							);
	$('.count').html(count);
	$('#count').val(count);

	
	count ++ ;
}


function addOption(question_id){
	answers_count ++ ;
	$('#answers-count').val(answers_count);
	$('.answares' + question_id).append('<input type="text" class="form-control answer" name="answer' + answers_count  + 'q' + question_id +'" placeholder="Enter Answer">');
	
}


