@extends('layouts.master')

@section('content')
 <!-- ======= Gallery Section ======= -->
 <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Yayasan Rumah Sehat Insani Jombang</h2>
          <p>
          <b>Yayasan Rumah Sehat Insani Jombang</b> adalah wadah aspirasi pada terapis dan dokter nusantara. Membuka pengajaran untuk umum semua metode ilmu terapi (Holistic), pendidikan formal dan non formal. memiliki tempat konsultasi dan kesehatan keluarga dan menjual obat herbal dan alat-alat terapi. YARSI membuka pelayanan terapi pengobatan fisik, psikis, dan non medis.

          </p>
        </div>

        <div class="owl-carousel gallery-carousel" data-aos="fade-up" data-aos-delay="100">
        <a href="{{asset('img/1.jpg') }}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('img/1.jpg') }}" alt=""></a>
          <a href="{{asset('img/2.jpg') }}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('img/2.jpg') }}"   alt=""></a>
          <a href="{{asset('img/3.jpg') }}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('img/3.jpg') }}" alt=""></a>
          <a href="{{asset('img/1.jpg') }}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('img/1.jpg') }}" alt=""></a>
          <a href="{{asset('img/2.jpg') }}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('img/2.jpg') }}" alt=""></a>
          <a href="{{asset('img/3.jpg') }}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('img/3.jpg') }}" alt=""></a>
        </div>

      </div>
    </section><!-- End Gallery Section -->
@endsection