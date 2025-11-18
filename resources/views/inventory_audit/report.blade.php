@extends('layouts.app')
@section('content')
<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Inventory</h1>
            <ul>
            <li><a href=""> Audit Report</a></li>
            <!----> <!---->
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div class="wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="text-bold col-sm-12">
                        <div>
                            <label for="reference_no">Reference #:</label>
                            <span>@{{audit.reference_no}}</span>
                        </div>
                        <div>
                            <label for="date_of_entry">Date of Entry:</label>
                            <span>@{{audit.entry_datetime}}</span>
                        </div>
                        <div>
                            <label for="date_of_actual_audit">Date of Actual Audit:</label>
                            <span>@{{audit.audit_datetime}}</span>
                        </div>
                        <div>
                            <label for="audited_by">Audited By:</label>
                            <span>@{{audit.auditor.name}}</span>
                        </div>
                        <div>
                            <label for="type">Type:</label>
                            <span>@{{audit.type}}</span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <hr class="my-4">
                    </div>
                    <div class="col">
                        <h6 class="text-bold">Items Audited</h6>
                        <div class="vgt-wrap">
                            <div class="vgt-inner-wrap">
                                <div class="vgt-fixed-header">
                                </div>
                                <div class="vgt-responsive">
                                    <table id="vgt-table" class="table-hover tableOne vgt-table">
                                        <colgroup>
                                            <col id="col-0">
                                            <col id="col-1">
                                            <col id="col-2">
                                            <col id="col-3">
                                            <col id="col-4">
                                            <col id="col-5">
                                            <col id="col-6">
                                            <col id="col-7">
                                            <col id="col-8">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>Name</span>
                                                </th>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>SKU(Product Code)</span>
                                                </th>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>Category</span>
                                                </th>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>Subcategory</span>
                                                </th>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>Unit</span>
                                                </th>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>Quantity On-Hand</span>
                                                </th>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>Audit Qty</span>
                                                </th>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>Variance</span>
                                                </th>
                                                <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;">
                                                    <span>Variance(%)</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in audit.items">
                                                <!-- NAME -->
                                                <td>
                                                    @{{ item.product ? item.product.name : (item.component ? item.component.name : 'N/A') }}
                                                </td>

                                                <!-- CODE -->
                                                <td>
                                                    @{{ item.product ? item.product.code : (item.component ? item.component.code : 'N/A') }}
                                                </td>

                                                <!-- CATEGORY -->
                                                <td>
                                                    @{{ item.product 
                                                        ? (item.product.category ? item.product.category.name : 'N/A') 
                                                        : (item.component && item.component.category ? item.component.category.name : 'N/A') 
                                                    }}
                                                </td>

                                                <!-- SUBCATEGORY -->
                                                <td>
                                                    @{{ item.product 
                                                        ? (item.product.subcategory ? item.product.subcategory.name : 'N/A') 
                                                        : (item.component && item.component.subcategory ? item.component.subcategory.name : 'N/A') 
                                                    }}
                                                </td>

                                                <!-- UNIT -->
                                                <td>
                                                    @{{ item.product ? item.product.unit : (item.component ? item.component.unit : 'N/A') }}
                                                </td>

                                                <!-- SYSTEM QTY -->
                                                <td class="text-right">
                                                    @{{ item.prev_display_formatted }}
                                                </td>

                                                <!-- AUDITED QTY -->
                                                <td class="text-right">
                                                    @{{ typeof item.quantity !== 'undefined' && item.quantity !== null ? Number(item.quantity).toFixed(2) : 'N/A' }}
                                                </td>

                                                <!-- VARIANCE -->
                                                <td class="text-right">
                                                    @{{ item.variance_formatted }}
                                                </td>

                                                <!-- VARIANCE % -->
                                                <td class="text-right">
                                                    @{{ item.variance_percentage_formatted }}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 col-sm-12">
                        <a href="{{ route('audits.pdf', $audit->id) }}" class="btn btn-primary">
                            <i class="i-Data-Download mr-2 font-weight-bold"></i>
                            Save as PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Prepare audit data: compute prev display, variance and percentage per item
    (function () {
        const auditData = @json($audit);

        auditData.items = (auditData.items || []).map(function(item) {
            // Determine prev on-hand to show: prefer prev_quantity for completed audits
            let prev = null;
            if (auditData.status === 'completed' && item.prev_quantity !== null && typeof item.prev_quantity !== 'undefined') {
                prev = Number(item.prev_quantity);
            } else if (item.component && item.component.onhand !== null && typeof item.component.onhand !== 'undefined') {
                prev = Number(item.component.onhand);
            } else if (item.product && item.product.onhand !== null && typeof item.product.onhand !== 'undefined') {
                prev = Number(item.product.onhand);
            }

            const auditQty = (typeof item.quantity !== 'undefined' && item.quantity !== null) ? Number(item.quantity) : null;

            let variance = null;
            let variance_pct = null;
            if (prev !== null && auditQty !== null) {
                // Variance = AuditQty - PrevOnHand
                variance = auditQty - prev;
                if (prev !== 0) {
                    variance_pct = (variance / prev) * 100;
                } else {
                    // when prev is zero, express percent as 100% if there is a change, else 0
                    variance_pct = (variance !== 0) ? 100 : 0;
                }
            }

            item.prev_display = prev;
            item.prev_display_formatted = (prev !== null) ? prev.toFixed(2) : 'N/A';
            item.variance = variance;
            item.variance_formatted = (variance !== null) ? variance.toFixed(2) : 'N/A';
            item.variance_percentage = variance_pct;
            item.variance_percentage_formatted = (variance_pct !== null) ? variance_pct.toFixed(2) + '%' : 'N/A';

            return item;
        });

        new Vue({
            el: '#app',
            data: {
                audit: auditData
            }
        });
    })();
</script>

@endsection