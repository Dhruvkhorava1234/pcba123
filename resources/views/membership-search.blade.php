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

            <!-- Member Directory Listings (Matching layout from your screenshot) -->
            <div class="member-directory-list" id="memberDirectoryList">

                <!-- 1. A B GLOBAL SHIPPING AND LOGISTICS LLP -->
                <div class="member-entry py-4 border-bottom" data-keywords="a b global shipping and logistics llp gandhidham exim.abglobal@gmail.com 9874047265">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">A B GLOBAL SHIPPING AND LOGISTICS LLP</h3>
                    <p class="text-secondary small mb-3">2nd Floor,Office No. 211, Plot No. 83, Rishabh Arcade, Sector 8, Gandhidham, Kachchh, Gujarat, 370201</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">GANDHIDHAM</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">exim.abglobal@gmail.com</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">9874047265</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">9874047265</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8 text-muted">NA</div>
                    </div>
                </div>

                <!-- 2. A B LOGISTICS -->
                <div class="member-entry py-4 border-bottom" data-keywords="a b logistics gandhidham sohan@ablogistics.in 912836232278 9825239223">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">A B LOGISTICS</h3>
                    <p class="text-secondary small mb-3">208, 2ND FLOOR, DENA BANK BUILDING, NIRAV CHAMBERS,SECTOR 1/A BANKING CIRCLE/ 370201 NULL</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">GANDHIDHAM</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">sohan@ablogistics.in</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">912836232278</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">9825239223</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8 text-muted">NA</div>
                    </div>
                </div>

                <!-- 3. A D MEHTA CLEARING AGENCY -->
                <div class="member-entry py-4 border-bottom" data-keywords="a d mehta clearing agency gandhidham dmehta@dmehtaconsultants.in 912836232372 9727707825 www.mcxconsultants.in">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">A D MEHTA CLEARING AGENCY</h3>
                    <p class="text-secondary small mb-3">OFFICE NO. 21, 22, 1ST FLOOR, KASEBA BUILDING, NEAR PNB BANK, GANDHIDHAM / 370230</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">GANDHIDHAM</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">dmehta@dmehtaconsultants.in</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">912836232372</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">9727707825</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8"><a href="http://www.mcxconsultants.in" target="_blank" rel="noopener" class="text-primary text-decoration-none">http://www.mcxconsultants.in</a></div>
                    </div>
                </div>

                <!-- 4. A T P & SONS -->
                <div class="member-entry py-4 border-bottom" data-keywords="a t p & sons ahmedabad yogesh@atpgroup.in 9825321399 atpgroup.in">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">A T P & SONS</h3>
                    <p class="text-secondary small mb-3">1ST FLOOR, EATP HOUSE, BEHIND FUN REPUBLIC, S.G. HIGHWAY, SATELLITE, AHMEDABAD 380015</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">Ahmedabad</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">yogesh@atpgroup.in</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">9825321399</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">9825321399</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8"><a href="http://atpgroup.in" target="_blank" rel="noopener" class="text-primary text-decoration-none">atpgroup.in</a></div>
                    </div>
                </div>

                <!-- 5. AANYA EXPRESS CARGO -->
                <div class="member-entry py-4 border-bottom" data-keywords="aanya express cargo mundra docs.aanya@gmail.com 7227809150 9141190055">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">AANYA EXPRESS CARGO</h3>
                    <p class="text-secondary small mb-3">Floor No.: First Floor, Building No./Flat No.: IT-125, Name Of Premises/Building: Sadguru Empire-2, Road/Street: Pragpar-Mundra Port Highway, Nearby Landmark: Sadguru Empire, Locality/Sub Locality: Baroi, City/Town/Village: Mundra, District: Kachchh, State: Gujarat, PIN Code: 370421</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">Mundra</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">DOCS.AANYA@GMAIL.COM</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">7227809150</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">9141190055</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8 text-muted">NA</div>
                    </div>
                </div>

                <!-- 6. AARKAY MARINE AGENCIES -->
                <div class="member-entry py-4 border-bottom" data-keywords="aarkay marine agencies gandhidham info@aarkaygroup.com 912836229507 9825226519 www.aarkaygroup.com">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">AARKAY MARINE AGENCIES</h3>
                    <p class="text-secondary small mb-3">119, MANI COMPLEX, PLOT NO. 84, SECTOR-8, GANDHIDHAM-KUTCH -GUJARAT-370201</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">GANDHIDHAM</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">info@aarkaygroup.com</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">912836229507</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">9825226519</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8"><a href="http://www.aarkaygroup.com" target="_blank" rel="noopener" class="text-primary text-decoration-none">http://www.aarkaygroup.com</a></div>
                    </div>
                </div>

                <!-- 7. AARVI EXIM SOLUTION LLP -->
                <div class="member-entry py-4 border-bottom" data-keywords="aarvi exim solution llp mundra rakesh@dlagencygroup.com 912838296341 7574855060">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">AARVI EXIM SOLUTION LLP</h3>
                    <p class="text-secondary small mb-3">1ST FLOOR, SHOP NO. 141, RATNAKALA ARCADE, PORT ROAD, SHAKTI NAGAR-I, MUNDRA/ 370421</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">Mundra</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">rakesh@dlagencygroup.com</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">912838296341</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">7574855060</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8 text-muted">NA</div>
                    </div>
                </div>

                <!-- 8. AASHIMA TRANSLOGISTICS -->
                <div class="member-entry py-4 border-bottom" data-keywords="aashima translogistics mumbai hitesh@aashima.net 912225644142 7029014589">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">AASHIMA TRANSLOGISTICS</h3>
                    <p class="text-secondary small mb-3">23, 2nd floor, Geeta Sadan, J.N.S. Road, Mulund (West), Mumbai 400080</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">Mumbai</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">hitesh@aashima.net</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">912225644142</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">7029014589</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8 text-muted">NA</div>
                    </div>
                </div>

                <!-- 9. AASHIRVAD SHIPPING -->
                <div class="member-entry py-4 border-bottom" data-keywords="aashirvad shipping kolkata sibaashirvad@yahoo.co.in 03340733071 9830843682">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">AASHIRVAD SHIPPING</h3>
                    <p class="text-secondary small mb-3">1, N. S. ROAD, MEZZ. FLOOR ROOM NO. 13 700001</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">Kolkata</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">SIBAASHIRVAD@YAHOO.CO.IN</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">03340733071</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">9830843682</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8 text-muted">NA</div>
                    </div>
                </div>

                <!-- 10. AASHIRVAD SHIPPING & ALLIED PVT LTD -->
                <div class="member-entry py-4 border-bottom" data-keywords="aashirvad shipping & allied pvt ltd ahmedabad ravi@aashirvadgroup.com 07929705458 7926733284 www.aashirvadgroup.com">
                    <h3 class="h5 fw-bold text-uppercase mb-1" style="color: #0b1a24;">AASHIRVAD SHIPPING & ALLIED PVT LTD</h3>
                    <p class="text-secondary small mb-3">G F - A-07, NIRMAAN BY SHUBHAM, PLOT NO. 1-4, NANA KAPAYA, S.NO. 34/2, MUNDRA, GUJARAT-370405</p>
                    <div class="row g-2 member-meta small">
                        <div class="col-sm-4 text-secondary">City :</div>
                        <div class="col-sm-8 fw-semibold text-dark">Ahmedabad</div>
                        <div class="col-sm-4 text-secondary">Email ID :</div>
                        <div class="col-sm-8 text-primary">ravi@aashirvadgroup.com</div>
                        <div class="col-sm-4 text-secondary">Tel No :</div>
                        <div class="col-sm-8 text-dark">07929705458</div>
                        <div class="col-sm-4 text-secondary">Mobile No :</div>
                        <div class="col-sm-8 text-dark">7926733284</div>
                        <div class="col-sm-4 text-secondary">Web URL :</div>
                        <div class="col-sm-8"><a href="http://www.aashirvadgroup.com" target="_blank" rel="noopener" class="text-primary text-decoration-none">http://www.aashirvadgroup.com/</a></div>
                    </div>
                </div>

            </div>

            <!-- Pagination Matching Reference [ < 1 2 3 4 5 ... 41 > ] -->
            <div class="mt-4 pt-3 d-flex align-items-center justify-content-start">
                <nav aria-label="Member search pagination">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                        <li class="page-item"><a class="page-link" href="#">41</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
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
        const memberEntries = document.querySelectorAll('.member-entry');

        function filterMembers() {
            const query = (searchInput.value || '').trim().toLowerCase();
            let matches = 0;

            memberEntries.forEach(entry => {
                const keywords = (entry.getAttribute('data-keywords') || '').toLowerCase();
                const text = entry.textContent.toLowerCase();

                if (!query || keywords.includes(query) || text.includes(query)) {
                    entry.style.display = 'block';
                    matches++;
                } else {
                    entry.style.display = 'none';
                }
            });

            if (query) {
                countBadge.textContent = `Found ${matches} member firm${matches === 1 ? '' : 's'} matching "${query}"`;
            } else {
                countBadge.textContent = 'Showing all registered member listings';
            }
        }

        searchBtn?.addEventListener('click', filterMembers);
        searchInput?.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                filterMembers();
            }
        });

        resetBtn?.addEventListener('click', () => {
            searchInput.value = '';
            filterMembers();
        });
    });
</script>
@endsection
