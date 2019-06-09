  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin') ?>">View Match List</a></li>
        <?php if (isset($id)) { ?>
          <li class="breadcrumb-item active">Update Match : <?php echo $id; ?></li>
        <?php } else { ?>
          <li class="breadcrumb-item active">Create Match</li>
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
          <div class="card-header">Match Details</div>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php 
              if (isset($id)) {
                echo form_open('admin/create_match/' . $id);
              } else {
                echo form_open('admin/create_match');
              }
            ?>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="passwd">Student</label>
                    <select name="student_id" class="form-control" required="">
                      <option value="">--Select Student--</option>
                      <?php foreach ($students as $student) { ?>
                        <option value="<?php echo $student->id; ?>" <?php if (set_value('student_id') == $student->id) echo "selected"; else if (isset($match) && $match[0]->student_id == $student->id) echo "selected"; ?> ><?php echo $student->user_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="c_passwd">Helper</label>
                    <select name="helper_id" class="form-control" required="">
                      <option value="">--Select Helper--</option>
                      <?php foreach ($helpers as $helper) { ?>
                        <option value="<?php echo $helper->id; ?>" <?php if (set_value('helper_id') == $helper->id) echo "selected"; else if (isset($match) && $match[0]->helper_id == $helper->id) echo "selected"; ?> ><?php echo $helper->user_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="passwd">Status</label>
                    <select name="m_status" class="form-control" required="TRUE">
                      <option value="">--Select Status--</option>
                      <option value="1" <?php if (set_value('helper_id') == '1') echo "selected"; else if (isset($match) && $match[0]->m_status == '1') echo "selected"; ?> >Pending</option>
                      <option value="2" <?php if (set_value('helper_id') == '2') echo "selected"; else if (isset($match) && $match[0]->m_status == '2') echo "selected"; ?> >Matched</option>
                      <option value="3" <?php if (set_value('helper_id') == '3') echo "selected"; else if (isset($match) && $match[0]->m_status == '3') echo "selected"; ?> >Completed</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="c_passwd">CCA Point</label>
                    <select name="ccapoint" class="form-control" required="TRUE">
                      <option value="">--Select CCA Point--</option>
                      <option value="1" <?php if (set_value('ccapoint') == '1') echo "selected"; else if (isset($match) && $match[0]->ccapoint == '1') echo "selected"; ?> >1</option>
                      <option value="2" <?php if (set_value('ccapoint') == '2') echo "selected"; else if (isset($match) && $match[0]->ccapoint == '2') echo "selected"; ?> >2</option>
                      <option value="3" <?php if (set_value('ccapoint') == '3') echo "selected"; else if (isset($match) && $match[0]->ccapoint == '3') echo "selected"; ?> >3</option>
                      <option value="4" <?php if (set_value('ccapoint') == '4') echo "selected"; else if (isset($match) && $match[0]->ccapoint == '4') echo "selected"; ?> >4</option>
                      <option value="5" <?php if (set_value('ccapoint') == '5') echo "selected"; else if (isset($match) && $match[0]->ccapoint == '5') echo "selected"; ?> >5</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                    <label for="name">Description</label>
                    <textarea required="" rows="5" class="form-control" name='m_description' placeholder="Enter Description" value="<?php if (set_value('m_description') != '') echo set_value('m_description'); else if (isset($match)) echo $match[0]->m_description; ?>"><?php if (set_value('m_description') != '') echo set_value('m_description'); else if (isset($match)) echo $match[0]->m_description; ?></textarea>
                </div>
              </div>

              <button class="btn btn-primary btn-block" type="submit">Submit</button>
            <?php echo form_close()?>
          </div>
        </div>
      </div>

    </div>