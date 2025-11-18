<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Audit Report - {{ $audit->reference_no ?? $audit->id }}</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; color: #333; }
        .header { display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:20px; }
        .logo { max-width:160px; }
        .company { text-align:right; font-size:12px; }
        hr { border:none; border-top:1px solid #444; margin:10px 0 20px; }
        .meta { margin-bottom:20px; font-size:13px; }
        .meta div { margin-bottom:6px; }
        table { width:100%; border-collapse:collapse; font-size:12px; }
        th { background:#1f78b4; color:#fff; padding:8px 10px; text-align:left; }
        td { padding:8px 10px; border-bottom:1px solid #e6e6e6; }
        .text-right { text-align:right; }
        .text-center { text-align:center; }
        .small { font-size:11px; color:#666; }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ public_path('images/logo.png') }}" alt="logo" style="max-width:180px;">
            @else
                <strong>omni</strong>
            @endif
        </div>
        <div class="company">
            <div><strong>Omni Demo System - Cordova Branch</strong></div>
            <div>Cordova Cebu</div>
            <div>09778568750</div>
            <div>noelbugat@gmail.com</div>
            <div class="small">TIN: 1234</div>
        </div>
    </div>

    <hr />

    <div class="meta">
        <div><strong>Reference #:</strong> {{ $audit->reference_no ?? ('AUD-' . $audit->id) }}</div>
        <div><strong>Date of Entry:</strong> {{ $audit->entry_datetime  ?? '' }}</div>
        <div><strong>Date of Actual Audit:</strong> {{ $audit->audit_datetime  ?? '' }}</div>
        <div><strong>Audited by:</strong> {{ optional($audit->auditor)->name ?? '' }}</div>
        <div><strong>Type:</strong> {{ ucfirst($audit->type) }}</div>
    </div>

    <h4>List of Audited Items</h4>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>SKU(Product Code)</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Unit</th>
                <th class="text-right">Quantity On-Hand</th>
                <th class="text-right">Audit Qty</th>
                <th class="text-right">Variance</th>
                <th class="text-right">Variance(%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($audit->items as $item)
                @php
                    $product = $item->product;
                    $component = $item->component;
                    $audited = $item->quantity ?? 0;

                    // Prefer prev_quantity for completed audits when available
                    if (($audit->status ?? null) === 'completed' && !is_null($item->prev_quantity)) {
                        $prev = $item->prev_quantity;
                    } else {
                        $prev = $product->onhand ?? $component->onhand ?? null;
                    }

                    if (is_null($prev)) {
                        $variance = null;
                        $variancePct = null;
                    } else {
                        // Variance = AuditQty - PrevOnHand (matches web report logic)
                        $variance = $audited - $prev;
                        if ($prev != 0) {
                            $variancePct = round(($variance / $prev) * 100, 2);
                        } else {
                            // When prev is zero, if there's a change, show 100%, else 0%
                            $variancePct = ($variance != 0) ? 100 : 0;
                        }
                    }
                @endphp
                <tr>
                    <td>{{ $product ? $product->name : ($component ? $component->name : 'N/A') }}</td>
                    <td>{{ $product ? $product->code : ($component ? $component->code : 'N/A') }}</td>
                    <td>{{ $product ? optional($product->category)->name : ( $component ? optional($component->category)->name : 'N/A' ) }}</td>
                    <td>{{ $product ? optional($product->subcategory)->name : ( $component ? optional($component->subcategory)->name : 'N/A' ) }}</td>
                    <td>{{ $product ? ($product->unit ?? 'pc') : ($component ? ($component->unit ?? 'pc') : 'N/A') }}</td>
                    <td class="text-right">{{ is_null($prev) ? 'N/A' : number_format($prev, 2) }}</td>
                    <td class="text-right">{{ number_format($audited, 2) }}</td>
                    <td class="text-right">{{ is_null($variance) ? 'N/A' : number_format($variance, 2) }}</td>
                    <td class="text-right">{{ is_null($variancePct) ? 'N/A' : ($variancePct . '%') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>