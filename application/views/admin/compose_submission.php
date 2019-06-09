
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('admin/view_submission'); ?>">View Submission</a>
        </li>
        <?php if (isset($s_id)) { ?>
          <li class="breadcrumb-item active">Edit Submission : <?php echo $s_id; ?></li>
        <?php } else { ?>
          <li class="breadcrumb-item active">Compose Submission</li>
        <?php } ?>
      </ol>
      
      <?php if ($this->session->tempdata('alert')) { ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>&nbsp
        <?php echo $this->session->tempdata('alert'); $this->session->unset_tempdata('alert'); ?>
      </div>
      <?php } ?>

      <div class="container">
        <div class="card card-register mx-auto mt-5">
          <div class="card-header">Compose submission</div>
          <div class="card-body">

            <?php echo $error; ?>
            <?php echo validation_errors(); ?>
            <?php 
            if (isset($s_id)) {
              echo form_open_multipart('admin/compose_submission/' . $s_id);
            } else {
              echo form_open_multipart('admin/compose_submission');
            }
            ?>

              <div class="form-group">
                <div class="form-row">
                  <label>Submission Type</label>
                  <input class="form-control" type="text" name="s_type" value="<?php if (set_value('s_type') != '') echo set_value('s_type'); else if (isset($submission)) echo $submission[0]->s_type; ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="sel2">Select student</label>
                    <select class="form-control" id="sel2" name="s_student" value="<?php $s_student = 0; if (set_value('s_student') != '') $s_student = set_value('s_student'); else if (isset($submission)) $s_student = $submission[0]->s_student; echo $s_student; ?>">
                      <option value="">--Select Student--</option>
                      <?php foreach ($students as $student) { ?>
                        <option value="<?php echo $student->id ?>" <?php if ($student->id == $s_student) echo "selected"; ?>><?php echo $student->user_name ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="date">Date Time</label>
                    <input class="form-control" type="date" name="s_date" value="<?php if (set_value('s_date') != '') echo set_value('s_date'); else if (isset($submission)) echo $submission[0]->s_date; ?>">
                  </div>
                </div>
              </div>

              <?php if (isset($s_id)) { ?>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Status</label>
                      <select name="s_status" class="form-control" required="">
                        <option value="">--Select Status</option>
                        <option value="0" <?php if (set_value('s_status') == '0') echo "selected"; else if (isset($submission) && $submission[0]->s_status == '0') echo "selected"; ?> >Progress</option>
                        <option value="1" <?php if (set_value('s_status') == '1') echo "selected"; else if (isset($submission) && $submission[0]->s_status == '1') echo "selected"; ?> >Result Submitted</option>
                        <option value="2" <?php if (set_value('s_status') == '2') echo "selected"; else if (isset($submission) && $submission[0]->s_status == '2') echo "selected"; ?> >Completed</option>
                      </select>
                    </div>
                  </div>
                </div>
              <?php } else echo "<input type='hidden' name='s_status' value='0'>"; ?>

              <div class="form-group">
                <div class="form-row">
                  <label for="comment">Description</label>
                  <textarea class="form-control" rows="5" id="comment" name="s_description" value="<?php if (set_value('s_description') != '') echo set_value('s_description'); else if (isset($submission)) echo $submission[0]->s_description; ?>"><?php if (set_value('s_description') != '') echo set_value('s_description'); else if (isset($submission)) echo $submission[0]->s_description; ?></textarea>
                </div>
              </div>
              
              <div class="form-group">
                <div class="form-row">
                  <input type="file" name="s_attachment">
                </div>
              </div>

              <input type="submit" class="btn btn-primary btn-block" value="Submit">

            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
