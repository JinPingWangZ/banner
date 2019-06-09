  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">View Submission</li>
      </ol>
      
      <?php if ($this->session->tempdata('alert')) { ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>&nbsp
        <?php echo $this->session->tempdata('alert'); $this->session->unset_tempdata('alert'); ?>
      </div>
      <?php } ?>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Submissions
          <a href="<?php echo site_url('admin/compose_submission') ?>" class="btn btn-primary pull-right" style="margin-right: 15px;">New</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column descending" aria-sort="ascending">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Type</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Description</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Student: activate to sort column ascending">Student</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Deadline: activate to sort column ascending">Deadline</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Attachment: activate to sort column ascending">Attachment</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Result: activate to sort column ascending">Result</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($submissions as $submission) { ?>
                  <tr role="row" class="odd">
                    <td class="sorting_1"><?php echo $submission->id ?></td>
                    <td class=""><?php echo $submission->s_type ?></td>
                    <td><?php echo $submission->s_description ?></td>
                    <td><?php echo $submission->s_student ?></td>
                    <td><?php echo $submission->s_date ?></td>
                    <?php if ($submission->s_attachment != '') { ?>
                      <td><i class="fa fa-file"></i> <?php echo $submission->s_attachment ?></a></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>

                    <?php if ($submission->s_status == 1) { ?>
                      <td>Result Submitted</td>
                    <?php } else if ($submission->s_status == 2) { ?>
                      <td>Completed</td>
                    <?php } else { ?>
                      <td>Progress</td>
                    <?php } ?>
                    
                    <?php if ($submission->s_result != '') { ?>
                      <td><a href="<?php echo base_url('uploads/') . $submission->s_result; ?>" style="" download><i class="fa fa-file"></i> <?php echo $submission->s_result ?></a></td>
                    <?php } else { ?>
                      <td></td>
                    <?php } ?>
                    <td style="text-align: center;">
                      <a href="<?php echo site_url('admin/check_submission/' . $submission->id) ?>" onclick = "return confirm('Do you want to allow this submission?');"><i class="fa fa-check"></i>&nbsp</a>
                      <a s_id="<?php echo $submission->id ?>" style="cursor: pointer; color: #007bff;" class="remarkModal" data-toggle="modal" data-target="#remarkModal"><i class="fa fa-close"></i>&nbsp</a>
                      <a href="<?php echo site_url('admin/compose_submission/' . $submission->id) ?>"><i class="fa fa-edit"></i>&nbsp</a>
                      <a href="<?php echo site_url('admin/delete_submission/' . $submission->id) ?>" onclick = "return confirm('Do you want to delete this submission?');"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>


    <!-- Match Modal-->
    <div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Reject this Submission?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <?php echo form_open('admin/remark') ?>
          <div class="modal-body">
            <div class="form-group">
              <label>Remark</label>
              <input type="hidden" name="s_id", id="submission_id", value="0">
              <textarea required="true" class="form-control" rows="5" name="s_remark"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-primary">
          </div>
          <?php form_close() ?>
        </div>
      </div>
    </div>