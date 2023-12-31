<div class="row justify-content-center">
    <div class="col-md-12 col-lg-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Add new attandance session full day
                </div>
                <div class="btn-actions-pane-right">
                    <div class="nav">
                        <button type="submit" name="status" value="create"
                            class="border-0 btn-transition btn btn-outline-success">Buat</button>
                        <a href="{{ route('admin.users.view') }}"
                            class="border-0 btn-transition  btn btn-outline-danger">Cancel</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="card mb-3">
            <div class="card-body">
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" style="height:-webkit-fill-available; width: 50px;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- <div class="row mb-3">
                    <div class="col-md-3 d-flex align-items-center">
                        <label for="path" class="form-label fw-bolder mb-0">https://form.test/attend/</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="" class="form-control" id="">
                    </div>
                </div> --}}
                <div class="row mb-3">
                    <div class="col-md-3 d-flex align-items-center">
                        <label for="select-event" class="form-label fw-bolder mb-0">Pilih Acara : </label>
                    </div>
                    <div class="col-md-9">
                        <select name="selected_event" id="select-event" class="form-control-sm form-control">
                            @foreach ($links as $link)
                                <option value="{{ $link->link_path }}">{{ ucfirst($link->title) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 d-flex align-items-center">
                        <label for="input-date" class="form-label fw-bolder mb-0">Pilih Tanggal : </label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" name="date" id="input-date-1" format class="form-control-sm form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
