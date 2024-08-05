<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="">
        <div class="form-group">
            {{ html()->label('Keterangan') }}
            {{ html()->text('keterangan')->class('form-control')->required() }}
        </div>
        <div class="form-group">
            {{ html()->label('Periode') }}
            {{ html()->select('periode')->options(['1' => 'Satu', '2' => 'Dua'])->class('form-control')->required()->placeholder('-- Pilih Periode --')}}
        </div>
        <div class="form-group">
            {{ html()->label('Tanggal Diterbitkan') }}
            {{ html()->date('tahun')->class('form-control')->value(date('Y-m-d'))->required()}}
        </div>
        <div class="form-group">
            {{ html()->label('Upload Dokumen') }}
            {{ html()->file('path')->class('form-control')->acceptImage()}}
        </div>
        <button class="btn ripple btn-main-primary btn-block">Submit</button>
    </div>
</div>
