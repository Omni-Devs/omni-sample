<?php

namespace App\Http\Controllers;

use App\Models\CashAudit;
use App\Models\CashAuditRecord;
use App\Models\CashEquivalent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PosClossingController extends Controller
{
    public function index()
    {
        
        return view('closing.index');
    }
    public function getClosed(Request $request)
{
    $branchId = current_branch_id();

    $query = CashAudit::with([
        'cashier',
        'transferTo',
        'auditRecord.submittedBy',   // ✅ REQUIRED
        'auditRecord.transferTo',    // ✅ REQUIRED
    ])
    ->where('branch_id', $branchId);

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    return response()->json(
        $query->orderBy('created_at', 'desc')
              ->paginate($request->per_page ?? 10)
    );
}


    public function create()
    {
        $user = Auth::user();

        // Example IDs (adjust as needed)
        $branchId = $user->branch_id ?? 1;

        // Get next AUTO_INCREMENT value
        $nextId = DB::table('information_schema.TABLES')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'cash_audit_records')
            ->value('AUTO_INCREMENT');


        $referenceNo = sprintf('CAR-%02d-%05d', $branchId, $nextId);

         $cashEquivalent = CashEquivalent::select('id', 'account_number')
            ->where('name', 'Cash On Hand')
            ->get();

        return view('closing.create', [
            'cashEquivalent' => $cashEquivalent,
            'referenceNo' => $referenceNo,
            'createdDatetime' => now()->timezone('Asia/Manila')->format('Y-m-d\TH:i'),
            'submittedBy' => $user->name,
        ]);
    }
    
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'reference_no'      => 'required|string|unique:cash_audit_records,reference_no',
            'created_at'        => 'required|date',
            'transfer_to'       => 'required|exists:cash_equivalents,id',
            'transfer_amount'   => 'required|numeric|min:0',
            'records'           => 'required|array|min:1',
            'records.*.id'      => 'required|exists:cash_audits,id',
            'records.*.transferred_amount' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($validated) {

            /* ---------------------------------
            | Validate amount consistency
            |---------------------------------*/
            $totalFromRecords = collect($validated['records'])
                ->sum(fn ($r) => (float) $r['transferred_amount']);

            if ((float) $validated['transfer_amount'] !== (float) $totalFromRecords) {
                abort(422, 'Transfer amount does not match total of selected transactions.');
            }

            /* ---------------------------------
            | Create CashAuditRecord (parent)
            |---------------------------------*/
            $cashAuditRecord = CashAuditRecord::create([
                'entry_datetime'  => $validated['created_at'],
                'reference_no'    => $validated['reference_no'],
                'submitted_by'    => auth()->id(),
                'transfer_to'     => $validated['transfer_to'],
                'transfer_amount' => $validated['transfer_amount'],
                'total_amount'    => [
                    'total_transferred' => $totalFromRecords
                ],
                'status'          => 'completed',
            ]);

            /* ---------------------------------
            | Attach CashAudits to this record
            |---------------------------------*/
            foreach ($validated['records'] as $record) {
                CashAudit::where('id', $record['id'])->update([
                    'cash_audit_record_id' => $cashAuditRecord->id,
                    'status'               => 'completed',
                ]);
            }
        });

        return response()->json([
            'message' => 'Cash audit closing submitted successfully.'
        ], 201);
    }   
}

