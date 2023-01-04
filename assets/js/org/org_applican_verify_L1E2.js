
import {Applicant} from './applicant.js';

$(document).ready(function() {

	let appHelper = new AppHelper();
	$('#show_emailTr').hide();
	$('#show_webLinkTr').hide();
	$('.inputHide').hide();

	//$('#btn_blacklist').hide();
	//$('#btn_verified').hide();

	$('#contact_no_status').on('change', function(e) {

		e.preventDefault();
		var cnt_no_status = $(this).val();
		if (cnt_no_status==2) {
			$('#show_emailTr').hide();
			$('#show_webLinkTr').hide();

		}else if(cnt_no_status==3){
			$('#show_emailTr').show();
			$('#show_webLinkTr').show();			
		}

	});


	$('#btn_blacklist').on('click', function(e) {
		e.preventDefault()
		var error_box = $('#save_rs_err');
		var success_box = $('#save_rs_succ');

		error_box.html('');
		success_box.html('');

		let isProcess = false;

		if (confirm('Are you sure want to add this reject applicant') && appln_id !='') {
			isProcess = true;
		}

		if (isProcess) {

			let applicant = new Applicant();
			applicant.appln_ID = appln_id;
			applicant.mobile_status = contact_no_status;

			var postOrgData = JSON.stringify(applicant);
			//console.log(applicant);
			//console.log(postOrgData);			

			let appform = $(this);			
			var baseUrl = appHelper.getBase_Url();
			$.ajax({
				type: 'POST',
				url: baseUrl+'/verifyApplicantLevel1Emp2Save',
				data: {ACTION:'VERIFY_LEVEL_2_REJECT',POST_ORGDATA:postOrgData},
				success: function (res) {
					if(res!=''){
						var data= JSON.parse(res);
						if(data.ERR_CODE!=''){
							var errText = "Code -> "+data.ERR_CODE+"<br>Description -> "+data.ERR_DESCRIPTION+"<br>Logs -> "+data.RES_LOGS
							error_box.html(errText);
						}else if(data.SUC_CODE!=''){
							success_box.html(data.SUC_DESCRIPTION);
							//window.location.href=data.success_url;
						}else{
							error_box.html('Invalid response form server.');
						}
					}					
				},
				error: function (data) {
					console.log('An error occurred.');
					console.log(data);
				},
			});			
		}
	});

	
	$('#verify_Level_1').submit(function(e) {
		e.preventDefault()
		var error_box = $('#save_rs_err');
		var success_box = $('#save_rs_succ');

		error_box.html('');
		success_box.html('');



		let isProcess = true;

		var appln_id = $('#appln_id').val();
		if (appln_id == '') {
			isProcess = false;
		}

		if (isProcess) {

			let applicant = new Applicant();
			applicant.appln_ID = appln_id;

			var postOrgData = JSON.stringify(applicant);
			//console.log(applicant);
			//console.log(postOrgData);			

			let appform = $(this);			
			var baseUrl = appHelper.getBase_Url();
			$.ajax({
				type: 'POST',
				url: baseUrl+'/verifyApplicantLevel1Emp2Save',
				data: {ACTION:'VERIFY_LEVEL_2',POST_ORGDATA:postOrgData},
				success: function (res) {
					if(res!=''){
						var data= JSON.parse(res);
						if(data.ERR_CODE!=''){
							var errText = "Code -> "+data.ERR_CODE+"<br>Description -> "+data.ERR_DESCRIPTION+"<br>Logs -> "+data.RES_LOGS
							error_box.html(errText);
						}else if(data.SUC_CODE!=''){
							success_box.html(data.SUC_DESCRIPTION);
							//window.location.href=data.success_url;
						}else{
							error_box.html('Invalid response form server.');
						}
					}					
				},
				error: function (data) {
					console.log('An error occurred.');
					console.log(data);
				},
			});			
		}

	});
});
