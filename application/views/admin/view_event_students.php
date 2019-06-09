  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="<?php echo site_url('admin/view_event'); ?>">View Event</a></li>
        <li class="breadcrumb-item active">Students registered in Event ID : <?php echo $e_id; ?></li>
      </ol>
      
      <?php if ($this->session->tempdata('alert')) { ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>&nbsp
        <?php echo $this->session->tempdata('alert'); $this->session->unset_tempdata('alert'); ?>
      </div>
      <?php } ?>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Students registered in Event ID: <?php echo $e_id; ?></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column descending" aria-sort="ascending">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($students as $student) { ?>
                  <tr role="row" class="odd">
                    <td class="sorting_1"><?php echo $student->id ?></td>
                    <td class=""><?php echo $student->user_name ?></td>
                    <td><?php echo $student->email ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>