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
                      <th>#</th>
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
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td> 4</td>
                      <td>X</td>
                      <td><button class="btn btn-success btn-md">Activado</button></td>
                      <td>2025-12-11 12:05:32</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning">
                            <i class="fa fa-pen"></i>
                          </button>
                          <br>
                          <button class="btn btn-danger">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td> 4</td>
                      <td>X</td>
                      <td><button class="btn btn-success btn-md">Activado</button></td>
                      <td>2025-12-11 12:05:32</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning">
                            <i class="fa fa-pen"></i>
                          </button>
                          <br>
                          <button class="btn btn-danger">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td> 4</td>
                      <td>X</td>
                      <td><button class="btn btn-success btn-md">Activado</button></td>
                      <td>2025-12-11 12:05:32</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning">
                            <i class="fa fa-pen"></i>
                          </button>
                          <br>
                          <button class="btn btn-danger">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
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
                  <select name="profile" id="" class="form-control input-lg">
                    <option value="">Select Profile</option>
                    <option value="Admin">Admin</option>
                    <option value="Special">Special</option>
                    <option value="Seller">Seller</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="panel">Upload Photo</div>
                <input type="file" name="newPhoto" id="newPhoto">
                <p class="help-block">Maximum photo weight 1MB</p>
                <img src="img/users/anonymous.png" alt="" class="img-thumbnail" width="100px">
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->