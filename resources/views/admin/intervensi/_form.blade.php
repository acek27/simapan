<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ html()->label('Nama Kegiatan') }}
                    {{ html()->text('nama_kegiatan')->class('form-control')->required() }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ html()->label('Tanggal') }}
                    {{ html()->date('tanggal')->class('form-control')->value(date('Y-m-d'))->required()}}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ html()->label('Upload Gambar') }}
            @error('path.*')
            <div class="alert alert-danger">{{ 'Periksa kembali ukuran file.' }}</div>
            @enderror
            {{ html()->file('path[]')->class('form-control dropzone')->multiple()->id('images')->acceptImage()->required()}}
        </div>
        <div class="form-group">
            <div id="image_preview" style="width:100%;">

            </div>
        </div>
        <input type="submit" class="btn ripple btn-main-primary btn-block" value="Simpan">
    </div>
</div>
