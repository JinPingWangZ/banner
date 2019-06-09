  
    <!-- Logout Modal-->
    <div class="modal fade" id="ccaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open('admin/cca_point') ?>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Give CCA Point for this helper.</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>CCA Point.</label>
                <input type="hidden" name="m_id" id="m_id">
                <select required="true" class="form-control" name="ccapoint">
                  <option value="">--Select CCA Point--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <input type="submit" class="btn btn-primary">
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">View Match List</li>
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
          <a href="<?php echo site_url('admin/create_match') ?>" class="btn btn-primary pull-right" style="margin-right: 15px;">New</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column descending" aria-sort="ascending">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Student: activate to sort column ascending">Student</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Helper: activate to sort column ascending">Helper</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Description</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($matchs as $match) { ?>
                  <tr role="row" class="odd">
                    <td class="sorting_1"><?php echo $match->id ?></td>
                    <td><?php echo $match->s_name ?></td>
                    <td><?php echo $match->h_name ?></td>
                    <td><?php echo $match->m_description ?></td>
                    <td style="text-align: center;">
                      <?php if ($match->m_status == '1') { ?>
                        <span class="text-primary">Pending</span>
                      <?php } else if ($match->m_status == '2') { ?>
                        <span class="text-success">Matched</span>
                      <?php } else if ($match->m_status == '3') { ?>
                        <span class="text-success">Completed&nbsp
                          <?php if ($match->ccapoint < 1) { ?>
                            <button m_id="<?php echo $match->id; ?>"  class="btn btn-success cca_point">CCA</button>
                          <?php } else { ?>
                            <span class="text-primary"><?php echo $match->ccapoint; ?></span>
                          <?php } ?>
                        </span>
                      <?php } ?>
                    </td>
                    <td style="text-align: center;">
                      <a href="<?php echo site_url('admin/create_match/' . $match->id) ?>"><i class="fa fa-edit"></i>&nbsp</a>
                      <a href="<?php echo site_url('admin/delete_match/' . $match->id) ?>" onclick="return confirm('Delete this match?')"><i class="fa fa-trash"></i></a>
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