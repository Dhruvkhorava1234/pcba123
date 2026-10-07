<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold tracking-wider uppercase bg-orange-50 text-orange-700 border border-orange-200">
                        <i class="bi bi-shield-check me-1 text-orange-600"></i> CBLR Regulation 20 Accredited
                    </span>
                    <span class="text-xs text-slate-500">• Pipavav Customs Commissionerate</span>
                </div>
                <h1 class="text-2xl font-black tracking-tight text-slate-900 flex items-center gap-2">
                    Welcome, {{ Auth::user()->name }}
                </h1>
                <p class="text-xs text-slate-500 mt-0.5">Customs Broker License Representative • Pipavav Port (INPAV1)</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('membership.search') }}" class="inline-flex items-center px-3.5 py-2 rounded-lg text-xs font-bold text-slate-700 bg-white hover:bg-slate-50 border border-slate-300 shadow-sm transition">
                    <i class="bi bi-search me-1.5 text-orange-600"></i> Member Directory
                </a>
                <a href="{{ route('home') }}" class="inline-flex items-center px-3.5 py-2 rounded-lg text-xs font-bold text-white bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 shadow-sm transition">
                    <i class="bi bi-house-door me-1.5"></i> PCBA Portal
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- 1. Top Summary Cards (Light Theme) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Card 1: Membership Status -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition relative overflow-hidden">
                    <div class="absolute -right-3 -bottom-3 text-slate-100 text-7xl select-none pointer-events-none">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div class="flex items-center justify-between mb-3 relative z-10">
                        <span class="text-xs font-bold tracking-wider uppercase text-slate-500">Membership Status</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            Active
                        </span>
                    </div>
                    <div class="text-2xl font-black text-slate-900 mb-1 relative z-10">Regulation 20</div>
                    <p class="text-xs text-slate-500 flex items-center gap-1.5 relative z-10">
                        <i class="bi bi-calendar-check text-emerald-600"></i> Valid through FY 2026-27
                    </p>
                </div>

                <!-- Card 2: Port Gate Passes -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition relative overflow-hidden">
                    <div class="absolute -right-3 -bottom-3 text-slate-100 text-7xl select-none pointer-events-none">
                        <i class="bi bi-pass-fill"></i>
                    </div>
                    <div class="flex items-center justify-between mb-3 relative z-10">
                        <span class="text-xs font-bold tracking-wider uppercase text-slate-500">Pipavav Gate Passes</span>
                        <span class="text-xs font-bold text-orange-600">APM Terminals</span>
                    </div>
                    <div class="text-2xl font-black text-slate-900 mb-1 relative z-10">08 Active</div>
                    <p class="text-xs text-slate-500 flex items-center gap-1.5 relative z-10">
                        <i class="bi bi-person-badge text-orange-600"></i> F-Card & G-Card Holders
                    </p>
                </div>

                <!-- Card 3: Custom House Desk -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition relative overflow-hidden">
                    <div class="absolute -right-3 -bottom-3 text-slate-100 text-7xl select-none pointer-events-none">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="flex items-center justify-between mb-3 relative z-10">
                        <span class="text-xs font-bold tracking-wider uppercase text-slate-500">Pipavav Custom House</span>
                        <span class="text-xs font-semibold text-blue-600">EDI / ICES</span>
                    </div>
                    <div class="text-2xl font-black text-slate-900 mb-1 relative z-10">INPAV1</div>
                    <p class="text-xs text-slate-500 flex items-center gap-1.5 relative z-10">
                        <i class="bi bi-cpu text-blue-600"></i> Port Code: INPAV1 / APM
                    </p>
                </div>

                <!-- Card 4: Advisory & PTFC Desk -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition relative overflow-hidden">
                    <div class="absolute -right-3 -bottom-3 text-slate-100 text-7xl select-none pointer-events-none">
                        <i class="bi bi-megaphone-fill"></i>
                    </div>
                    <div class="flex items-center justify-between mb-3 relative z-10">
                        <span class="text-xs font-bold tracking-wider uppercase text-slate-500">Active Circulars</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                            3 New
                        </span>
                    </div>
                    <div class="text-2xl font-black text-slate-900 mb-1 relative z-10">12 Notices</div>
                    <p class="text-xs text-slate-500 flex items-center gap-1.5 relative z-10">
                        <i class="bi bi-info-circle text-amber-600"></i> Latest Customs Public Notices
                    </p>
                </div>
            </div>

            <!-- 2. Main Content Split: Quick Port Actions & Member Services -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Left 2 Cols: Member Action Central & Customs Facilitation -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Quick Actions Grid -->
                    <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-sm">
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                                    <i class="bi bi-lightning-charge-fill text-orange-600"></i> Member Port Operations & Quick Actions
                                </h2>
                                <p class="text-xs text-slate-500">Key tools and services for registered Customs Brokers at Pipavav Port</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Action 1: Search Member Directory -->
                            <a href="{{ route('membership.search') }}" class="group p-4 rounded-xl bg-slate-50 hover:bg-orange-50/50 border border-slate-200 hover:border-orange-300 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center text-xl group-hover:scale-110 transition">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-sm text-slate-900 group-hover:text-orange-700 transition">Search Member Directory</div>
                                        <div class="text-xs text-slate-500">Lookup accredited firms, partners & contacts</div>
                                    </div>
                                </div>
                            </a>

                            <!-- Action 2: Port Terminal Gate Pass -->
                            <a href="{{ route('cfs-passes') }}" class="group p-4 rounded-xl bg-slate-50 hover:bg-blue-50/50 border border-slate-200 hover:border-blue-300 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-xl group-hover:scale-110 transition">
                                        <i class="bi bi-upc-scan"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-sm text-slate-900 group-hover:text-blue-700 transition">CFS & Port Terminal Passes</div>
                                        <div class="text-xs text-slate-500">Apply or view CFS and Port entry passes</div>
                                    </div>
                                </div>
                            </a>

                            <!-- Action 3: PTFC Agenda Submission -->
                            <div class="group p-4 rounded-xl bg-slate-50 hover:bg-emerald-50/50 border border-slate-200 hover:border-emerald-300 transition cursor-pointer" onclick="alert('Permanent Trade Facilitation Committee (PTFC) grievance desk: Please send agenda points to ptfc@pcbapipavav.org');">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl group-hover:scale-110 transition">
                                        <i class="bi bi-chat-left-dots-fill"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-sm text-slate-900 group-hover:text-emerald-700 transition">Submit PTFC Trade Grievance</div>
                                        <div class="text-xs text-slate-500">Table operational issues at monthly Customs meeting</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action 4: Download Certificate -->
                            <div class="group p-4 rounded-xl bg-slate-50 hover:bg-amber-50/50 border border-slate-200 hover:border-amber-300 transition cursor-pointer" onclick="window.print();">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center text-xl group-hover:scale-110 transition">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-sm text-slate-900 group-hover:text-amber-800 transition">Membership Certificate</div>
                                        <div class="text-xs text-slate-500">Print / download verified Regulation 20 credential</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customs Operational Bulletins & Notices -->
                    <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                                <i class="bi bi-file-earmark-text-fill text-blue-600"></i> Pipavav Customs Public Notices & Circulars
                            </h2>
                            <span class="text-xs text-slate-500 font-semibold">Updated Today</span>
                        </div>

                        <div class="divide-y divide-slate-100">
                            <!-- Item 1 -->
                            <div class="py-3.5 flex items-start justify-between gap-4">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-0.5 text-[10px] font-bold uppercase rounded bg-orange-100 text-orange-700">Public Notice 04/2026</span>
                                        <span class="text-xs text-slate-400">Pipavav Custom House</span>
                                    </div>
                                    <h3 class="text-sm font-semibold text-slate-800">
                                        Direct Port Delivery (DPD) & Paperless E-Gate Pass implementation for Containerised Cargo
                                    </h3>
                                    <p class="text-xs text-slate-500">
                                        All accredited members are advised to update their ICEGATE digital signature tokens prior to the month end.
                                    </p>
                                </div>
                                <a href="https://icegate.gov.in" target="_blank" class="shrink-0 inline-flex items-center px-2.5 py-1 rounded bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700 transition">
                                    <i class="bi bi-download me-1"></i> PDF
                                </a>
                            </div>

                            <!-- Item 2 -->
                            <div class="py-3.5 flex items-start justify-between gap-4">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-0.5 text-[10px] font-bold uppercase rounded bg-emerald-100 text-emerald-700">Advisory No. 12</span>
                                        <span class="text-xs text-slate-400">APM Terminals Pipavav</span>
                                    </div>
                                    <h3 class="text-sm font-semibold text-slate-800">
                                        Pre-advise cut-off timelines for rail and container rake movements from Northern ICDs
                                    </h3>
                                    <p class="text-xs text-slate-500">
                                        Revised window for buffer yard entry at Pipavav Port effective next Monday.
                                    </p>
                                </div>
                                <a href="https://www.apmterminals.com" target="_blank" class="shrink-0 inline-flex items-center px-2.5 py-1 rounded bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700 transition">
                                    <i class="bi bi-box-arrow-up-right me-1"></i> Link
                                </a>
                            </div>

                            <!-- Item 3 -->
                            <div class="py-3.5 flex items-start justify-between gap-4">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-0.5 text-[10px] font-bold uppercase rounded bg-indigo-100 text-indigo-700">FFFAI Circular</span>
                                        <span class="text-xs text-slate-400">Apex Secretariat</span>
                                    </div>
                                    <h3 class="text-sm font-semibold text-slate-800">
                                        CBLR Regulation 6 & Regulation 13 Examination dates announcement for FY 2026-27
                                    </h3>
                                    <p class="text-xs text-slate-500">
                                        Guidance sessions and training workshops organized in coordination with JBS Academy.
                                    </p>
                                </div>
                                <a href="{{ route('training') }}" class="shrink-0 inline-flex items-center px-2.5 py-1 rounded bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700 transition">
                                    <i class="bi bi-arrow-right me-1"></i> Info
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right 1 Col: Member Particulars, Apex Badges & Helpdesk -->
                <div class="space-y-6">
                    
                    <!-- Member Profile Particulars Card -->
                    <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-sm">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-100">
                            <div class="w-12 h-12 rounded-xl bg-orange-600 text-white flex items-center justify-center font-bold text-xl shadow-md">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">{{ Auth::user()->name }}</h3>
                                <div class="text-xs text-slate-500">Customs Broker Representative</div>
                            </div>
                        </div>

                        <div class="space-y-3 text-xs">
                            <div class="flex justify-between py-1 border-b border-slate-100">
                                <span class="text-slate-500">Official Email:</span>
                                <span class="text-slate-800 font-semibold">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-100">
                                <span class="text-slate-500">Account Role:</span>
                                <span class="text-emerald-700 font-semibold">Active Member Firm</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-100">
                                <span class="text-slate-500">Member Since:</span>
                                <span class="text-slate-800 font-semibold">{{ Auth::user()->created_at->format('M Y') }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-100">
                                <span class="text-slate-500">Port Jurisdiction:</span>
                                <span class="text-slate-800 font-semibold">Custom House Pipavav</span>
                            </div>
                            <div class="flex justify-between py-1">
                                <span class="text-slate-500">Association ID:</span>
                                <span class="text-orange-600 font-mono font-bold">PCBA-MBR-{{ str_pad(Auth::user()->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>

                        <div class="mt-5 pt-4 border-t border-slate-100">
                            <a href="{{ route('profile.edit') }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-lg text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                                <i class="bi bi-gear-fill me-1.5 text-slate-500"></i> Edit Profile & Password
                            </a>
                        </div>
                    </div>

                    <!-- Apex Affiliations -->
                    <div class="p-5 rounded-2xl bg-white border border-slate-200/90 shadow-sm">
                        <h4 class="text-xs font-bold tracking-wider uppercase text-slate-500 mb-3">Apex Affiliations</h4>
                        <div class="space-y-3 text-xs">
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <i class="bi bi-shield-check text-orange-600 text-lg"></i>
                                    <div>
                                        <div class="font-bold text-slate-800">FFFAI Member</div>
                                        <div class="text-[11px] text-slate-500">Federation of Freight Forwarders</div>
                                    </div>
                                </div>
                                <a href="https://fffai.org" target="_blank" class="text-slate-400 hover:text-slate-700">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </div>

                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <i class="bi bi-globe text-blue-600 text-lg"></i>
                                    <div>
                                        <div class="font-bold text-slate-800">FCBA National</div>
                                        <div class="text-[11px] text-slate-500">Customs Brokers Associations</div>
                                    </div>
                                </div>
                                <a href="{{ route('associations') }}" class="text-slate-400 hover:text-slate-700">
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Secretariat Helpdesk -->
                    <div class="p-5 rounded-2xl bg-orange-50/70 border border-orange-200 shadow-sm">
                        <div class="flex items-center gap-2 mb-2 text-orange-700">
                            <i class="bi bi-telephone-fill"></i>
                            <h4 class="text-xs font-bold tracking-wider uppercase text-slate-900">Port Secretariat Desk</h4>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed mb-3">
                            Need immediate assistance with port documentation, gate clearance, or membership verification?
                        </p>
                        <div class="text-xs text-slate-600 space-y-1">
                            <div><i class="bi bi-envelope me-1 text-orange-600"></i> info@pcbapipavav.org</div>
                            <div><i class="bi bi-geo-alt me-1 text-orange-600"></i> Port Pipavav, Rajula, Amreli - 365560</div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
