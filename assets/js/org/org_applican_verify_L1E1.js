
import {Applicant} from './applicant.js';

$(document).ready(function() {

	let appHelper = new AppHelper();
	$('#show_emailTr').hide();
	$('#show_webLinkTr').hide();
	$('.inputHide').hide();
	$('#btn_blacklist').hide();
	$('#btn_verified').hide();

	function setVerifiedOn() {

		var cnt_no_status = $('#contact_no_status').val();
		var email_status = $('#email_status').val();
		var websiteUrl_status = $('#websiteUrl_status').val();

		if (cnt_no_status==3 && (email_status==3 || websiteUrl_status==3)) {
			$('#btn_verified').show();
		} 
		if (cnt_no_status==3 && (email_status==2 || websiteUrl_status==2)){
			$('#btn_blacklist').show();
		}

	}


	$('#contact_no_status').on('change', function(e) {

		e.preventDefault();
		var cnt_no_status = $(this).val();
		if (cnt_no_status==2) {
			$('#btn_blacklist').show();
			$('#btn_verified').hide();
			$('#show_emailTr').hide();
			$('#show_webLinkTr').hide();

		}else if(cnt_no_status==3){
			$('#btn_blacklist').hide();
			$('#show_emailTr').show();
			$('#show_webLinkTr').show();
			setVerifiedOn();
			
		}

	});


	$('#email_status').on('change', function(e) {
		setVerifiedOn();
	});

	$('#websiteUrl_status').on('change', function(e) {
		setVerifiedOn();
	});

	$('.editfieldValue').on('click', function(e) {
		var dataId = $(this).attr('data-fieldValue');
		console.log(dataId);
		$('#'+dataId).toggle();
	});

	$('#btn_blacklist').on('click', function(e) {
		e.preventDefault()
		var error_box = $('#save_rs_err');
		var success_box = $('#save_rs_succ');

		error_box.html('');
		success_box.html('');

		let isProcess = false;
		var contact_no_status = $('#contact_no_status').val();


		if (confirm('Are you sure want to add this applicant into Blacklist?') && contact_no_status==2) {
			isProcess = true;
		}

		if (isProcess) {

			var appln_id = $('#appln_id').val();
			//var country_code = $('#country_code').val();


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
				url: baseUrl+'/addApplicantInBlacklist',
				data: {ACTION:'ADD_BLACKLIST',POST_ORGDATA:postOrgData},
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



		let isProcess = false;

		var contact_no_status = $('#contact_no_status').val();
		var email_status = $('#email_status').val();
		var websiteUrl_status = $('#websiteUrl_status').val();

		

		if ((contact_no_status!='---') &&(email_status!='---') && (websiteUrl_status!='---')) {
			isProcess = true;

			var isVisible = $('#mob_no').is(':visible');
			if (isVisible) {
				var mob_no_Flag = appHelper.setOrgPhoneValidater('mob_no','mob_no_err');
				if (!mob_no_Flag) {
					isProcess = false;
				}
			}

			var isVisible = $('#email_id').is(':visible');
			if (isVisible) {
				var email_Flag = appHelper.setOrgEmailValidater('email_id','email_id_err');	
				if (!email_Flag) {
					isProcess = false;
				}		
			}
			var isVisible = $('#org_website').is(':visible');
			if (isVisible) {
				var org_website_Flag = appHelper.setOrgWebsiteValidater('org_website','org_website_err','Please provide valide website url.');
				if (!org_website_Flag) {
					isProcess = false;
				}
			}

		}

		if (isProcess) {

			var email_id = $('#email_id').val();		
			var mob_no = $('#mob_no').val();
			var org_website = $('#org_website').val();
			var appln_id = $('#appln_id').val();
			//var country_code = $('#country_code').val();


			let applicant = new Applicant();
			applicant.appln_ID = appln_id;
			applicant.email_id = email_id;
			//applicant.country_code = country_code;
			applicant.mob_no = mob_no;
			applicant.org_website = org_website;
			applicant.email_status = email_status;
			applicant.mobile_status = contact_no_status;
			applicant.website_status = websiteUrl_status;

			var postOrgData = JSON.stringify(applicant);
			//console.log(applicant);
			//console.log(postOrgData);			

			let appform = $(this);			
			var baseUrl = appHelper.getBase_Url();
			$.ajax({
				type: 'POST',
				url: baseUrl+'/verifyApplicantLevel1Emp1Save',
				data: {ACTION:'VERIFY_LEVEL_1',POST_ORGDATA:postOrgData},
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
