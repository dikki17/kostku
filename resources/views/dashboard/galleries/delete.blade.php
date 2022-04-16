@extends('dashboard.layouts.main')

@section('container')

    <div class="row" style="color: #15adcc">
        <div class="col">
            <h1>Delete Gallery for
                @foreach ($kost_name as $name)
                    {{ $name }}
                @endforeach
            </h1>
        </div>
    </div>
    
    <div class="row text-center mt-3">
        <div class="col">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                <!-- Slides -->
                    @foreach ($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ $image->url }}" alt="{{ $image->url }}" class="img-fluid" width="700">

                        <div class="row">
                            <div class="col">
                                <form action="/dashboard/galleries/{{ $image->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf

                                    <input type="hidden" name="kost_id" value="{{ $image->kost_id }}">
                                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                                    <input type="hidden" name="image_url" value="{{ $image->url }}">
        
                                    <button class="btn btn-danger border-0 mt-5" onclick="return confirm('Apakah kamu yakin ingin menghapus gambar ini?')">Delete Image</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination mb-5"></div>
            
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev" style="color: #15adcc"></div>
                <div class="swiper-button-next" style="color: #15adcc"></div>
            </div>
        </div>
    </div>
@endsection