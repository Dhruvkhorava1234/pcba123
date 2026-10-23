<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\MembershipApplication;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipDirectoryController extends Controller
{
    /**
     * Display directory page with initial members.
     */
    public function index(Request $request)
    {
        $allMembers = $this->getAllDirectoryMembers();
        return view('membership-search', compact('allMembers'));
    }

    /**
     * Fast AJAX search endpoint with pagination support for live typing and browsing.
     */
    public function search(Request $request)
    {
        $q = trim($request->get('q', ''));
        $page = max(1, (int) $request->get('page', 1));
        $perPage = max(1, min(50, (int) $request->get('per_page', 5))); // 5 members per page

        $allMembers = $this->getAllDirectoryMembers();

        if (mb_strlen($q) >= 2) {
            $lowerQ = mb_strtolower($q);
            $filtered = array_values(array_filter($allMembers, function ($m) use ($lowerQ) {
                return str_contains(mb_strtolower($m['company_name']), $lowerQ)
                    || str_contains(mb_strtolower($m['city']), $lowerQ)
                    || str_contains(mb_strtolower($m['email']), $lowerQ)
                    || str_contains(mb_strtolower($m['mobile_no']), $lowerQ)
                    || str_contains(mb_strtolower($m['address']), $lowerQ)
                    || str_contains(mb_strtolower($m['tel_no']), $lowerQ);
            }));
        } else {
            $filtered = $allMembers;
        }

        $total = count($filtered);
        $totalPages = (int) ceil($total / $perPage);
        $offset = ($page - 1) * $perPage;
        $items = array_slice($filtered, $offset, $perPage);

        return response()->json([
            'success'      => true,
            'total'        => $total,
            'count'        => count($items),
            'page'         => $page,
            'per_page'     => $perPage,
            'total_pages'  => $totalPages,
            'query'        => $q,
            'members'      => $items,
        ]);
    }

    /**
     * Compile unified member directory:
     * - Paid Membership Applications
     * - Registered Users with 'member' role
     * - Official Directory Seeded Members
     */
    private function getAllDirectoryMembers(): array
    {
        $results = [];
        $seenEmails = [];

        // 1. Members who took membership online (Paid Applications)
        $paidApps = MembershipApplication::where('payment_status', 'Completed')
            ->latest('paid_at')
            ->get();

        foreach ($paidApps as $app) {
            $payload = $app->form_payload ?? [];
            $email = strtolower(trim($app->email));
            $seenEmails[$email] = true;

            $results[] = [
                'company_name' => strtoupper($app->company_name),
                'address'      => $app->address,
                'city'         => strtoupper($app->city),
                'email'        => $app->email,
                'tel_no'       => $payload['tel_no'] ?? ($payload['branch_tel_no'] ?? 'NA'),
                'mobile_no'    => $app->mobile,
                'web_url'      => $payload['website_url'] ?? 'NA',
                'is_new'       => true,
            ];
        }

        // 2. Enrolled Users with role = 'member' (if not already added)
        $users = User::where('role', 'member')->with('contacts')->latest()->get();
        foreach ($users as $u) {
            $email = strtolower(trim($u->email));
            if (isset($seenEmails[$email])) {
                continue;
            }
            $seenEmails[$email] = true;
            $firstContact = $u->contacts->first();

            $results[] = [
                'company_name' => strtoupper($u->name),
                'address'      => $firstContact ? $firstContact->address : 'Port Pipavav, Gujarat',
                'city'         => strtoupper($firstContact && $firstContact->city ? $firstContact->city : 'PIPAVAV'),
                'email'        => $u->email,
                'tel_no'       => $firstContact && $firstContact->landline_no ? $firstContact->landline_no : 'NA',
                'mobile_no'    => $firstContact && $firstContact->mobile_no ? $firstContact->mobile_no : 'NA',
                'web_url'      => 'NA',
                'is_new'       => false,
            ];
        }

        // 3. Official directory baseline entries
        $staticDirectory = [
            [
                'company_name' => 'A B GLOBAL SHIPPING AND LOGISTICS LLP',
                'address'      => '2nd Floor,Office No. 211, Plot No. 83, Rishabh Arcade, Sector 8, Gandhidham, Kachchh, Gujarat, 370201',
                'city'         => 'GANDHIDHAM',
                'email'        => 'exim.abglobal@gmail.com',
                'tel_no'       => '9874047265',
                'mobile_no'    => '9874047265',
                'web_url'      => 'NA',
                'is_new'       => false,
            ],
            [
                'company_name' => 'A B LOGISTICS',
                'address'      => '208, 2ND FLOOR, DENA BANK BUILDING, NIRAV CHAMBERS,SECTOR 1/A BANKING CIRCLE/ 370201 NULL',
                'city'         => 'GANDHIDHAM',
                'email'        => 'sohan@ablogistics.in',
                'tel_no'       => '912836232278',
                'mobile_no'    => '9825239223',
                'web_url'      => 'NA',
                'is_new'       => false,
            ],
            [
                'company_name' => 'A D MEHTA CLEARING AGENCY',
                'address'      => 'OFFICE NO. 21, 22, 1ST FLOOR, KASEBA BUILDING, NEAR PNB BANK, GANDHIDHAM / 370230',
                'city'         => 'GANDHIDHAM',
                'email'        => 'dmehta@dmehtaconsultants.in',
                'tel_no'       => '912836232372',
                'mobile_no'    => '9727707825',
                'web_url'      => 'http://www.mcxconsultants.in',
                'is_new'       => false,
            ],
            [
                'company_name' => 'A T P & SONS',
                'address'      => '1ST FLOOR, EATP HOUSE, BEHIND FUN REPUBLIC, S.G. HIGHWAY, SATELLITE, AHMEDABAD 380015',
                'city'         => 'AHMEDABAD',
                'email'        => 'yogesh@atpgroup.in',
                'tel_no'       => '9825321399',
                'mobile_no'    => '9825321399',
                'web_url'      => 'http://atpgroup.in',
                'is_new'       => false,
            ],
            [
                'company_name' => 'AANYA EXPRESS CARGO',
                'address'      => 'Floor No.: First Floor, Building No./Flat No.: IT-125, Sadguru Empire-2, Pragpar-Mundra Port Highway, Mundra, PIN: 370421',
                'city'         => 'MUNDRA',
                'email'        => 'DOCS.AANYA@GMAIL.COM',
                'tel_no'       => '7227809150',
                'mobile_no'    => '9141190055',
                'web_url'      => 'NA',
                'is_new'       => false,
            ],
            [
                'company_name' => 'AARKAY MARINE AGENCIES',
                'address'      => '119, MANI COMPLEX, PLOT NO. 84, SECTOR-8, GANDHIDHAM-KUTCH -GUJARAT-370201',
                'city'         => 'GANDHIDHAM',
                'email'        => 'info@aarkaygroup.com',
                'tel_no'       => '912836229507',
                'mobile_no'    => '9825226519',
                'web_url'      => 'http://www.aarkaygroup.com',
                'is_new'       => false,
            ],
            [
                'company_name' => 'AARVI EXIM SOLUTION LLP',
                'address'      => '1ST FLOOR, SHOP NO. 141, RATNAKALA ARCADE, PORT ROAD, SHAKTI NAGAR-I, MUNDRA/ 370421',
                'city'         => 'MUNDRA',
                'email'        => 'rakesh@dlagencygroup.com',
                'tel_no'       => '912838296341',
                'mobile_no'    => '7574855060',
                'web_url'      => 'NA',
                'is_new'       => false,
            ],
            [
                'company_name' => 'AASHIMA TRANSLOGISTICS',
                'address'      => '23, 2nd floor, Geeta Sadan, J.N.S. Road, Mulund (West), Mumbai 400080',
                'city'         => 'MUMBAI',
                'email'        => 'hitesh@aashima.net',
                'tel_no'       => '912225644142',
                'mobile_no'    => '7029014589',
                'web_url'      => 'NA',
                'is_new'       => false,
            ],
            [
                'company_name' => 'AASHIRVAD SHIPPING',
                'address'      => '1, N. S. ROAD, MEZZ. FLOOR ROOM NO. 13 700001',
                'city'         => 'KOLKATA',
                'email'        => 'SIBAASHIRVAD@YAHOO.CO.IN',
                'tel_no'       => '03340733071',
                'mobile_no'    => '9830843682',
                'web_url'      => 'NA',
                'is_new'       => false,
            ],
            [
                'company_name' => 'AASHIRVAD SHIPPING & ALLIED PVT LTD',
                'address'      => 'G F - A-07, NIRMAAN BY SHUBHAM, PLOT NO. 1-4, NANA KAPAYA, MUNDRA, GUJARAT-370405',
                'city'         => 'AHMEDABAD',
                'email'        => 'ravi@aashirvadgroup.com',
                'tel_no'       => '07929705458',
                'mobile_no'    => '7926733284',
                'web_url'      => 'http://www.aashirvadgroup.com',
                'is_new'       => false,
            ],
        ];

        foreach ($staticDirectory as $s) {
            $email = strtolower(trim($s['email']));
            if (!isset($seenEmails[$email])) {
                $seenEmails[$email] = true;
                $results[] = $s;
            }
        }

        return $results;
    }
}
