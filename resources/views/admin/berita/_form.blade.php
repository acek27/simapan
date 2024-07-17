<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="">
        <div class="form-group">
            {{ html()->label('Judul') }}
            {{ html()->text('title')->class('form-control')->required() }}
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {{ html()->label('Kategori') }}
                    {{ html()->select('category_id')->options($kategori)->class('form-control')->required()}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ html()->label('Tanggal') }}
                    {{ html()->date('date')->class('form-control')->value(date('Y-m-d'))->required()}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ html()->label('Penyunting') }}
                    {{ html()->text('editor')->class('form-control')->required()}}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ html()->label('Upload Gambar') }}
            {{ html()->file('path')->class('form-control dropify')->acceptImage()}}
        </div>
        <div class="form-group">
            {{ html()->label('Konten') }}
            {{ html()->textarea('content')->class('form-control')->required()->id('content')->required() }}
        </div>

        <button class="btn ripple btn-main-primary btn-block">Submit</button>
    </div>
</div>
