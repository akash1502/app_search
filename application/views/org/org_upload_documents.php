
<!-- Page content-->
<div class=" container-fluid container">
  <h1>Upload Document</h1>
  <div class="form-box">

    <form enctype="multipart/form-data" id="saveOrgDocuments">

      <div class="form-group">
        <label for="app_id"></label>
        <input class="form-control" id="app_id" type="hidden" name="app_id" placeholder="Enter Application Id" autocomplete="off" value="<?php echo $org_appl_id; ?>">
        <span class="error_flag" id="appId_err"></span>
      </div>

      <div class="form-group">
        <label for="comp_reg_doc_1">Upload company registered document -1 </label>
        <input type="file" class="form-control" name="comp_reg_doc_1" id="comp_reg_doc_1"  accept="image/*">
      </div>

      <div class="form-group">
        <label for="comp_reg_doc_2">Upload company registered document -2 </label>
        <input type="file" class="form-control" name="comp_reg_doc_2" id="comp_reg_doc_2"  accept="image/*">
      </div>

      <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
      <br><label class="error_flag all_messages" id="save_rs_err"></label>
      <br><label class="success_flag all_messages" id="save_rs_succ"></label>

      <div class="form-actions col-md-12" >
        <div class="row" style="float:right;">
          <div class="col-md-offset">
            <a href="<?php echo base_url(); ?>verifyApplicantLevel1/<?php echo $org_appl_id; ?>" id="back" class="btn btn-default">Back</a>
            <button type="submit" id="submit_btn" class="btn btn-success">Upload</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="<?php echo base_url(); ?>/assets/js/app_helper.js"></script>
<script type="module" src="<?php echo base_url(); ?>/assets/js/org/org_upload_documents.js"></script>

</html>
