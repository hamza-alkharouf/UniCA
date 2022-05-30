
<link href ="/assets/css/app.css" rel = "stylesheet">

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
                                        <li class="breadcrumb-item"><a href="{{route('admin.universities.index')}}">{{__('University')}}</a></li>
                                        <li class="breadcrumb-item active">{{$page_title}}</li>
                                      </ol>
                                    </div>
                                  </div>
                                </div><!-- /.container-fluid -->
                              </section>
                              <!-- Main content -->
                              <section class="content">
                                <div class="container-fluid">
                                  <div class="card card-default">
                                    <div class="card-header">
                                      <div class="card-tools">
                                          <!-- Collapse Button -->
                                          <a href="{{route('admin.universities.index')}}" class="btn btn-block btn-outline-secondary">{{__('back')}}</a>
                                      </div>
                                    </div>
                                

                                    <form action="{{ route('admin.universities.update'  , $university['id']) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
    
                                    @include('admin.universities._form',[
                                    'savelabel' => 'edit'
                                    ])
                                </form>
                                  </div>
                                </div>
                              </section>
                            </div>