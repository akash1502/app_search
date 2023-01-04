
import {Applicant} from './applicant.js';


$(document).ready(function() {

  let appHelper = new AppHelper();

  $('#saveVerifyDocuments').submit(function(e) {
    e.preventDefault()
    var error_box = $('#save_rs_err');
    var success_box = $('#save_rs_succ');

    error_box.html('');
    success_box.html('');

    let isProcess = false;
    
    var org_regId = appHelper.setTextEmptyValidater('org_regId','org_regId_err','Please enter organization registration');
    var pan_no = appHelper.setTextEmptyValidater('pan_no','pan_no_err','Please enter pan no');
    var add_1 = appHelper.setTextEmptyValidater('add_1','add_1_err','Please enter address line 1');
    var area = appHelper.setTextEmptyValidater('area','area_err','Please enter Area');
    var city = appHelper.setTextEmptyValidater('city','city_err','Please enter City');
    var country = appHelper.setTextEmptyValidater('country','country_err','Please enter Country');
    
    if (org_regId && pan_no_err && add_1 && area && city && country) {
      isProcess = true;
    }

    if (isProcess) {
      console.log("ok");
      var formData = new FormData(this);  
      var baseUrl = appHelper.getBase_Url();
      $.ajax({
       type: 'POST',
        url: baseUrl+'/saveVerifyDocuments',
        data: formData,
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function (res) {
          console.log(res);
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
