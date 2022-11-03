@extends('admin.layouts.app')
@section('title', 'Halaman Pengelola Link')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-diamond icon-gradient bg-strong-bliss">
                </i>
            </div>
            <div>Absensi Acara
                <div class="page-title-subheading">This is an attend panel that you can manage your attendances
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-md-center">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" style="height:-webkit-fill-available; width: 50px;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-md-11 col-lg-11">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Sesi Absensi
                </div>
                <div class="btn-actions-pane-right">
                    <div class="nav">
                        <div class="dropdown d-inline-block">
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dropdown-toggle btn btn-outline-success">Add Sesi Absensi</button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                <a href="{{route('admin.link.create')}}" tabindex="0" class="dropdown-item">Absensi Full Day</a>
                                <a href="{{route('admin.link.create.free')}}" tabindex="0" class="dropdown-item">Absensi Dalam Jam</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="data_users_side" class="mb-0 table display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="min-width: 150px;">Title</th>
                            <th style="min-width: 175px;">Link</th>
                            <th style="min-width: 100px;">Peserta</th>
                            <th style="min-width: 100px;">Kehadiran</th>
                            <th style="min-width: 100px;">Status</th>
                            <th style="min-width: 125px;">Options</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(function() {

    });
</script>
@endpush