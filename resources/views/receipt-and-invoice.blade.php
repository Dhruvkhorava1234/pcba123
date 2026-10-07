@extends('layouts.app')

@section('title', 'Receipt and Invoice | Pipavav Customs Brokers Association (PCBA)')

@section('content')
<style>
    .invoice-title {
        font-family: 'Space Grotesk', serif, sans-serif;
        font-weight: 800;
        color: #0b2530;
        letter-spacing: 0.5px;
        font-size: 1.6rem;
    }
    .btn-download-action {
        background-color: #f8f9fa;
        color: #212529;
        border: 1px solid #ced4da;
        border-radius: 2px;
        padding: 6px 14px;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }
    .btn-download-action:hover {
        background-color: #e9ecef;
        color: #000;
        border-color: #adb5bd;
    }
    .invoice-table th {
        font-size: 0.88rem;
        font-weight: 700;
        color: #000;
        padding: 12px 10px;
        border-bottom: 1px solid #dee2e6;
        vertical-align: top;
        line-height: 1.25;
    }
    .invoice-table td {
        font-size: 0.88rem;
        color: #212529;
        padding: 14px 10px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
    }
</style>

<div class="bg-white min-vh-100" style="padding-top: 135px; padding-bottom: 70px;">
    <div class="container" style="max-width: 1140px;">

        <div class="mb-4">
            <h2 class="invoice-title text-uppercase mb-4">RECEIPT AND INVOICE</h2>
        </div>

        <!-- Table matching user screenshot -->
        <div class="table-responsive">
            <table class="table align-middle invoice-table" style="border-collapse: separate; border-spacing: 0;">
                <thead>
                    <tr>
                        <th scope="col" style="width: 16%;">Application No (For<br>CFS Pass)</th>
                        <th scope="col" style="width: 13%;">Membership<br>Type</th>
                        <th scope="col" style="width: 12%;">Payment Type</th>
                        <th scope="col" style="width: 10%;">Amount<br>Paid</th>
                        <th scope="col" style="width: 12%;">Payment<br>Date</th>
                        <th scope="col" style="width: 13%;">Payment For</th>
                        <th scope="col" style="width: 12%;">Download<br>Receipt</th>
                        <th scope="col" style="width: 12%;">Download<br>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $inv)
                        <tr>
                            <td>
                                {{ $inv->application_no ?? '' }}
                            </td>
                            <td>
                                {{ $inv->membership_type }}
                            </td>
                            <td>
                                {{ $inv->payment_type }}
                            </td>
                            <td>
                                {{ (int)$inv->amount_paid == $inv->amount_paid ? (int)$inv->amount_paid : number_format($inv->amount_paid, 2) }}
                            </td>
                            <td>
                                {{ $inv->payment_date ? $inv->payment_date->format('d-m-Y') : '-' }}
                            </td>
                            <td>
                                {{ $inv->payment_for }}
                            </td>
                            <td>
                                <a href="{{ route('invoices.receipt', $inv->id) }}" target="_blank" class="btn-download-action">
                                    Download<br>Receipt <i class="bi bi-box-arrow-up-right fs-8 ms-1"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('invoices.invoice', $inv->id) }}" target="_blank" class="btn-download-action">
                                    Download<br>Invoice <i class="bi bi-box-arrow-up-right fs-8 ms-1"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                No Receipts or Invoices Found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
