<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display member receipts and invoices (Membership, Renewal, CHA Pass applications).
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // If member, only see own invoices; if admin, can view all
        $query = Invoice::query();
        if (!$user->isAdmin()) {
            $query->where('user_id', $user->id);
        }

        // Optional filter for payment_for or search
        if ($request->filled('payment_for')) {
            $query->where('payment_for', $request->payment_for);
        }

        $invoices = $query->latest('payment_date')->get();

        return view('receipt-and-invoice', compact('invoices'));
    }

    /**
     * Download or view printable receipt.
     */
    public function downloadReceipt(Invoice $invoice)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $invoice->user_id !== $user->id) {
            abort(403);
        }

        return view('invoices.receipt-print', compact('invoice'));
    }

    /**
     * Download or view printable tax invoice.
     */
    public function downloadInvoice(Invoice $invoice)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $invoice->user_id !== $user->id) {
            abort(403);
        }

        return view('invoices.invoice-print', compact('invoice'));
    }
}
