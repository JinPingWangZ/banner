  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/view_user') ?>">View User</a></li>
        <?php if (isset($id)) { ?>
          <li class="breadcrumb-item active">Update User : <?php echo $id; ?></li>
        <?php } else { ?>
          <li class="breadcrumb-item active">Create User</li>
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
          <div class="card-header">User Account</div>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php echo $error; ?>
            <?php 
              if (isset($id)) {
                echo form_open('admin/create_user/' . $id);
              } else {
                echo form_open('admin/create_user');
              }
            ?>
              <div class="form-group">
                <div class="form-row">
                    <label for="name">Your Name</label>
                    <input class="form-control" id="name" type="text" name='user_name' aria-describedby="nameHelp" placeholder="Enter name" value="<?php if (set_value('user_name') != '') echo set_value('user_name'); else if (isset($s_user)) echo $s_user[0]->user_name; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php if (set_value('email') != '') echo set_value('email'); else if (isset($s_user)) echo $s_user[0]->email; ?>">
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="usertype">User Type</label>
                    <select name="user_type" class="form-control" required="TRUE">
                      <option value="">--Select User Type--</option>
                      <option value="1" <?php if (set_value('user_type') == '1') echo "selected"; else if (isset($s_user) && $s_user[0]->user_type == '1') echo "selected"; ?> >Admin</option>
                      <option value="2" <?php if (set_value('user_type') == '2') echo "selected"; else if (isset($s_user) && $s_user[0]->user_type == '2') echo "selected"; ?> >Student</option>
                      <option value="3" <?php if (set_value('user_type') == '3') echo "selected"; else if (isset($s_user) && $s_user[0]->user_type == '3') echo "selected"; ?> >Helper</option>
                    </select>
                  </div>
                </div>

              </div>

              <?php if (isset($id)) { ?>
                <p><a data-toggle="collapse" data-target="#password-field" href="#">Change Password</a></p>
                <div id="password-field" class="collapse">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label for="passwd">Password</label>
                        <input class="form-control" name = "password" id="password" type="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="c_passwd">Confirm password</label>
                        <input class="form-control" name = "password_confirm" id="c_passwd" type="password" placeholder="Confirm password" value="<?php echo set_value('password_confirm'); ?>">
                      </div>
                    </div>
                  </div>
                </div>
              <?php } else { ?>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="passwd">Password</label>
                      <input class="form-control" name = "password" id="txtPassword" onkeyup="CheckPasswordStrength(this.value)" type="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                      <span id="password_strength"></span>
                      <script type="text/javascript">
                        function CheckPasswordStrength(password) {
                            var password_strength = document.getElementById("password_strength");
                     
                            //TextBox left blank.
                            if (password.length == 0) {
                                password_strength.innerHTML = "";
                                return;
                            }
                     
                            //Regular Expressions.
                            var regex = new Array();
                            regex.push("[A-Z]"); //Uppercase Alphabet.
                            regex.push("[a-z]"); //Lowercase Alphabet.
                            regex.push("[0-9]"); //Digit.
                            regex.push("[$@$!%*#?&]"); //Special Character.
                     
                            var passed = 0;
                     
                            //Validate for each Regular Expression.
                            for (var i = 0; i < regex.length; i++) {
                                if (new RegExp(regex[i]).test(password)) {
                                    passed++;
                                }
                            }
                     
                            //Validate for length of Password.
                            if (passed > 2 && password.length > 8) {
                                passed++;
                            }
                     
                            //Display status.
                            var color = "";
                            var strength = "";
                            switch (passed) {
                                case 0:
                                case 1:
                                    strength = "Weak";
                                    color = "red";
                                    password_strength.setAttribute("validate", "error");
                                    break;
                                case 2:
                                    strength = "Good";
                                    color = "darkorange";
                                    password_strength.setAttribute("validate", "validated");
                                    break;
                                case 3:
                                    password_strength.setAttribute("validate", "validated");
                                    break;
                                case 4:
                                    strength = "Strong";
                                    color = "green";
                                    password_strength.setAttribute("validate", "validated");
                                    break;
                                case 5:
                                    strength = "Very Strong";
                                    color = "darkgreen";
                                    password_strength.setAttribute("validate", "validated");
                                    break;
                            }
                            password_strength.innerHTML = strength;
                            password_strength.style.color = color;

                            if (password.length < 8) {

                              password_strength.innerHTML = "Password length must be at least 8 characters.";
                              password_strength.style.color = "red";
                              password_strength.setAttribute("validate", "error");
                            }
                        }
                    </script>
                    </div>
                    <div class="col-md-6">
                      <label for="c_passwd">Confirm password</label>
                      <input class="form-control" name = "password_confirm" id="c_passwd" type="password" placeholder="Confirm password" value="<?php echo set_value('password_confirm'); ?>">
                    </div>
                  </div>
                </div>
              <?php } ?>

              <button class="btn btn-primary btn-block" id="btn_create_user" type="submit">Submit</button>
            <?php echo form_close()?>
          </div>
        </div>
      </div>

    </div>