<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt - {{ $invoice->receipt_no ?? 'Receipt' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 30px;
            background-color: #f8f9fa;
        }
        .receipt-card {
            max-width: 750px;
            margin: auto;
            background: #fff;
            padding: 40px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #0b2530;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }
        .title {
            color: #0b2530;
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .subtitle {
            font-size: 13px;
            color: #666;
            margin-top: 4px;
        }
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            font-size: 14px;
        }
        .table th {
            background-color: #f1f5f9;
            text-align: left;
        }
        .total-row {
            font-weight: bold;
            background-color: #fafbfc;
        }
        .print-btn-bar {
            text-align: right;
            margin-bottom: 20px;
            max-width: 750px;
            margin: 0 auto 15px auto;
        }
        .btn-print {
            background: #0b2530;
            color: #fff;
            padding: 8px 18px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            font-size: 14px;
        }
        @media print {
            .print-btn-bar { display: none; }
            body { padding: 0; background: #fff; }
            .receipt-card { border: none; box-shadow: none; padding: 10px; }
        }
    </style>
</head>
<body>

    <div class="print-btn-bar">
        <button onclick="window.print()" class="btn-print">Print / Save as PDF</button>
    </div>

    <div class="receipt-card">
        <div class="header">
            <div>
                <h1 class="title">PIPAVAV CUSTOMS BROKERS ASSOCIATION</h1>
                <div class="subtitle">Official Payment Acknowledgement Receipt</div>
            </div>
            <div style="text-align: right;">
                <div style="font-weight: bold; font-size: 16px; color: #0b2530;">RECEIPT</div>
                <div style="font-size: 13px; color: #666;">No: {{ $invoice->receipt_no ?? ('RCP-'.$invoice->id) }}</div>
                <div style="font-size: 13px; color: #666;">Date: {{ $invoice->payment_date ? $invoice->payment_date->format('d-m-Y') : date('d-m-Y') }}</div>
            </div>
        </div>

        <div class="details-grid">
            <div>
                <div style="font-size: 12px; color: #888; text-transform: uppercase;">Received From:</div>
                <div style="font-weight: bold; font-size: 15px; margin-top: 3px;">{{ $invoice->user ? $invoice->user->name : 'Association Member' }}</div>
                <div style="font-size: 13px; color: #555;">{{ $invoice->user ? $invoice->user->email : '' }}</div>
                <div style="font-size: 13px; color: #555; margin-top: 4px;">Membership: <strong>{{ $invoice->membership_type }}</strong></div>
            </div>
            <div style="text-align: right;">
                <div style="font-size: 12px; color: #888; text-transform: uppercase;">Payment Details:</div>
                <div style="font-size: 13px; margin-top: 3px;">Payment Mode: <strong>{{ $invoice->payment_type }}</strong></div>
                @if($invoice->application_no)
                    <div style="font-size: 13px;">Application No (CFS): <strong>{{ $invoice->application_no }}</strong></div>
                @endif
                <div style="font-size: 13px; color: green; font-weight: bold; margin-top: 4px;">Status: PAID</div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Payment For</th>
                    <th style="text-align: right;">Amount (INR)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $invoice->payment_for }} Payment for {{ $invoice->membership_type }}</td>
                    <td>{{ $invoice->payment_for }}</td>
                    <td style="text-align: right;">₹{{ number_format($invoice->amount_paid, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="2" style="text-align: right;">Total Amount Received:</td>
                    <td style="text-align: right;">₹{{ number_format($invoice->amount_paid, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 40px; padding-top: 20px; border-top: 1px dashed #ccc; display: flex; justify-content: space-between; align-items: flex-end;">
            <div style="font-size: 11px; color: #777;">
                This is a computer-generated receipt and does not require a physical signature.<br>
                Pipavav Customs Brokers Association (PCBA)
            </div>
            <div style="text-align: center;">
                <div style="font-size: 12px; font-weight: bold; color: #0b2530;">Authorized Signatory</div>
                <div style="font-size: 11px; color: #888;">PCBA Accounts</div>
            </div>
        </div>
    </div>

</body>
</html>
