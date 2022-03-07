<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    @if (session('error'))
      <div class="alert alert-danger alert-dismissible">    
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h5><i class="icon fas fa-ban"></i>{{__('Error')}}</h5>
        {{session('error')}} 
      </div>
    @endif
    @if (session('success'))        
      <div class="alert alert-success alert-dismissible">    
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{__('Success')}}</h5>
        {{session('success')}} 
      </div>
    @endif
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{$page_title}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active">{{$page_title}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card " >
            <div class="card-header">
              <h3 class="card-title">{{__('All Role')}}</h3>
              <div class="card-tools">
                  <!-- Collapse Button -->
                  <a href="{{route('roles.role.add')}}" class="btn btn-block btn-outline-primary">{{__('Add Actor')}}</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>{{__('Name')}}</th>
                          <th>{{__('Action')}}</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $role)
                        <tr>
                          <td></td>
                          <td>{{$role->name}}</td>
                           <td>
                              <a href="{{route('roles.role.edit',$role->id)}}" type="button" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                              <a href="{{route('roles.role.delete',$role->id)}}" type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                          </td> 
                        </tr>
                    @endforeach

                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>