@extends('layouts.app')

@section('title', 'Membership Directory & Search | Pipavav Customs Brokers Association (PCBA)')
@section('meta_description', 'Search verified Customs Brokers and accredited member firms enrolled with Pipavav Customs Brokers Association (PCBA).')

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div class="container position-relative z-2">
        <div class="page-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <a href="{{ route('membership') }}">Membership</a>
            <i class="bi bi-chevron-right fs-8"></i>
            <span class="current">Membership Search</span>
        </div>
        <div class="badge-tagline">
            Official Directory • Accredited Member List • Port Pipavav
        </div>
        <h1 class="page-hero-title">Membership Search Directory</h1>
        <p class="page-hero-subtitle">
            Search active and registered Customs Broker members of the Pipavav Customs Brokers Association by keyword, firm name, city, or email.
        </p>
    </div>
</section>

<!-- MEMBERSHIP SEARCH DIRECTORY SECTION -->
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="max-w-950 mx-auto">
            
            <!-- Header Title Matching Reference -->
            <div class="mb-4">
                <h2 class="h3 fw-bold text-uppercase mb-3" style="color: #0b1a24; letter-spacing: 0.02em;">
                    MEMBERSHIP SEARCH
                </h2>
                
                <!-- Keyword search box matching reference design -->
                <div class="p-4 rounded-3 border mb-4" style="background: #fdfbf7; border-color: #e2d9cc !important;">
                    <label class="form-label small fw-semibold text-secondary mb-2">Keyword search</label>
                    <div class="d-flex flex-column flex-sm-row gap-2 max-w-500">
                        <input type="text" id="memberSearchInput" class="form-control rounded-2" placeholder="Search by firm name, city, email or phone..." style="border-color: #cbd5e1; max-width: 320px;">
                        <button type="button" id="memberSearchBtn" class="btn px-4 text-white fw-semibold rounded-2" style="background: #091724; border: 1px solid #091724; transition: all 0.2s ease;">
                            Submit
                        </button>
                        <button type="button" id="memberResetBtn" class="btn btn-outline-secondary px-3 rounded-2">
                            Reset
                        </button>
                    </div>
                    <div class="small text-muted mt-2" id="searchCountBadge">
                        Showing all registered member listings
                    </div>
                </div>
            </div>

            <!-- Member Directory Listings (Dynamic + Instant 2-Letter Search) -->
            <div class="member-directory-list" id="memberDirectoryList">
                @forelse($allMembers as $m)
                    <div class="member-entry py-4 border-bottom position-relative" data-keywords="{{ strtolower($m['company_name'] . ' ' . $m['city'] . ' ' . $m['email'] . ' ' . $m['mobile_no'] . ' ' . $m['address']) }}">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-1">
                            <h3 class="h5 fw-bold text-uppercase mb-0" style="color: #0b1a24;">
                                {{ $m['company_name'] }}
                            </h3>
                            @if(!empty($m['is_new']))
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 small">
                                    <i class="bi bi-patch-check-fill me-1"></i> Newly Enrolled Member
                                </span>
                            @else
                                <span class="badge bg-light text-secondary border px-2.5 py-1 small">
                                    <i class="bi bi-shield-check me-1 text-primary"></i> Registered Member
                                </span>
                            @endif
                        </div>
                        <p class="text-secondary small mb-3">{{ $m['address'] }}</p>
                        <div class="row g-2 member-meta small">
                            <div class="col-sm-4 text-secondary">City :</div>
                            <div class="col-sm-8 fw-semibold text-dark">{{ $m['city'] }}</div>
                            <div class="col-sm-4 text-secondary">Email ID :</div>
                            <div class="col-sm-8 text-primary">
                                <a href="mailto:{{ $m['email'] }}" class="text-primary text-decoration-none">{{ $m['email'] }}</a>
                            </div>
                            <div class="col-sm-4 text-secondary">Tel No :</div>
                            <div class="col-sm-8 text-dark">{{ $m['tel_no'] }}</div>
                            <div class="col-sm-4 text-secondary">Mobile No :</div>
                            <div class="col-sm-8 text-dark">{{ $m['mobile_no'] }}</div>
                            <div class="col-sm-4 text-secondary">Web URL :</div>
                            <div class="col-sm-8">
                                @if($m['web_url'] && $m['web_url'] !== 'NA')
                                    <a href="{{ str_starts_with($m['web_url'], 'http') ? $m['web_url'] : 'http://' . $m['web_url'] }}" target="_blank" rel="noopener" class="text-primary text-decoration-none">
                                        {{ $m['web_url'] }}
                                    </a>
                                @else
                                    <span class="text-muted">NA</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-5 text-center text-muted" id="noMembersFound">
                        <i class="bi bi-search fs-1 d-block mb-2"></i>
                        No registered members found.
                    </div>
                @endforelse
            </div>

            <div class="py-5 text-center text-muted d-none" id="emptySearchAlert">
                <i class="bi bi-building-exclamation fs-1 d-block mb-2 text-warning"></i>
                <h5 class="fw-bold text-dark">No matching members found</h5>
                <p class="small text-secondary mb-0">Try searching with a different firm name, city, or email address.</p>
            </div>

            <!-- Dynamic Pagination Bar -->
            <div class="mt-4 pt-3 d-flex flex-wrap align-items-center justify-content-between gap-3 border-top" id="paginationWrapper">
                <div class="d-flex align-items-center gap-3">
                    <div class="small text-muted" id="paginationInfo">
                        Showing 1 to 5 of {{ count($allMembers) }} members
                    </div>
                    <div class="d-flex align-items-center gap-1 small text-muted">
                        <label for="perPageSelect" class="form-label mb-0 small text-secondary">Per page:</label>
                        <select id="perPageSelect" class="form-select form-select-sm py-1 px-2 border-secondary-subtle" style="width: auto; font-size: 0.82rem;">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>
                <nav aria-label="Member search pagination">
                    <ul class="pagination pagination-sm mb-0" id="paginationNav">
                        <!-- Rendered dynamically -->
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</section>
@endsection

@section('extra_js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('memberSearchInput');
        const searchBtn = document.getElementById('memberSearchBtn');
        const resetBtn = document.getElementById('memberResetBtn');
        const countBadge = document.getElementById('searchCountBadge');
        const container = document.getElementById('memberDirectoryList');
        const emptyAlert = document.getElementById('emptySearchAlert');
        const paginationNav = document.getElementById('paginationNav');
        const paginationInfo = document.getElementById('paginationInfo');
        const paginationWrapper = document.getElementById('paginationWrapper');
        const perPageSelect = document.getElementById('perPageSelect');

        let currentPage = 1;
        let perPage = parseInt(perPageSelect ? perPageSelect.value : 5, 10);
        let totalPages = 1;
        let debounceTimer = null;

        if (perPageSelect) {
            perPageSelect.addEventListener('change', () => {
                perPage = parseInt(perPageSelect.value, 10);
                fetchMembersPage(1);
            });
        }

        function renderMembers(members, totalCount, page, totalP, query) {
            container.innerHTML = '';
            currentPage = page;
            totalPages = totalP;

            if (!members || members.length === 0) {
                emptyAlert.classList.remove('d-none');
                paginationWrapper.classList.add('d-none');
                countBadge.textContent = query ? `No members found matching "${query}"` : 'No members found.';
                return;
            }

            emptyAlert.classList.add('d-none');
            paginationWrapper.classList.remove('d-none');

            members.forEach(m => {
                const isNewBadge = m.is_new 
                    ? `<span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 small"><i class="bi bi-patch-check-fill me-1"></i> Newly Enrolled Member</span>`
                    : `<span class="badge bg-light text-secondary border px-2.5 py-1 small"><i class="bi bi-shield-check me-1 text-primary"></i> Registered Member</span>`;

                const webLink = (m.web_url && m.web_url !== 'NA')
                    ? `<a href="${m.web_url.startsWith('http') ? m.web_url : 'http://' + m.web_url}" target="_blank" rel="noopener" class="text-primary text-decoration-none">${m.web_url}</a>`
                    : `<span class="text-muted">NA</span>`;

                const entry = document.createElement('div');
                entry.className = 'member-entry py-4 border-bottom position-relative';
                entry.innerHTML = `
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-1">
                        <h3 class="h5 fw-bold text-uppercase mb-0" style="color: #0b1a24;">${m.company_name}</h3>
                        ${isNewBadge}
                    </div>
                    <p class="text-secondary small mb-3">${m.address}</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">${m.city}</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">
                            <a href="mailto:${m.email}" class="text-primary text-decoration-none">${m.email}</a>
                        </div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">${m.tel_no}</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">${m.mobile_no}</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8">${webLink}</div>
                    </div>
                `;
                container.appendChild(entry);
            });

            // Update Header Counter
            if (query && query.length >= 2) {
                countBadge.textContent = `Found ${totalCount} member firm${totalCount === 1 ? '' : 's'} matching "${query}"`;
            } else {
                countBadge.textContent = `Showing all registered member listings (${totalCount})`;
            }

            // Update Pagination Info
            const start = (page - 1) * perPage + 1;
            const end = Math.min(page * perPage, totalCount);
            paginationInfo.textContent = `Showing ${start} to ${end} of ${totalCount} members (Page ${page} of ${totalPages})`;

            renderPaginationControls(page, totalPages);
        }

        function renderPaginationControls(page, totalP) {
            paginationNav.innerHTML = '';
            if (totalP <= 1) {
                paginationWrapper.classList.add('d-none');
                return;
            }
            paginationWrapper.classList.remove('d-none');

            // Previous Button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${page === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `<button type="button" class="page-link" aria-label="Previous">&laquo; Prev</button>`;
            if (page > 1) {
                prevLi.querySelector('button').addEventListener('click', () => fetchMembersPage(page - 1));
            }
            paginationNav.appendChild(prevLi);

            // Page Numbers with smart ellipsis
            for (let i = 1; i <= totalP; i++) {
                if (i === 1 || i === totalP || (i >= page - 1 && i <= page + 1)) {
                    const li = document.createElement('li');
                    li.className = `page-item ${i === page ? 'active' : ''}`;
                    li.innerHTML = `<button type="button" class="page-link">${i}</button>`;
                    if (i !== page) {
                        li.querySelector('button').addEventListener('click', () => fetchMembersPage(i));
                    }
                    paginationNav.appendChild(li);
                } else if (i === page - 2 || i === page + 2) {
                    const dots = document.createElement('li');
                    dots.className = 'page-item disabled';
                    dots.innerHTML = `<span class="page-link">...</span>`;
                    paginationNav.appendChild(dots);
                }
            }

            // Next Button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${page === totalP ? 'disabled' : ''}`;
            nextLi.innerHTML = `<button type="button" class="page-link" aria-label="Next">Next &raquo;</button>`;
            if (page < totalP) {
                nextLi.querySelector('button').addEventListener('click', () => fetchMembersPage(page + 1));
            }
            paginationNav.appendChild(nextLi);
        }

        async function fetchMembersPage(targetPage = 1) {
            const query = (searchInput.value || '').trim();

            try {
                const res = await fetch(`{{ route('membership.search.query') }}?q=${encodeURIComponent(query)}&page=${targetPage}&per_page=${perPage}`);
                const data = await res.json();
                if (data.success) {
                    renderMembers(data.members, data.total, data.page, data.total_pages, query);
                    
                    // Smooth scroll back to search box if user clicked page
                    if (targetPage !== currentPage) {
                        const targetElem = document.getElementById('memberSearchInput') || container;
                        targetElem.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            } catch (err) {
                console.error('Search request failed:', err);
            }
        }

        // Live 2-Letter Instant Search
        searchInput.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            const val = searchInput.value.trim();

            if (val.length === 0) {
                fetchMembersPage(1);
            } else if (val.length >= 2) {
                countBadge.textContent = `Searching for "${val}"...`;
                debounceTimer = setTimeout(() => fetchMembersPage(1), 220);
            } else {
                countBadge.textContent = 'Type at least 2 letters to filter directory...';
            }
        });

        searchBtn.addEventListener('click', () => fetchMembersPage(1));
        searchInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                fetchMembersPage(1);
            }
        });

        resetBtn.addEventListener('click', () => {
            searchInput.value = '';
            fetchMembersPage(1);
        });

        // Initialize first page
        fetchMembersPage(1);
    });
</script>
@endsection
