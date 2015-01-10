var global = {
	base_url				: window.location.protocol+"//"+window.location.host+'/a1driving/',
	doc      				: $(document),
	show_course 			: '.show_course',
	show_fee 				:  '.show_fee',
	approve_button 			:  '.approve_button',
	edit_myacount 			: '.edit_myacount',
	cancel 					: '.cancel',
	add_new_course 			: '.add_new_course',
	delete_course 			: '.delete_course',
	add_course_type 		:'.add_course_type',
	remove_course_type		:'.remove_course_type',
	insert_new_course_type 	: '.insert_new_course_type',
	del_from_course 		:'.del_from_course',
	del_course_type 		: '.del_course_type',
	add_course_fee 			: '.add_course_fee',
	del_course_fee 			: '.del_course_fee',
	d_course_type 			: '.d_course_type',
	add_branch 				:'.add_branch',
	del_branch 				: '.delete_branch',
}
;(function(){
	var backend = {
		get_course : function(){
			return this.delegate(global.show_course,'change',function(){
				var getme = $(this).val();
				$.getJSON(global.base_url+'in/get/course_type/'+getme+'/',function(data){
					var newselect = '';
					newselect += '<option value="">Choose your course</option>';
					$.each(data,function(key, val){
						newselect += '<option value="'+val.id+'">'+val.course_type_title+'</option>';
					});
					$('select.course').html(newselect);
				});
			});
		},
		get_fee : function(){
			return this.delegate(global.show_fee,'change',function(){
				var getme = $(this).val();
				$.getJSON(global.base_url+'in/get/get_fee/'+getme+'/',function(data){
					var newselect = '';
					newselect += '<option value="">Choose your fee.</option>';
					$.each(data,function(key, val){
						newselect += '<option value="'+val.id+'">'+val.course_hours+' '+val.course_fee+'</option>';
					});
					$('select.course_fee').html(newselect);
				});
			});
		},
		approve_request : function(){
			return this.delegate(global.approve_button,'click',function(){
				var a = $(this).attr('data-id');
				$.getJSON(global.base_url+'admin/approve/'+a+'/',function(data){
					$.each(data,function(key, val){
						$('.'+val.r_user_id+'').html('<a href="'+global.base_url+'/remove/'+val.r_user_id+'"><button type="button" data-id="'+val.r_user_id+'" class="remove_button btn btn-default" title="Remove user">Remove</button></a>');
					});
				});
			});
		},
		edit_acount : function(){
			return this.delegate(global.edit_myacount,'click',function(){
				$('.all').removeAttr('disabled').show();
				$('.edit_myacount').html('<a href="'+global.base_url+''+$(this).attr('data-from')+'/acount"><small class="cancel">Cancel <i class="glyphicon glyphicon-remove"></i></small></a>');
			});
		},
		cancel : function(){
			return this.delegate(global.cancel,'click',function(){
				if(window.location == global.base_url+'in/edit_acount' || global.base_url+'in/acount'){
					location.href = global.base_url+'in/acount';
				}
			});
		},
		add_new_course : function(){
			return this.delegate(global.add_new_course,'click',function(){
				var new_course = $('.'+$(this).attr('data-new-course')+'').val();
				if(new_course == '')
				{
					alert('Unable to add empty value.');
					$($('.'+$(this).attr('data-new-course')+'')).focus();
				}else
				{
					$.getJSON(global.base_url+'admin/add/course/'+new_course+'',function(data){
						var newselect = '';
						newselect += '<option value=""></option>';
						newselect += '';
						$.each(data,function(key, val){
							newselect += '<option value="'+val.c_id+'">'+val.courses+'</option>';
						});
						$('select.course_list').html(newselect);
						$('select.course').html(newselect);
						$('select.del_from_course').html(newselect);
					});
					$($('.'+$(this).attr('data-new-course')+'')).val('');
					alert('Successfully Added!');
				}
			});
		},
		delete_course : function(){
			return this.delegate(global.delete_course,'click',function(){
				var todel = $('.course_list').val();
				if(confirm("Are you sure you want to delete?")){
					$.getJSON(global.base_url+'admin/delete/course/'+todel+'',function(data){
						location.reload();
					});
					return true;
				}
				else return false;
			});
		},
		add_course_type : function(){
			return this.delegate(global.add_course_type,'click',function(){
				var show = $(this).attr('data-show');
				var hide = $(this).attr('data-hide');
				$('.'+show+'').fadeIn();
				$('.'+hide+'').hide();
			});
		},
		remove_course_type : function(){
			return this.delegate(global.remove_course_type,'click',function(){
				var show = $(this).attr('data-show');
				var hide = $(this).attr('data-hide');
				$('.'+show+'').fadeIn();
				$('.'+hide+'').hide();
			});
		},
		insert_new_course_type : function(){
			return this.delegate(global.insert_new_course_type,'click',function(){
				var to_insert = $('.'+$(this).attr('data-get-from')+'').val();
				var a = $('.'+$(this).attr('data-get-from')+'');
				var by = $('.'+$(this).attr('data-lead-course')+'').val();
				if(to_insert == '' || by == '')
				{
					alert('Unable to add empty title');
				}
				else
				{
					$.ajax({
					  type: 'POST',
					  url: global.base_url+'admin/add/course_type',
					  data: {'course_type' : to_insert,'by': by},
					  success: function(){
						$(a).val('');
						alert('Successfully Added!');
					  	$.getJSON(global.base_url+'admin/get/course_type/'+by+'/',function(data){
							var newselect = '';
							newselect += '<option value=""></option>';
							$.each(data,function(key, val){
								newselect += '<option value="'+val.id+'">'+val.course_type_title+'</option>';
							});
							$('select .to_del_course_type,.to_course_type,.d_course_type').html(newselect);
						});	
					  }
					})
				}
			});
		},
		del_from_course : function(){
			return this.delegate(global.del_from_course,'change',function(){
				var to_find = $(this).val();
				$.getJSON(global.base_url+'admin/get/course_type/'+to_find+'',function(data){
					var newselect = '';
					newselect += '<option value=""></option>';
					$.each(data,function(key, val){
						newselect += '<option value="'+val.id+'">'+val.course_type_title+'</option>';
					});
					$('select.to_del_course_type').html(newselect);
				});
			});
		},
		del_course_type : function(){
			return this.delegate(global.del_course_type,'click',function(){
				var to_del = $('.'+$(this).attr('data-to-del')+'').val();
				var from_head = $('.'+$(this).attr('data-head')+'').val();
				if(confirm("Are you sure you want to delete?")){
					$.getJSON(global.base_url+'admin/delete/course_type/'+to_del+'/'+from_head+'/',function(data){
					});
					alert('Successfully Deleted.');
					location.reload();
					return true;
				}
				else return false;
			});
		},
		add_course_fee : function(){
			return this.delegate(global.add_course_fee,'click',function(){
				var fee = $('.'+$(this).attr('data-course-fee')+'').val();
				var hours = $('.'+$(this).attr('data-course-hour')+'').val();
				var to_course_type = $('.'+$(this).attr('data-to-course-type')+'').val();
				if(isNaN(fee) || isNaN(hours)){
					alert('Please enter Numeric value');
				}
				else if(fee.length == 0 || hours.length == 0)
				{
					alert('Unable to insert empty data.');
				}
				else
				{
					$.getJSON(global.base_url+'admin/add/course_fee/'+fee+'/'+hours+'/'+to_course_type+'/',function(data){
					
					});
					$('.'+$(this).attr('data-course-fee')+'').val('');
					$('.'+$(this).attr('data-course-hour')+'').val('');
					alert('Successfully Added.');
				}
			});
		},
		del_course_fee : function(){
			return this.delegate(global.del_course_fee,'click',function(){
				var course_type = $('.'+$(this).attr('data-from-course-type')+'').val();
				var course_fee = $('.'+$(this).attr('data-d-course-fee')+'').val();
				$.getJSON(global.base_url+'admin/delete/del_fee/'+course_type+'/'+course_fee+'/',function(data){
					
				});
				alert('Successfully Deleted!');
				location.reload();
			});
		},
		d_course_type : function(){
			return this.delegate(global.d_course_type,'change',function(){
				var to_find = $(this).val();
				$.getJSON(global.base_url+'admin/get/course_fee/'+to_find+'',function(data){
					var newselect = '';
					newselect += '<option value=""></option>';
					$.each(data,function(key, val){
						newselect += '<option value="'+val.id+'">'+val.course_hours+' '+val.course_fee+'</option>';
					});
					$('select.to_d_course_fee').html(newselect);
				});
			});
		},
		add_branch : function(){
			return this.delegate(global.add_branch,'click',function(){
				var to_add = $('.new_branch').val();
				if(to_add.length == 0)
				{
					alert('Unable to add empty string.');
					$('.new_branch').focus();
				}
				else
				{
					$.ajax({
					  type: 'POST',
					  url: global.base_url+'admin/add/branch',
					  data: {'branch' : to_add},
					  success: function(){
						  	$('.new_branch').val('');
						  	alert('Successfully added!');
						  $.getJSON(global.base_url+'admin/get/branch',function(data){
							var newselect = '';
							newselect += '<option value=""></option>';
							$.each(data,function(key, val){
								newselect += '<option value="'+val.b_id+'">'+val.branch+'</option>';
							});
							$('select.del_branch').html(newselect);
						});
					  }
					});
				}
			});
		},
		delete_branch : function(){
			return this.delegate(global.del_branch,'click',function(){
				var to_find = $('.del_branch').val();
				$.getJSON(global.base_url+'admin/delete/branch/'+to_find+'',function(data){
					var newselect = '';
					newselect += '<option value=""></option>';
					$.each(data,function(key, val){
						newselect += '<option value="'+val.b_id+'">'+val.branch+'</option>';
					});
					$('select.del_branch').html(newselect);
					alert('Successfull Deleted!');
				});
			});
		},
		
	}
	$.extend(global.doc,backend);
	global.doc.get_course();
	global.doc.get_fee();
	global.doc.approve_request();
	global.doc.edit_acount();
	global.doc.cancel();
	global.doc.add_new_course();
	global.doc.delete_course();
	global.doc.add_course_type();
	global.doc.remove_course_type();
	global.doc.insert_new_course_type();
	global.doc.del_from_course();
	global.doc.del_course_type();
	global.doc.add_course_fee();
	global.doc.del_course_fee();
	global.doc.d_course_type();
	global.doc.delete_branch();
	global.doc.add_branch();
}(jQuery,window,document));