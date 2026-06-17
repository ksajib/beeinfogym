 <div>
     <section id="gallery" class="section-pad" style="background: var(--dark)">
         <div class="container px-0">
             <div class="text-center mx-auto mb-5" style="max-width: 560px">
                 <div class="cheadline cheadline-center">Inside Our Gym</div>
                 <h2 class="section-title text-light">Gym life in action</h2>
             </div>
             <div class="row g-4">
                 <div class="col-md-12">
                     <div class="masonry-gallery">

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/01.jpg') }}" alt="01">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/02.jpg') }}" alt="02">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/03.jpg') }}" alt="03">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/04.jpg') }}" alt="04">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/05.jpg') }}" alt="05">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/06.jpg') }}" alt="06">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/07.jpg') }}" alt="07">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/08.jpg') }}" alt="08">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/09.jpg') }}" alt="09">
                         </div>

                         <div class="masonry-item">
                             <img src="{{ asset('images/gallery/10.jpg') }}" alt="10">
                         </div>

                     </div>
                     <div id="mobileGalleryCarousel" class="carousel slide d-md-none" data-bs-ride="false">

                         <div class="carousel-inner rounded-1 overflow-hidden">

                             <div class="carousel-item active">
                                 <img src="{{ asset('images/gallery/01.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="01">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/02.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="02">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/03.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="03">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/04.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="04">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/05.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="05">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/06.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="06">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/07.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="07">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/08.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="08">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/09.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="09">
                             </div>

                             <div class="carousel-item">
                                 <img src="{{ asset('images/gallery/10.jpg') }}"
                                     class="d-block w-100 gallery-preview" alt="10">
                             </div>

                         </div>

                         <!-- LEFT ARROW -->
                         <button class="carousel-control-prev" type="button" data-bs-target="#mobileGalleryCarousel"
                             data-bs-slide="prev">
                             <i class="bi bi-arrow-left-short"></i>
                         </button>

                         <!-- RIGHT ARROW -->
                         <button class="carousel-control-next" type="button" data-bs-target="#mobileGalleryCarousel"
                             data-bs-slide="next">
                             <i class="bi bi-arrow-right-short"></i>
                         </button>

                     </div>
                 </div>
             </div>
         </div>
     </section>

     <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-md">
             <div class="modal-content border-0 bg-transparent">

                 <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3"
                     data-bs-dismiss="modal" aria-label="Close"></button>

                 <div class="modal-body p-0">
                     <img id="modalImage" class="preview-image" src="" alt="Preview">
                 </div>
             </div>
         </div>
     </div>

     
 </div>
