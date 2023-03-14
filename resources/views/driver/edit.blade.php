@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection
@section('page-header')
@endsection
@section('content')
        <form action="{{ route('driver.update',$driver->id) }}" method="post" enctype="multipart/form-data">
            @csrf
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Edit {{ $driver->name }} Information</h6>
								</div>
									{{-- Erorr message --}}
									@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
                                <div>
                                    <input type="Text" required class="form-control my-3" value="{{ $driver->name }}" name="name" placeholder="Driver name">
                                    <input type="Text" required class="form-control my-3" value="{{ $driver->phone }}" name="phone" placeholder="Driver phone">
                                    <input type="Text" required class="form-control my-3" value="{{ $driver->national_id }}" name="national" placeholder="national ID">
                                    <input type="Text" required class="form-control my-3" value="{{ $driver->license_id }}" name="license" placeholder="License ID">
                                    <select name="bus" required class="form-control my-3" id="cars">
                                        <option >Select driver's Bus</option>
                                        <option selected  value="{{ $driver->bus_id }}" > {{ $driver->bus->bus_license }}</option>
                                        @foreach ($buses as $bus )
                                        <option  value="{{ $bus->id }}" > {{ $bus->bus_license }}</option>
                                        @endforeach

                                      </select>
                                </div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
                                <div class="col-sm-12 col-md-4">
                                    <input type="file" name="image" class="dropify" data-height="200" />
                                </div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-sm-4 col-md-2 mg-t-10 mg-md-t-0 rounded d-flex justify-content-start">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
                        </form>

				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@endsection