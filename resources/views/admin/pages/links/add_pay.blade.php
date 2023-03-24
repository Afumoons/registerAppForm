@extends('admin.layouts.app')
@section('title', 'Menambah Link Event Baru - Berbayar')
@section('content')
<div class="container">
    <form action="{{ route('admin.link.store') }}" method="POST">
        @csrf
        <input type="hidden" name="event_type" value="pay">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                        Form Pendaftaran Customisasi
                    </div>
                    <div class="btn-actions-pane-right">
                        <div class="nav">
                            <button type="submit" name="status" value="1" class="border-0 btn-transition btn btn-outline-success">Save</button>
                            <a href="{{ route('admin.link.view') }}" class="border-0 btn-transition  btn btn-outline-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>                
        <div class="col-md-8">            
                <div class="card mb-3">
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <textarea required name="desc" placeholder="deskripsi acara" class="my-editor form-control" id="my-editor-3" cols="30" rows="10">{!!old('desc')!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Infomarsi Acara</label>
                            <textarea required name="registration_info" placeholder="informasi acara" class="my-editor form-control" id="my-editor-4" cols="30" rows="10">{!!old('registration_info')!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Pesan Email Permintaan Pembayaran</label>
                            <textarea required name="email_confirmation" placeholder="isikan pesan email yang dikirim untuk pemberitahuan upload bayar" class="my-editor form-control" id="my-editor-1" cols="30" rows="5">{!!old('email_confirmation')!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Pesan Email Pembayaran Terkonfirmasi</label>
                            <textarea required name="email_confirmed" placeholder="isikan pesan email yang dikirim untuk pemberitahuan upload bayar" class="my-editor form-control" id="my-editor-2" cols="30" rows="5">{!!old('email_confirmed')!!}</textarea>
                        </div>
                    </div>                    
                </div>                              
        </div>
        <div class="col-md-4"> 
            <div class="card mb-3 d-flex flex-column feature-img">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">                        
                        Banner
                    </div>                    
                </div> 
                <div class="col-auto align-self-center my-2">
                    <div class="fileinput-new thumbnail" id="holder" style="max-width: 200px; max-height: 150px;">
                        <img id="previewimg_thumb" src="{{ asset('/images/default/no-image.png') }}" alt="" />
                    </div>
                  </div>
                  <div class="col p-4">
                    <div class="input-group">
                        <span class="input-group-btn">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="filepath">
                      </div>
                </div> 
            </div>
            <!--begin:: kuota-->
            <div class="card mb-3 d-flex flex-column">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        Batas Kuota Pendaftar (Opsional)
                    </div>
                </div>
                <div class="col-auto align-self-center my-2">
                    <div class="form-group">
                        <input type='number' min="0" name="member_limit" value="{{ old('member_limit') }}"
                            required class="form-control" id='member-limit'>
                        <small class="form-text text-muted">Beri angka 0, apabila tidak ada batasan</small>
                    </div>
                </div>
            </div>
            <!--end:: kuota-->
            <div class="card mb-3 d-flex flex-column">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        Tanggal Pendaftaran Dibuka
                    </div>
                </div>
                <div class="col-auto align-self-center my-2">
                    <div class="form-group">
                        <input type='text' name="open_date" value="{{old('open_date')}}" required class="form-control" id='datepicker-1' placeholder="dd-mm-yy">
                    </div>
                </div>
            </div>
            <div class="card mb-3 d-flex flex-column">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        Tanggal Pendaftaran Ditutup
                    </div>
                </div>
                <div class="col-auto align-self-center my-2">
                    <div class="form-group">
                        <input type='text' name="close_date" value="{{old('close_date')}}" required class="form-control" id='datepicker-2' placeholder="dd-mm-yy">
                    </div>
                </div>
            </div>
        </div>        
    </div>
    </form>
</div>     
@endsection

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script type="text/javascript">
    $('#lfm').filemanager('image');
    $(document).ready(function(){
        $('#datepicker-1').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('#datepicker-2').datepicker({
            format: 'dd-mm-yyyy'
        });
    });
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('my-editor-1', options);
    CKEDITOR.replace('my-editor-2', options);
    CKEDITOR.replace('my-editor-3', options);
    CKEDITOR.replace('my-editor-4', options);
</script>
@endpush