




<div class="form-body">
    
        <!-- Validation Errors -->
        <x-auth-validation-errors class="m-4" :errors="$errors" />
    <div class="row">

        <div class="card-body">
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label for="name">{{__('ID')}}</label>
                  <input type="text" class="form-control @error('type_username_id') is-invalid @enderror" name="type_username_id" value="{{ old('type_username_id', $user['type_username_id']) }}" id="type_username_id" placeholder="{{__('Enter ID')}}" >
                </div>

                <div class="form-group">
                  <label for="name">{{__('Full Name')}}</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user['name']) }}" id="name" placeholder="{{__('Enter Full Name')}}" >
                </div>



         
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">{{__('Email')}}</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user['email']) }}" id="email" placeholder="{{__('Enter Email')}}" >
                </div>

              <div class="form-group">
                <label>{{__('Type')}}</label>
                <select class="form-control  selectpicker @error('type') is-invalid @enderror" name="type"   data-selected-text-format="count" data-live-search="true">
                  <option>{{__('Nothing selected')}}</option>

                  <option value="0" >Student</option>
                  <option value="2" >Head Department</option>
                  <option value="3" >Dean Department</option>
                  <option value="4" >Academic Vice</option>

                </select>
              </div>
            </div>


              </div>          
            </div>
            <!-- /.row -->
          </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ $savelabel }}</button>
        </div>
    </div>
</div>
