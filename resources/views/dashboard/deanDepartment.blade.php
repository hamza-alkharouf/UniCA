<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $page_title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ $page_title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-city"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">{{__('Number of Departments')}}</span>
                      <span class="info-box-number">{{$count_department}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">{{__('Number of User in college')}}</span>
                      <span class="info-box-number">{{$count_all_users_college}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
              </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('All Complaint') }}</h3>

                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <select class="form-control" name="forma" onchange="location = this.value;">
                                    <option @if (Request::is('/complaints/details/defult')) selected @endif
                                        value="{{ route('complaints.details.index') }}">{{ __('Defult') }}
                                    </option>
                                    <option @if (Request::is('complaints/details/group')) selected @endif
                                        value="{{ route('complaints.details.group') }}">{{ __('Group') }}
                                    </option>
                                    <option @if (Request::is('complaints/details/complaintForStudent')) selected @endif
                                        value="{{ route('complaints.details.complaintForStudent') }}">
                                        {{ __('complaintForStudent') }}</option>
                                </select>
                            </div>
                        </div>
                        <x-auth-validation-errors class="m-4" :errors="$errors" />

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Name Student') }}</th>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Type') }}</th>
                                        <th>{{ __('Course Number') }}</th>
                                        <th>{{ __('Section') }}</th>
                                        <th>{{ __('Course Name') }}</th>
                                        <th>{{ __('Teacher Name') }}</th>
                                        <th>{{ __('Days') }}</th>
                                        <th>{{ __('Hour') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($complaintsForms as $complaintsForm)
                                        <tr>
                                            <td>
                                                <a class="font-weight-bold">
                                                    {{ $complaintsForm['id'] }}
                                                </a>
                                            </td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm->user->name }}</span></td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm->user->type_username_id }}</span></td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm['type'] }}</span></td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm['course_number'] }}</span></td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm['section'] }}</span></td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm['course_name'] }}</span></td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm['teacher_name'] }}</span></td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm['days'] }}</span></td>
                                            <td><span class="font-weight-normal">
                                                    {{ $complaintsForm['hour'] }}</span></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('complaints.details.complaintResolvedDefult', $complaintsForm['id']) }}"
                                                    type="button" class="btn btn-success m-1"
                                                    style="font-size:13px">{{ __('Resolved') }}</a>
                                                    <a 
                                                    type="button" class="btn btn-danger m-1"  data-toggle="modal" data-target="#modal-default-{{ $complaintsForm['id'] }}"style="font-size:13px">{{ __('Decline') }}</a>
                                                    @if (Auth::user()->type != 'deanDepartment')
                                                    <a href="{{ route('complaints.details.complaintDeanDepartmentDefult', $complaintsForm['id']) }}"
                                                        type="button" class="btn btn-primary m-1"
                                                        style="font-size:13px">{{ __('Dean department') }}</a>
                                                    @endif 
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">
                                                {{ __('No Complaints Found.') }}
                                            </td>
                                        </tr>
                                    @endforelse
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
    
    @forelse ($complaintsForms as $complaintsForm)
    <div class="modal fade" id="modal-default-{{ $complaintsForm['id'] }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{ __('Decline Order') }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>{{ __('Name Student') }} : {{ $complaintsForm->user->name }}</p>
              <p>{{ __('ID') }} : {{ $complaintsForm->user->type_username_id }}</p>
              <p>{{ __('Type') }} : {{ $complaintsForm['type'] }}</p>
              <p>{{ __('Course Number') }} : {{ $complaintsForm['course_number'] }}</p>
              <p>{{ __('Section') }} : {{ $complaintsForm['section'] }}</p>
              <p>{{ __('Course Name') }} : {{ $complaintsForm['course_name'] }}</p>
              <p>{{ __('Teacher Name') }} : {{ $complaintsForm['teacher_name'] }}</p>
              <p>{{ __('Days') }} : {{ $complaintsForm['days'] }}</p>
              <p>{{ __('Hour') }} : {{ $complaintsForm['hour'] }}</p>

              <form action="{{ route('complaints.details.complaintDeclineDefult', $complaintsForm['id']) }}" method="post">
                @csrf
    
                <div class="form-group">
                    <label>{{ __('Notes') }}</label>
                    <textarea class="form-control" rows="3" name="notes" placeholder="{{ __('Enter Your Notes') }}"></textarea>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button  type="submit"  class="btn btn-danger">{{ __('Decline') }}</button>

                  </div>
                </form>
            </div>
    
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- /.modal --> 
      @empty

  @endforelse
    <!-- /.content -->

</div>


