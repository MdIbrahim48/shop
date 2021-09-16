@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Add Setting</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"> Form Controls</li>
              <li class="breadcrumb-item active"> Validation Forms</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
              {{-- <h4><a href="{{route('settings.index')}}" class="btn-primary pull-right" style="margin-right:5px">Setting List</a></h4>
           --}}
            <div class="card-body">
              <form action="{{route('settings.store')}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                  @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Decription</label>
                    <input class="form-control @error('description') is-invalid @enderror" name="description" value="{{$findData->description ??  old('description')}}" id="validationCustom01" type="text" placeholder="Enter Setting description" required="">
                    @error('description')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$findData->phone ?? old('phone')}}" id="phone" type="number" placeholder="Enter phone Number" required="">
                    @error('phone')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="fax">Fax</label>
                    <input class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{$findData->fax ?? old('fax')}}" id="fax" type="number" placeholder="Enter Fax Number" required="">
                    @error('fax')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{$findData->email ?? old('email')}}" id="email" type="email" placeholder="Enter email Number" required="">
                    @error('email')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="mobile">Mobile</label>
                    <input class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$findData->mobile ?? old('mobile')}}" id="mobile" type="number" placeholder="Enter mobile Number" required="">
                    @error('mobile')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="skype">Skype</label>
                    <input class="form-control @error('skype') is-invalid @enderror" name="skype" value="{{$findData->skype ?? old('skype')}}" id="skype" type="text" placeholder="Enter skype Number" required="">
                    @error('skype')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="copyright">Copyright</label>
                    <input class="form-control @error('copyright') is-invalid @enderror" name="copyright" value="{{$findData->copyright ?? old('copyright')}}" id="copyright" type="text" placeholder="Enter copyright" required="">
                    @error('copyright')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-8">
                    <label class="form-label" for="address">Setting Address</label>
                    <textarea name="address" id="address" cols="70" rows="" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Setting address">{{$findData->address ?? old('address')}}</textarea>
                    @error('address')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="icon">Setting Icon</label>
                    <input class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{old('icon')}}" id="icon" type="file" placeholder="Enter Setting Icon" required="">
                    <td>
                      @if ($findData->icon)
                      <img width="100" src='{{asset("images/setting/icon/".$findData->icon)}}' alt="{{$findData->icon}}">
                      @else
                          
                      @endif
                    </td>
                    @error('icon')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection