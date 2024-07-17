<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="">
        <div class="form-group">
            {{ html()->label('Nama Peraturan') }}
            {{ html()->text('nama_peraturan')->class('form-control')->required() }}
        </div>
        <div class="form-group">
            {{ html()->label('Jenis Peraturan') }}
            {{ html()->select('jenis_id')->options($jenis)->class('form-control')->required()->placeholder('-- Pilih jenis peraturan --')}}
        </div>
        <div class="form-group">
            {{ html()->label('Nomor') }}
            {{ html()->text('nomor')->class('form-control')->required() }}
        </div>
        <div class="form-group">
            {{ html()->label('Tentang') }}
            {{ html()->textarea('tentang')->class('form-control')->required()->required() }}
        </div>
        <div class="form-group">
            {{ html()->label('Tanggal Ditetapkan') }}
            {{ html()->date('tanggal_penetapan')->class('form-control')->value(date('Y-m-d'))->required()}}
        </div>
        <div class="form-group">
            {{ html()->label('Upload Dokumen') }}
            {{ html()->file('path')->class('form-control')->accept('.pdf')->required()}}
        </div>
        <button class="btn ripple btn-main-primary btn-block">Submit</button>
    </div>
</div>
