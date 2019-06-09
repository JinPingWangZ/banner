  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">View Event</li>
      </ol>
      
      <?php if ($this->session->tempdata('alert')) { ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>&nbsp
        <?php echo $this->session->tempdata('alert'); $this->session->unset_tempdata('alert'); ?>
      </div>
      <?php } ?>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Events
          <a href="<?php echo site_url('admin/create_event') ?>" class="btn btn-primary pull-right" style="margin-right: 15px;">New</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column descending" aria-sort="ascending">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Name</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Description</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending">Image</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($events as $event) { ?>
                  <tr role="row" class="odd">
                    <td class="sorting_1"><?php echo $event->id ?></td>
                    <td class=""><?php echo $event->e_name ?></td>
                    <td><?php echo $event->e_description ?></td>
                    <td><?php echo $event->e_image ?></td>
                    <td style="text-align: center;">
                      <a href="<?php echo site_url('admin/view_event_students/' . $event->id) ?>"><i class="fa fa-users"></i>&nbsp</a>
                      <a href="<?php echo site_url('admin/create_event/' . $event->id); ?>"><i class="fa fa-edit"></i>&nbsp</a>
                      <a href="<?php echo site_url('admin/delete_event/' . $event->id); ?>"><i class="fa fa-trash"></i></a>
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