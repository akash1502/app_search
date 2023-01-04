
import {Applicant} from './applicant.js';

$(document).ready(function() {
  let appHelper = new AppHelper();

  $('#saveOrgDocuments').submit(function(e) {
    e.preventDefault()
    var error_box = $('#save_rs_err');
    var success_box = $('#save_rs_succ');

    error_box.html('');
    success_box.html('');

    let isProcess = false;
    var app_id = $('#app_id').val();    

    if ((app_id!='')) {
      isProcess = true;
    }else{
      $("#appId_err").html("Applicnt Id is missing")
    }

    if (isProcess) {

      let appform = $(this); 
      var formData = new FormData(this);     
      var baseUrl = appHelper.getBase_Url();
      $.ajax({
        type: 'POST',
        url: baseUrl+'/saveOrgDocuments',
        data: formData,
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        success: function (data) {

          var json_obj = $.parseJSON(data);

          $("#all_messages").html("");
          if(json_obj.errr==1){
            $("#save_rs_err").html(json_obj.msg)
          }else{
            $("#save_rs_succ").html(json_obj.msg)
          }
          /*if(res!=''){            
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
          }*/         
        },
        error: function (data) {
          console.log('An error occurred.');
          console.log(data);
        },
      });     
    }

  });

});
