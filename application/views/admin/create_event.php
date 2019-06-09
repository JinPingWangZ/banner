
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('admin/view_event'); ?>">View Event</a>
        </li>
        <?php if (isset($e_id)) { ?>
          <li class="breadcrumb-item active">Edit Event : <?php echo $e_id; ?></li>
        <?php } else { ?>
          <li class="breadcrumb-item active">Create Event</li>
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
          <div class="card-header">Create Event</div>
          <div class="card-body">

            <?php echo $error; ?>
            <?php echo validation_errors(); ?>
            <?php 
              if (isset($e_id)) {
                echo form_open_multipart('admin/create_event/' . $e_id);
              } else {
                echo form_open_multipart('admin/create_event');
              }
            ?>

              <div class="form-group">
                <div class="form-row">
                  <label>Event Name</label>
                  <input class="form-control" type="text" name="e_name" value="<?php if (set_value('e_name') != '') echo set_value('e_name'); else if (isset($event)) echo $event[0]->e_name; ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <label for="comment">Description</label>
                  <textarea class="form-control" rows="5" id="comment" name="e_description" value="<?php if (set_value('e_description') != '') echo set_value('e_description'); else if (isset($event)) echo $event[0]->e_description; ?>"><?php if (set_value('e_description') != '') echo set_value('e_description'); else if (isset($event)) echo $event[0]->e_description; ?></textarea>
                </div>
              </div>
              
              <div class="form-group">
                <div class="form-row">
                  <label>Image for Event </label>
                  <input type="file" name="e_image" class="form-control">
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
