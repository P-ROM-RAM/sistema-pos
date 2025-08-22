  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>USERS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <!-- Default box -->
            <div class="card">
              <div class="card-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalUserAdd">Add User</button>
              </div>
              <div class="card-body">
                <table id="" class="table  table-striped table-hover table-responsive nowrap dataTableUser" width="100%">
                  <thead>
                    <tr>
                      <th style="width:10px">#</th>
                      <th>Name</th>
                      <th>User</th>
                      <th>Picture</th>
                      <th>Profile</th>
                      <th>Status</th>
                      <th>Last Login</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $item = "";
                    $value = "";
                    $allUsers = UsersController::ctrShowAllUsers($item,$value);

                    foreach ($allUsers as $key => $value) {
                      echo'
                                          <tr>
                      <td>'.$value["id"].'</td>
                      <td>'.$value["nombre"].'</td>
                      <td>'.$value["usuario"].'</td>';
                      if ($value["foto" != ""]) {
                        echo '<td><img src = "'.$value["foto"].'" class="img-thumbnail" width = "40px"></td>';
                      }else{
                        echo '<td><img src = "img/users/anonymous.png" class="img-thumbnail" width = "40px"></td>';
                      }
                     echo '<td>'.$value["perfil"].'</td>
                      <td><button class="btn btn-success btn-md">Activado</button></td>
                      <td>'.$value["ultimo_login"].'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditUser" idUser="'.$value["id"].'" data-toggle="modal" data-target="#modalEditUser">
                            <i class="fa fa-pen"></i>
                          </button>
                          <br>
                          <button class="btn btn-danger">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </td>
                    </tr>';
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modalUserAdd">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" id="form-add-user" role="from" method="post" enctype="multipart/form-data">
          <div class="modal-header" style="background:#343a40; color:white">
            <h4 class="modal-title">ADD USER</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <input type="text" class="form-control input-lg" name="name" placeholder="Enter Name" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </span>
                  <input type="text" class="form-control input-lg" name="nameUser" placeholder="Enter User" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </span>
                  <input type="password" class="form-control input-lg" name="password" placeholder="Enter Password" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </span>
                  <select name="profile" id="profile" class="form-control input-lg">
                    <option value="">Select Profile</option>
                    <option value="Admin">Admin</option>
                    <option value="Special">Special</option>
                    <option value="Seller">Seller</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="panel">Upload Photo</div>
                <input type="file" name="newPhoto" class="newPhoto">
                <p class="help-block">Maximum photo weight 2MB</p>
                <img src="img/users/anonymous.png" name="defaultPhoto" alt="" class="img-thumbnail previewImage" width="100px">
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          <?php
          $createUser = new UsersController();
          $createUser -> ctrCreateUser();
          ?>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- modal Edit user -->
  <div class="modal fade" id="modalEditUser">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" id="form-edit-user" role="from" method="post" enctype="multipart/form-data">
          <div class="modal-header" style="background:#343a40; color:white">
            <h4 class="modal-title">EDIT USER</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <input type="text" class="form-control input-lg" name="editName" id="editName" value="" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </span>
                  <input type="text" class="form-control input-lg" name="editUser" id="editUser"  value="" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </span>
                  <input type="password" class="form-control input-lg" name="editPassword" id="editPassword" placeholder="New Password">
                  <input type="hidden" name="currentPassword" id="currentPassword">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </span>
                  <select name="editProfile" class="form-control input-lg">
                    <option value="" id="editProfile"></option>
                    <option value="Admin">Admin</option>
                    <option value="Special">Special</option>
                    <option value="Seller">Seller</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="panel">Upload Photo</div>
                <input type="file" name="editPhoto" id="editPhoto" class="editPhoto">
                <p class="help-block">Maximum photo weight 2MB</p>
                <img src="img/users/anonymous.png" name="defaultPhoto" alt="" class="img-thumbnail previewImage" width="100px">
                <input type="hidden" name="currentPhoto" id="currentPhoto">
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          <!-- <?php
          $editUser = new UsersController();
          $editUser -> ctrEditUser();
          ?> -->
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->