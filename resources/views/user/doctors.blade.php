  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp text-4xl">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @php
            function getImageUrl($image) {
                if(str_starts_with($image, 'http')) {
                    return $image;
                }
                return asset('storage/uploads') . '/' . $image;
            }
        @endphp

        @foreach ($doctors as $doctor)
        <div class="item">
            <div class="card-doctor">
                <div class="header">
                    <img src="{{ getImageUrl($doctor->docimage) }}" alt="">
                    <div class="meta">
                        <a href="tel:{{ $doctor->phone }}"><span class="mai-call"></span></a>
                        <a href="https://wa.me/{{ $doctor->phone }}"><span class="mai-logo-whatsapp"></span></a>
                    </div>
                </div>
                <div class="body min-h-110">
                    <p class="text-xl mb-0">Dr. {{ $doctor->name }}</p>
                    <span class="text-sm text-grey">{{ $doctor->name }}</span>
                </div>
            </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
