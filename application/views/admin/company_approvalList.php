
                <!-- Page content-->
                <div class=" container-fluid ">
                    <h1>Approval List </h1>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th scope="col">Sir no</th>
                          <th scope="col">Organization Name</th>
                          <th scope="col">Mobile Number</th>
                          <th scope="col">Email Id</th>
                          <th scope="col">Documents</th>
                          <th scope="col">Approved By</th>
                          <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Infosys</td>
                            <td>9876543210</td>
                            <td>hr@infosys.in</td>
                            <td>2 files</td>
                            <td>Akash</td>
                            <td>
                                <div class='myDiv'>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2" data-toggle="modal" data-target="#assign_model" style='margin-right:16px;color: #fd750d;color:#13a932'>Assign</a>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2" style='margin-right:16px;color: #fd750d;'>Assigned</a>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2">View</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Twitter</td>
                            <td>9876543214</td>
                            <td>sales@twitter.com</td>
                            <td>1 files</td>
                            <td>Gopal</td>
                            <td>
                                <div class='myDiv'>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2" data-toggle="modal" data-target="#assign_model" style='margin-right:16px;color: #fd750d;color:#13a932'>Assign</a>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2" style='margin-right:16px;color: #fd750d;'>Assigned</a>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2">View</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Wipro</td>
                            <td>9876543215</td>
                            <td>info@wipro.com</td>
                            <td>2 files</td>
                            <td>Akash</td>
                            <td>
                                <div class='myDiv'>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2" data-toggle="modal" data-target="#assign_model" style='margin-right:16px;color: #fd750d;color:#13a932'>Assign</a>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2" style='margin-right:16px;color: #fd750d;'>Assigned</a>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2">View</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Bajaj Finserv</td>
                            <td>9876543219</td>
                            <td>sales@bajajfinserv.com</td>
                            <td>2 files</td>
                            <td>Tanuj</td>
                            <td>
                                <div class='myDiv'>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2" data-toggle="modal" data-target="#assign_model" style='margin-right:16px;color: #fd750d;color:#13a932'>Assign</a>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2" style='margin-right:16px;color: #fd750d;'>Assigned</a>
                                    <a href="<?php echo base_url() ?>/show_companyDetails?comp_id=2">View</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

    <style type="text/css">
        button.btn.btn-secondary {
            padding-right: 10px;
            padding-left: 10px;
        }
    </style>


<!-- Modal -->
<div class="modal fade" id="assign_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="inputState">Assign To</label>
                <select id="inputState" class="form-control">
                <option>select assign to</option>
                <option>Gopal</option>
                <option>Tanuj</option>
                <option>Akash</option>
              </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>
