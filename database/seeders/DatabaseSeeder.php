<?php

namespace Database\Seeders;

use App\Models\CfsPass;
use App\Models\Contact;
use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\Grievance;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── WIPE ALL EXISTING DATA ────────────────────────────────────────────
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Invoice::withTrashed()->forceDelete();
        Grievance::withTrashed()->forceDelete();
        Contact::withTrashed()->forceDelete();
        CfsPass::withTrashed()->forceDelete();
        GalleryImage::withTrashed()->forceDelete();
        Event::withTrashed()->forceDelete();
        User::withTrashed()->forceDelete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // ─── 1. USERS ──────────────────────────────────────────────────────────
        $admin = User::create([
            'name'              => 'PCBA Administrator',
            'email'             => 'admin@pcbapipavav.org',
            'role'              => 'admin',
            'password'          => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        $member1 = User::create([
            'name'              => 'Pipavav Maritime & Logistics Pvt Ltd',
            'email'             => 'member@pcbapipavav.org',
            'role'              => 'member',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        $member2 = User::create([
            'name'              => 'Adani Customs Brokerage Services',
            'email'             => 'adani@pcba.org',
            'role'              => 'member',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        $member3 = User::create([
            'name'              => 'Saurashtra Freight Carriers Ltd',
            'email'             => 'saurashtra@pcba.org',
            'role'              => 'member',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        $member4 = User::create([
            'name'              => 'Jay Ambe CHA Services',
            'email'             => 'jayambe@pcba.org',
            'role'              => 'member',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        $member5 = User::create([
            'name'              => 'Global Clearance Associates',
            'email'             => 'globalclearance@pcba.org',
            'role'              => 'member',
            'password'          => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        $members = [$member1, $member2, $member3, $member4, $member5];

        // ─── 2. CFS PASSES ─────────────────────────────────────────────────────
        $passData = [
            [
                'user_id'          => $member1->id,
                'application_no'   => '992897',
                'first_name'       => 'MAHAVIRSINH',
                'middle_name'      => 'BHURUBHA',
                'last_name'        => 'JADEJA',
                'gender'           => 'Male',
                'dob'              => '1990-05-15',
                'blood_group'      => 'B+',
                'mobile_no'        => '9099964460',
                'identity_proof'   => 'Aadhar Card',
                'aadhar_number'    => '4589 1234 9876',
                'application_type' => 'New',
                'designation'      => 'CHA Agent',
                'city'             => 'Pipavav',
                'pincode'          => '365560',
                'card_no'          => '4723',
                'pass_status'      => 'Approve',
            ],
            [
                'user_id'          => $member1->id,
                'application_no'   => '874562',
                'first_name'       => 'RAMESH',
                'middle_name'      => 'KANTILAL',
                'last_name'        => 'PATEL',
                'gender'           => 'Male',
                'dob'              => '1985-08-22',
                'blood_group'      => 'O+',
                'mobile_no'        => '9876543210',
                'identity_proof'   => 'Aadhar Card',
                'aadhar_number'    => '9988 7766 5544',
                'application_type' => 'Renewal',
                'designation'      => 'Senior Agent',
                'city'             => 'Rajkot',
                'pincode'          => '360001',
                'card_no'          => '3812',
                'pass_status'      => 'Approve',
            ],
            [
                'user_id'          => $member2->id,
                'application_no'   => '663341',
                'first_name'       => 'SURESH',
                'middle_name'      => '',
                'last_name'        => 'SHARMA',
                'gender'           => 'Male',
                'dob'              => '1993-11-03',
                'blood_group'      => 'A+',
                'mobile_no'        => '9541230987',
                'identity_proof'   => 'PAN Card',
                'aadhar_number'    => '1122 3344 5566',
                'application_type' => 'New',
                'designation'      => 'Documentation Executive',
                'city'             => 'Amreli',
                'pincode'          => '365601',
                'card_no'          => '5109',
                'pass_status'      => 'Pending',
            ],
            [
                'user_id'          => $member3->id,
                'application_no'   => '445219',
                'first_name'       => 'PRIYA',
                'middle_name'      => 'JAYESH',
                'last_name'        => 'MEHTA',
                'gender'           => 'Female',
                'dob'              => '1997-03-18',
                'blood_group'      => 'AB+',
                'mobile_no'        => '7896541230',
                'identity_proof'   => 'Passport',
                'aadhar_number'    => '5544 3322 1100',
                'application_type' => 'New',
                'designation'      => 'CHA Executive',
                'city'             => 'Surat',
                'pincode'          => '395001',
                'card_no'          => null,
                'pass_status'      => 'Pending',
            ],
            [
                'user_id'          => $member4->id,
                'application_no'   => '331087',
                'first_name'       => 'HARISH',
                'middle_name'      => 'DILIPBHAI',
                'last_name'        => 'GOHIL',
                'gender'           => 'Male',
                'dob'              => '1988-07-29',
                'blood_group'      => 'B-',
                'mobile_no'        => '9012345678',
                'identity_proof'   => 'Voter ID',
                'aadhar_number'    => '6677 8899 0011',
                'application_type' => 'Replacement',
                'designation'      => 'Supervisor',
                'city'             => 'Veraval',
                'pincode'          => '362266',
                'card_no'          => '2201',
                'pass_status'      => 'Rejected',
            ],
            [
                'user_id'          => $member5->id,
                'application_no'   => '218754',
                'first_name'       => 'KAVITA',
                'middle_name'      => '',
                'last_name'        => 'SINGH',
                'gender'           => 'Female',
                'dob'              => '1995-12-10',
                'blood_group'      => 'O-',
                'mobile_no'        => '8523697410',
                'identity_proof'   => 'Driving License',
                'aadhar_number'    => '0099 1188 2277',
                'application_type' => 'New',
                'designation'      => 'Import Executive',
                'city'             => 'Bhavnagar',
                'pincode'          => '364001',
                'card_no'          => null,
                'pass_status'      => 'Pending',
            ],
        ];

        foreach ($passData as $p) {
            CfsPass::create($p);
        }

        // ─── 3. GRIEVANCES ─────────────────────────────────────────────────────
        $councils = [
            'Customs / EDI Council',
            'CBLR 2018 Council',
            'CFS / PORT / EMPTY YARD Council',
            'SHIPPING LINE / STAMP DUTY Council',
            'PPQ / FSSAI / AQS & OTHER PGA COUNCIL',
            'CCFC / PTFC / PGC OR IF ANY ISSUE',
        ];

        $grievancesData = [
            [
                'user_id'     => $member1->id,
                'member_name' => $member1->name,
                'council'     => $councils[0],
                'subject'     => 'EDI Filing Delay Issue',
                'query'       => 'Our EDI filing is being delayed by 2–3 hours at the customs portal. ICEGATE is responding slowly during peak hours. Please resolve urgently.',
                'answer'      => 'We have escalated this to the Customs EDI team. A maintenance window is scheduled for next Monday. Please re-attempt filing after 10am on weekdays.',
                'status'      => 'Answered',
            ],
            [
                'user_id'     => $member2->id,
                'member_name' => $member2->name,
                'council'     => $councils[1],
                'subject'     => 'CBLR Regulation 10 Clarification',
                'query'       => 'We need clarification on Regulation 10(1)(n) regarding the maintenance of records. Are digital records accepted as a substitute for physical ones?',
                'answer'      => null,
                'status'      => 'Pending',
            ],
            [
                'user_id'     => $member3->id,
                'member_name' => $member3->name,
                'council'     => $councils[2],
                'subject'     => 'Empty Yard Gate-In Delay',
                'query'       => 'Empty containers are being held at the port yard for more than 7 days without gate-out. This is causing extra detention charges for our clients.',
                'answer'      => 'The yard management has been informed. Containers older than 5 days will be prioritised for gate-out from this week. Please share container nos with PCBA office.',
                'status'      => 'Answered',
            ],
            [
                'user_id'     => $member4->id,
                'member_name' => $member4->name,
                'council'     => $councils[3],
                'subject'     => 'Stamp Duty Calculation Error',
                'query'       => 'Stamp duty is being levied on the entire invoice value instead of assessable value. This is incorrect and resulting in excess payments.',
                'answer'      => null,
                'status'      => 'Pending',
            ],
            [
                'user_id'     => $member5->id,
                'member_name' => $member5->name,
                'council'     => $councils[4],
                'subject'     => 'FSSAI NOC for Food Shipments',
                'query'       => 'Our food-grade consignment has been stuck pending FSSAI NOC for 12 days. The FSSAI lab has not yet issued the certificate.',
                'answer'      => null,
                'status'      => 'Pending',
            ],
            [
                'user_id'     => $member1->id,
                'member_name' => $member1->name,
                'council'     => $councils[5],
                'subject'     => 'PTFC Fees Dispute',
                'query'       => 'PTFC is charging double terminal handling charges for the same shipment at Pipavav. We have the invoice as evidence. Please intervene.',
                'answer'      => 'The PTFC has been contacted. A refund or adjustment in the next invoice is being processed. Expected resolution within 10 working days.',
                'status'      => 'Answered',
            ],
            [
                'user_id'     => $member2->id,
                'member_name' => $member2->name,
                'council'     => $councils[0],
                'subject'     => 'Faceless Assessment Long Pending',
                'query'       => 'Bill of entry submitted on 10th September is still under facilitation – no assessment officer assigned. It has been 20 days.',
                'answer'      => null,
                'status'      => 'Pending',
            ],
            [
                'user_id'     => $member3->id,
                'member_name' => $member3->name,
                'council'     => $councils[1],
                'subject'     => 'G-Card Renewal Documentation',
                'query'       => 'The G-card renewal application submitted 45 days ago has not been processed. The officer says documents are incomplete but has not specified which ones.',
                'answer'      => 'Please visit the CBLR desk at customs house with originals of all documents from the checklist. We will assist in person. Contact Mr. Rajesh at PCBA office.',
                'status'      => 'Answered',
            ],
        ];

        foreach ($grievancesData as $g) {
            Grievance::create($g);
        }

        // ─── 4. CONTACTS ───────────────────────────────────────────────────────
        $contactsData = [
            ['user_id' => $member1->id, 'name' => 'Rahul Verma', 'designation' => 'Port Manager', 'company_name' => 'APM Terminals Pipavav', 'mobile_no' => '9001234567', 'email' => 'rahul.verma@apmterminals.com', 'city' => 'Pipavav'],
            ['user_id' => $member1->id, 'name' => 'Anita Shah', 'designation' => 'Customs Inspector', 'company_name' => 'Customs Department, Pipavav', 'mobile_no' => '9112345678', 'email' => 'anita.shah@customs.gov.in', 'city' => 'Pipavav'],
            ['user_id' => $member2->id, 'name' => 'Deepak Patel', 'designation' => 'Shipping Agent', 'company_name' => 'MSC India', 'mobile_no' => '9223456789', 'email' => 'deepak@mscindia.com', 'city' => 'Mumbai'],
            ['user_id' => $member3->id, 'name' => 'Sunita Joshi', 'designation' => 'FSSAI Officer', 'company_name' => 'FSSAI Gujarat', 'mobile_no' => '9334567890', 'email' => 'sunita.joshi@fssai.gov.in', 'city' => 'Ahmedabad'],
            ['user_id' => $member4->id, 'name' => 'Kiran Desai', 'designation' => 'CFS Manager', 'company_name' => 'Balmer Lawrie CFS', 'mobile_no' => '9445678901', 'email' => 'kiran@balmerlawrie.com', 'city' => 'Pipavav'],
        ];

        foreach ($contactsData as $c) {
            Contact::create($c);
        }

        // ─── 5. INVOICES ───────────────────────────────────────────────────────
        $invoiceData = [
            // Member 1 - new membership + CHA pass fee
            [
                'user_id' => $member1->id, 'application_no' => null,
                'membership_type' => 'Ordinary Member', 'payment_type' => 'Online',
                'amount_paid' => 10000, 'payment_date' => '2026-04-29',
                'payment_for' => 'New Membership',
                'receipt_no' => 'RCP-2026-001', 'invoice_no' => 'INV-2026-001',
            ],
            [
                'user_id' => $member1->id, 'application_no' => '992897',
                'membership_type' => 'Ordinary Member', 'payment_type' => 'Online',
                'amount_paid' => 500, 'payment_date' => '2026-07-31',
                'payment_for' => 'CHA Application',
                'receipt_no' => 'RCP-2026-002', 'invoice_no' => 'INV-2026-002',
            ],
            // Member 2 - new + renewal
            [
                'user_id' => $member2->id, 'application_no' => null,
                'membership_type' => 'Ordinary Member', 'payment_type' => 'Cheque',
                'amount_paid' => 10000, 'payment_date' => '2026-06-17',
                'payment_for' => 'New Membership',
                'receipt_no' => 'RCP-2026-003', 'invoice_no' => 'INV-2026-003',
            ],
            [
                'user_id' => $member2->id, 'application_no' => null,
                'membership_type' => 'Ordinary Member', 'payment_type' => 'NEFT',
                'amount_paid' => 8000, 'payment_date' => '2026-09-01',
                'payment_for' => 'Membership Renewal',
                'receipt_no' => 'RCP-2026-004', 'invoice_no' => 'INV-2026-004',
            ],
            // Member 3
            [
                'user_id' => $member3->id, 'application_no' => null,
                'membership_type' => 'Associate Member', 'payment_type' => 'Online',
                'amount_paid' => 5000, 'payment_date' => '2026-05-10',
                'payment_for' => 'New Membership',
                'receipt_no' => 'RCP-2026-005', 'invoice_no' => 'INV-2026-005',
            ],
            [
                'user_id' => $member3->id, 'application_no' => '445219',
                'membership_type' => 'Associate Member', 'payment_type' => 'Cash',
                'amount_paid' => 500, 'payment_date' => '2026-08-15',
                'payment_for' => 'CHA Application',
                'receipt_no' => 'RCP-2026-006', 'invoice_no' => 'INV-2026-006',
            ],
            // Member 4
            [
                'user_id' => $member4->id, 'application_no' => null,
                'membership_type' => 'Ordinary Member', 'payment_type' => 'Cheque',
                'amount_paid' => 10000, 'payment_date' => '2026-03-15',
                'payment_for' => 'New Membership',
                'receipt_no' => 'RCP-2026-007', 'invoice_no' => 'INV-2026-007',
            ],
            // Member 5
            [
                'user_id' => $member5->id, 'application_no' => null,
                'membership_type' => 'Ordinary Member', 'payment_type' => 'Online',
                'amount_paid' => 10000, 'payment_date' => '2026-07-01',
                'payment_for' => 'New Membership',
                'receipt_no' => 'RCP-2026-008', 'invoice_no' => 'INV-2026-008',
            ],
            [
                'user_id' => $member5->id, 'application_no' => null,
                'membership_type' => 'Ordinary Member', 'payment_type' => 'Online',
                'amount_paid' => 8000, 'payment_date' => '2026-09-10',
                'payment_for' => 'Membership Renewal',
                'receipt_no' => 'RCP-2026-009', 'invoice_no' => 'INV-2026-009',
            ],
        ];

        foreach ($invoiceData as $inv) {
            Invoice::create($inv);
        }

        // ─── 6. EVENTS ─────────────────────────────────────────────────────────
        $eventsData = [
            [
                'title'       => 'Pipavav EXIM Stakeholders & Customs Roundtable 2026',
                'event_date'  => '2026-10-15',
                'location'    => 'Pipavav Port Auditorium',
                'description' => 'Joint conference bringing together Customs Brokers, APM Terminals officials, Shipping Lines and Customs Administration to review dwell times, DPD expansion and logistics bottlenecks.',
                'status'      => 'upcoming',
            ],
            [
                'title'       => 'CBLR Regulation 6 & Technical Paperless ICEGATE Refresher',
                'event_date'  => '2026-11-08',
                'location'    => 'JBS Academy Pipavav & PCBA Hall',
                'description' => 'Professional skill enhancement workshop for F-Card and G-Card candidates covering advanced classification, Valuation rules, and new ICEGATE EDI updates.',
                'status'      => 'upcoming',
            ],
            [
                'title'       => 'PCBA 12th Annual General Meeting (AGM) & Networking Dinner',
                'event_date'  => '2026-12-18',
                'location'    => 'Port Pipavav Club & Lawn',
                'description' => 'Annual assembly of all enrolled PCBA member firms. Presentation of financial audits, review of port achievements, committee elections, and formal dinner.',
                'status'      => 'upcoming',
            ],
            [
                'title'       => 'FFFAI National Convention Delegation & Bilateral Conclave',
                'event_date'  => '2026-01-22',
                'location'    => 'Convention Centre, New Delhi',
                'description' => 'PCBA executive council participating in the apex FFFAI convention discussing national port digitisation and single-window clearance mechanisms.',
                'status'      => 'completed',
            ],
            [
                'title'       => 'GST & Customs Duty Reconciliation Seminar 2026',
                'event_date'  => '2026-08-05',
                'location'    => 'Hotel Nilambag Palace, Bhavnagar',
                'description' => 'Seminar on reconciling GST Input Tax Credit (ITC) with Customs duty payments, addressing common errors in GSTR-3B and ICEGATE data mismatch.',
                'status'      => 'completed',
            ],
        ];

        foreach ($eventsData as $e) {
            Event::create($e);
        }

        // ─── 7. GALLERY IMAGES ─────────────────────────────────────────────────
        $galleryData = [
            ['title' => 'Presidential Address & Executive Committee', 'category' => 'events',    'image_path' => 'images/president.jpeg'],
            ['title' => 'Vessel Operations & Gantry Cranes at Quayside', 'category' => 'port',  'image_path' => 'images/banner.jpg'],
            ['title' => 'Deep-Draft Maritime Vessel Navigation',          'category' => 'port',  'image_path' => 'images/ship-bow-down.jpg'],
            ['title' => 'Rail Rake Movement & Multimodal Buffer Yard',    'category' => 'port',  'image_path' => 'images/banner-vertical.jpg'],
        ];

        foreach ($galleryData as $g) {
            GalleryImage::create($g);
        }

        $this->command->info('✅ All tables seeded: 1 admin + 5 members + 6 CFS passes + 8 grievances + 5 contacts + 9 invoices + 5 events + 4 gallery images.');
    }
}
