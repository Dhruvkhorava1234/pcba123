@extends('layouts.app')

@section('title', 'Photo & Media Gallery | Pipavav Customs Brokers Association (PCBA)')
@section('meta_description', 'Explore photo albums and media gallery of Pipavav Customs Brokers Association (PCBA), trade facilitation meetings, port training sessions, delegations, and association milestones.')

@section('extra_css')
<style>
    /* Gallery Folder & Card Styles */
    .folder-card {
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid #e2e8f0;
        background: #ffffff;
    }
    .folder-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(9, 23, 36, 0.12) !important;
        border-color: #0b2530;
    }
    .folder-card.active-folder {
        border-color: #0b2530;
        background: #f0f7ff;
        box-shadow: 0 0 0 2px #0b2530;
    }
    .gallery-img-card {
        cursor: pointer;
        transition: transform 0.28s ease, box-shadow 0.28s ease;
        position: relative;
    }
    .gallery-img-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(9, 23, 36, 0.14) !important;
    }
    .gallery-img-card:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(9, 23, 36, 0.65);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.25s ease;
        color: #fff;
    }
    .gallery-overlay-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 8px;
        transition: transform 0.2s ease;
    }
    .gallery-img-card:hover .gallery-overlay-icon {
        transform: scale(1.1);
    }

    /* Lightbox Modal custom design */
    #galleryLightboxModal .modal-content {
        background-color: rgba(9, 23, 36, 0.96);
        border: none;
        backdrop-filter: blur(10px);
    }
    #galleryLightboxModal .btn-lightbox-nav {
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
        border: none;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        transition: all 0.2s ease;
    }
    #galleryLightboxModal .btn-lightbox-nav:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: scale(1.1);
        color: #ffffff;
    }
    #lightboxImage {
        max-height: 75vh;
        max-width: 100%;
        object-fit: contain;
        border-radius: 6px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    }
</style>
@endsection

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container-fluid px-3 px-md-4 px-xl-5 position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Gallery</span>
        </div>
        <div class="badge-tagline">
            Moments • Milestones • Port Engagements • Trade Facilitation
        </div>
        <h1 class="page-hero-title">Photo & Event Gallery</h1>
        <p class="page-hero-subtitle">
            Visual documentation of PCBA initiatives, port training workshops, Customs interaction seminars, and executive delegations at Pipavav Port, Gujarat.
        </p>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-5 bg-white">
    <div class="container-fluid px-3 px-md-4 px-xl-5 py-2">
        
        <!-- FOLDERS / ALBUMS SHELF -->
        @if(isset($folders) && $folders->count() > 0)
        <div class="mb-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <div>
                    <h3 class="h5 fw-bold text-dark mb-1">
                        <i class="bi bi-folder2-open text-warning me-2"></i>Photo Albums & Folders
                    </h3>
                    <p class="text-secondary small mb-0">Select an album folder to view its collection, or browse all photos below.</p>
                </div>
                <div class="text-muted small">
                    Showing {{ $folders->count() }} albums
                </div>
            </div>

            <div class="row g-3">
                <!-- "All Photos" Folder card -->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 rounded-3 shadow-sm p-3 folder-card active-folder" onclick="filterByFolder('all', this)">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: #091724; color: #fff;">
                                <i class="bi bi-grid-fill fs-4"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-bold text-dark mb-0 text-truncate">All Photos</h6>
                                <span class="badge bg-secondary-subtle text-secondary small">{{ $galleryImages->count() }} Photos</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin-created folders -->
                @foreach($folders as $folder)
                    @php
                        $cover = $folder->effective_cover;
                        $coverSrc = $cover ? asset($cover) : null;
                    @endphp
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 rounded-3 shadow-sm p-3 folder-card" onclick="filterByFolder('{{ $folder->id }}', this)">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 d-flex align-items-center justify-content-center overflow-hidden position-relative" style="width: 50px; height: 50px; background: #fef3c7; color: #b45309; flex-shrink: 0;">
                                    @if($coverSrc)
                                        <img src="{{ $coverSrc }}" class="w-100 h-100 object-fit-cover" alt="{{ $folder->name }}">
                                    @else
                                        <i class="bi bi-folder-fill fs-4"></i>
                                    @endif
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="fw-bold text-dark mb-0 text-truncate" title="{{ $folder->name }}">{{ $folder->name }}</h6>
                                    <span class="badge bg-warning-subtle text-warning-emphasis small">{{ $folder->images_count }} {{ Str::plural('Photo', $folder->images_count) }}</span>
                                </div>
                            </div>
                            @if($folder->description)
                                <p class="text-secondary small mt-2 mb-0 text-truncate" style="font-size: 0.78rem;">
                                    {{ $folder->description }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Active Folder indicator & Photo count -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4 pt-3 border-top">
            <div id="activeFolderBadge" class="fw-bold text-dark fs-6 d-flex align-items-center">
                <i class="bi bi-images text-primary me-2"></i>
                <span id="activeFolderLabel">All Photos</span>
                <span class="badge bg-light text-dark border ms-2" id="visiblePhotosCount">{{ $galleryImages->count() }} photos</span>
            </div>
            <div class="text-muted small">
                Click any photo to open full-screen preview
            </div>
        </div>

        <!-- Dynamic Gallery Grid -->
        <div class="row g-4" id="galleryGrid">
            @forelse($galleryImages as $index => $img)
                @php
                    $imageSrc = asset($img->image_path);
                    $folderId = $img->folder_id ? (string)$img->folder_id : 'unassigned';
                    $folderName = $img->folder ? $img->folder->name : 'PCBA Gallery';
                @endphp
                <div class="col-md-6 col-lg-4 gallery-item" 
                     data-folder="{{ $folderId }}"
                     data-index="{{ $index }}">
                    <div class="card h-100 border-0 rounded-3 overflow-hidden shadow-sm gallery-img-card"
                         onclick="openLightbox({{ $index }})">
                        <div class="position-relative overflow-hidden" style="height: 270px; background: #091724;">
                            <img src="{{ $imageSrc }}" alt="{{ $img->title }}" class="w-100 h-100 object-fit-cover transition-transform" style="object-position: top center;">
                            
                            @if($img->folder)
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-dark bg-opacity-75 text-white fs-8 shadow-sm">
                                        <i class="bi bi-folder-fill text-warning me-1"></i>{{ $img->folder->name }}
                                    </span>
                                </div>
                            @endif

                            <!-- Hover Overlay -->
                            <div class="gallery-overlay">
                                <div class="gallery-overlay-icon">
                                    <i class="bi bi-zoom-in"></i>
                                </div>
                                <span class="small fw-semibold">Click to preview</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted" id="emptyGalleryMessage">
                    <i class="bi bi-images fs-1 d-block mb-2"></i>
                    No gallery images currently uploaded.
                </div>
            @endforelse

            <div class="col-12 text-center py-5 text-muted d-none" id="noFilterResultsMessage">
                <i class="bi bi-camera fs-1 d-block mb-2"></i>
                No photographs found in this folder.
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="mt-5 p-4 rounded-3 text-center border" style="background: #fdfbf7; border-color: #e2d9cc !important;">
            <h4 class="fw-bold text-dark mb-2">Have photos or event updates to share?</h4>
            <p class="text-secondary small max-w-600 mx-auto mb-3">
                Member firms and participants may submit official high-resolution event photographs to the PCBA Secretariat for inclusion in the official media archives.
            </p>
            <a href="{{ route('contact') }}" class="btn-pcba-primary py-2 px-4 fs-7 text-decoration-none">
                <i class="bi bi-envelope me-1"></i> Contact Secretariat
            </a>
        </div>

    </div>
</section>

<!-- Fullscreen Lightbox Modal -->
<div class="modal fade" id="galleryLightboxModal" tabindex="-1" aria-labelledby="galleryLightboxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content d-flex flex-column justify-content-between p-3 p-md-4">
            <!-- Modal Header -->
            <div class="d-flex justify-content-between align-items-center text-white mb-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-warning text-dark px-3 py-1.5 fw-bold" id="lightboxBadge">Gallery</span>
                    <span class="text-white-50 small" id="lightboxCounter">1 / 1</span>
                </div>
                <button type="button" class="btn btn-link text-white fs-3 p-0 text-decoration-none" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <!-- Main Image Viewport with Previous & Next Navigation -->
            <div class="d-flex align-items-center justify-content-between position-relative flex-grow-1 overflow-hidden">
                <button type="button" class="btn-lightbox-nav me-2" onclick="prevLightboxImage()" aria-label="Previous Image">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <div class="flex-grow-1 d-flex justify-content-center align-items-center text-center p-2">
                    <img id="lightboxImage" src="" alt="Gallery Preview">
                </div>

                <button type="button" class="btn-lightbox-nav ms-2" onclick="nextLightboxImage()" aria-label="Next Image">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

            <!-- Footer Caption & Details -->
            <div class="text-center text-white pt-2 border-top border-secondary">
                <h5 class="fw-bold mb-1" id="lightboxTitle">Photo Title</h5>
                <p class="text-white-50 small mb-0 max-w-600 mx-auto" id="lightboxDescription">Official PCBA photo archive</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_js')
<script>
    // Gallery Items Data for Lightbox
    const galleryItemsData = [
        @foreach($galleryImages as $img)
        {
            title: @json($img->folder ? $img->folder->name : 'PCBA Gallery'),
            description: @json($img->description ?? ''),
            imageSrc: @json(asset($img->image_path)),
            folderId: @json($img->folder_id ? (string)$img->folder_id : 'unassigned'),
            folderName: @json($img->folder ? $img->folder->name : 'PCBA Gallery')
        },
        @endforeach
    ];

    let currentVisibleIndices = [];
    let currentLightboxPos = 0;
    let selectedFolder = 'all';

    function updateVisibleItems() {
        const items = document.querySelectorAll('.gallery-item');
        currentVisibleIndices = [];
        let count = 0;

        items.forEach(item => {
            const itemFolder = item.getAttribute('data-folder');
            const index = parseInt(item.getAttribute('data-index'), 10);

            const matchesFolder = (selectedFolder === 'all' || itemFolder === selectedFolder);

            if (matchesFolder) {
                item.style.display = 'block';
                currentVisibleIndices.push(index);
                count++;
            } else {
                item.style.display = 'none';
            }
        });

        const counterEl = document.getElementById('visiblePhotosCount');
        if (counterEl) {
            counterEl.innerText = count + ' ' + (count === 1 ? 'photo' : 'photos');
        }

        const noResults = document.getElementById('noFilterResultsMessage');
        if (noResults) {
            if (count === 0 && items.length > 0) {
                noResults.classList.remove('d-none');
            } else {
                noResults.classList.add('d-none');
            }
        }
    }

    function filterByFolder(folderId, cardEl) {
        selectedFolder = folderId;

        document.querySelectorAll('.folder-card').forEach(c => c.classList.remove('active-folder'));
        if (cardEl) {
            cardEl.classList.add('active-folder');
        }

        const folderLabel = cardEl ? cardEl.querySelector('h6').innerText : 'All Photos';
        const labelEl = document.getElementById('activeFolderLabel');
        if (labelEl) {
            labelEl.innerText = folderLabel;
        }

        updateVisibleItems();
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Initialize visibility list
        updateVisibleItems();

        // Keyboard navigation for lightbox
        document.addEventListener('keydown', (e) => {
            const modal = document.getElementById('galleryLightboxModal');
            if (modal && modal.classList.contains('show')) {
                if (e.key === 'ArrowLeft') {
                    prevLightboxImage();
                } else if (e.key === 'ArrowRight') {
                    nextLightboxImage();
                }
            }
        });
    });

    // Lightbox Open & Navigation Functions
    function openLightbox(originalIndex) {
        if (!galleryItemsData.length) return;

        // Position in current visible array
        const pos = currentVisibleIndices.indexOf(originalIndex);
        currentLightboxPos = pos !== -1 ? pos : 0;

        renderLightboxItem();

        const myModal = new bootstrap.Modal(document.getElementById('galleryLightboxModal'));
        myModal.show();
    }

    function renderLightboxItem() {
        if (!currentVisibleIndices.length) return;

        const dataIndex = currentVisibleIndices[currentLightboxPos];
        const item = galleryItemsData[dataIndex];

        document.getElementById('lightboxImage').src = item.imageSrc;
        document.getElementById('lightboxTitle').innerText = item.folderName;
        document.getElementById('lightboxDescription').innerText = item.description || 'Official Pipavav Customs Brokers Association photo.';
        document.getElementById('lightboxBadge').innerText = item.folderName;
        document.getElementById('lightboxCounter').innerText = `${currentLightboxPos + 1} / ${currentVisibleIndices.length}`;
    }

    function nextLightboxImage() {
        if (!currentVisibleIndices.length) return;
        currentLightboxPos = (currentLightboxPos + 1) % currentVisibleIndices.length;
        renderLightboxItem();
    }

    function prevLightboxImage() {
        if (!currentVisibleIndices.length) return;
        currentLightboxPos = (currentLightboxPos - 1 + currentVisibleIndices.length) % currentVisibleIndices.length;
        renderLightboxItem();
    }
</script>
@endsection

