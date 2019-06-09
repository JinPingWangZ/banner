

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Item</li>
            </ol>
        </div>
        
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
            
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Edit Item <a href="<?php echo base_url('admin/items') ?>" class="btn btn-info pull-right"><i class="fa fa-arrow-left"></i> Back</a></h4>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/items/edit/'.$item->id) ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Title <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" value="<?php echo $item->title; ?>" name="title" class="form-control" required data-validation-required-message="Title is required">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Short Info </label>
                                        <div class="col-md-9 controls">
                                            <textarea class="form-control" name="summary"><?php echo $item->summary; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Category </label>
                                        <div class="col-md-3 controls">
                                            <div class="form-group has-success">
                                                <select class="form-control custom-select" name="category" aria-invalid="false" required>
                                                    
                                                    <?php foreach ($categories as $cat): ?>
                                                        <?php 
                                                            if($cat['id'] == $item->category_id){
                                                                $selec = 'selected';
                                                            }else{
                                                                $selec = '';
                                                            }
                                                        ?>
                                                        <option <?php echo $selec; ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                                                    <?php endforeach ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2"> Upload Image</label>
                                        <div class="col-md-9 controls">
                                            <img src="<?php echo base_url($item->thumb); ?>"><br>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Description </label>
                                        <div class="col-md-9 controls">
                                            <textarea class="form-control summernote" name="description"><?php echo $item->description; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Status</label>
                                        <div class="controls">
                                            <div class="form-check">
                                                <label class="custom-control custom-radio">
                                                    <input <?php if($item->status == 1){echo "checked";}else{echo "";} ?> name="status" type="radio" value="1" class="custom-control-input" required data-validation-required-message="You need to select status type" aria-invalid="false">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Active</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input <?php if($item->status == 0){echo "checked";}else{echo "";} ?> name="status" type="radio" value="0" class="custom-control-input" required data-validation-required-message="You need to select status type" aria-invalid="false">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Inactive</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Add Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content -->

</div>