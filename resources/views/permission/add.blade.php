



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{$page_title}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">{{__('Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles.role.index')}}">{{__('Role')}}</a></li>
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
              <div class="card-tools">
                  <!-- Collapse Button -->
                  <a href="{{route('permission.index')}}" class="btn btn-block btn-outline-secondary">{{__('back')}}</a>
              </div>
            </div>
            <!-- /.card-header -->
            <form class="needs-validation" action="{{route('permission.save')}}" method="post" enctype="multipart/form-data">
               @if ($errors->any())
            @foreach ($errors as $error)
                {{$error}}
            @endforeach                  
            @endif
            @csrf
            <div class="card-body table-responsive">
              <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputName1">{{__('Name permission')}}</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="exampleInputName1" placeholder="{{__('Enter Name')}}" required>
                  @error('name')
                      <div class="invalid-feedback">
                          {{$message }}
                      </div>
                  @enderror
              </div>
            </div>
            <!-- /.col -->          
          </div>
      
            </div>
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
            </div>
            </form>
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

<script>
</script> 