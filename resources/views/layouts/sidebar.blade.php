<!-- Vue -->
<script src="https://unpkg.com/vue@2.7.14/dist/vue.js"></script>
<!-- Include Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<style>
   .sidebar-left {
  height: 100vh;           /* Full screen height */
  overflow: hidden;        /* Let Perfect Scrollbar handle scrolling */
  position: relative;
}

.sidebar-left .navigation-left {
  padding: 0;
  margin: 0;
  list-style: none;
}
/* Sidebar */
.side-content-wrap {
  width: 240px;
  transition: transform 0.3s ease;
}

/* On small screens, hide by default */
@media (max-width: 1199px) {
  .side-content-wrap {
    transform: translateX(-100%);
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    background: #fff; /* adjust for your theme */
    z-index: 99;
  }

  .side-content-wrap.active {
    transform: translateX(0);
  }

  /* Overlay */
  .sidebar-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    z-index: 1040;
  }

  .sidebar-overlay.active {
    display: block;
  }
}


</style>
<div class="side-content-wrap" id="startEndApp">
   <section class="ps-container sidebar-left rtl-ps-none ps scroll open ps--active-y">
      <div>
         <ul class="navigation-left">
            <li data-item="dashboard" data-submenu="true" class="nav-item active">
               <a href="/" class="nav-item-hold"><i class="nav-icon i-Bar-Chart"></i> <span class="nav-text">Menu</span></a> 
               <div class="triangle"></div>
            </li>
             @if($user->hasRole('Administrator') || $user->can('view POS'))
            <li data-item="Sales" data-submenu="true" class="nav-item">
               <a href="#" class="nav-item-hold"><i class="nav-icon i-Full-Basket"></i> <span class="nav-text">Sales</span></a> 
               <div class="triangle"></div>
            </li>
            @endif

            @if($user->hasRole('Administrator') || $user->can('view Inventory'))
            <li data-item="Inventory" data-submenu="true" class="nav-item">
               <a href="#" class="nav-item-hold"><i class="nav-icon i-Building"></i> <span class="nav-text">Inventory</span></a> 
               <div class="triangle"></div>
            </li>
            @endif


            <li data-item="employee_dashboard" data-submenu="true" class="nav-item" style="display: none;">
               <a href="/employee/dashboard" class="nav-item-hold"><i class="nav-icon i-Bar-Chart"></i> <span class="nav-text">Dashboard</span></a> 
               <div class="triangle"></div>
            </li>
            <li data-item="EmployeeProfile" data-submenu="true" class="nav-item" style="display: none;">
               <a href="#" class="nav-item-hold"><i class="nav-icon i-ID-2"></i> <span class="nav-text">My Profile</span></a> 
               <div class="triangle"></div>
            </li>

            @if($user->hasRole('Administrator') || $user->can('view People'))
            <li data-item="EmployeeSubordinates" data-submenu="true" class="nav-item" style="display: none;"><a href="#" class="nav-item-hold"><i class="nav-icon i-Business-Mens"></i> <span class="nav-text">My Subordinates</span></a></li>
            <li data-item="People" data-submenu="true" class="nav-item">
               <a href="#" class="nav-item-hold"><i class="nav-icon i-Business-Mens"></i> <span class="nav-text">People</span></a> 
               <div class="triangle"></div>
            </li>
            @endif

            @if($user->hasRole('Administrator') || $user->can('view Workforce'))
            <li data-item="Workforce" data-submenu="true" class="nav-item">
               <a href="#" class="nav-item-hold"><i class="nav-icon i-Library"></i> <span class="nav-text">Workforce</span></a> 
               <div class="triangle"></div>
            </li>
            @endif

            @if($user->hasRole('Administrator') || $user->can('view Accounting'))
            <li data-item="Accounting" data-submenu="true" class="nav-item">
               <a href="#" class="nav-item-hold"><i class="nav-icon i-Edit-Map"></i> <span class="nav-text">Accounting</span></a> 
               <div class="triangle"></div>
            </li>
            @endif

            @if($user->hasRole('Administrator') || $user->can('view Reports'))
            <li data-item="reports" data-submenu="true" class="nav-item">
               <a href="#" class="nav-item-hold"><i class="nav-icon i-Line-Chart"></i> <span class="nav-text">Reports</span></a> 
               <div class="triangle"></div>
            </li>
            @endif

            @if($user->hasRole('Administrator') || $user->can('view Settings'))
            <li data-item="settings" data-submenu="true" class="nav-item">
               <a href="#" class="nav-item-hold"><i class="nav-icon i-Data-Settings"></i> <span class="nav-text">Settings</span></a> 
               <div class="triangle"></div>
            </li>
            @endif

            
         </ul>
      </div>
      <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
         <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
      </div>
      <div class="ps__rail-y" style="top: 0px; height: 830px; right: 0px;">
         <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 770px;"></div>
      </div>
   </section>
   <section class="ps-container sidebar-left-secondary ps rtl-ps-none">
      <div>
         <ul data-parent="EmployeeProfile" class="childNav d-none">
            <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
         </ul>
         <ul data-parent="EmployeeSubordinates" class="childNav d-none">
            <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
         </ul>
         {{-- <ul data-parent="dashboard" class="childNav d-none d-block">
            <li class="nav-item"><a href="/app/dashboard/main" class=""><i class="nav-icon i-Bar-Chart"></i> <span class="item-name">Branch</span></a></li>
            <li class="nav-item dropdown-sidemenu">
               <a href="#"><i class="nav-icon i-Line-Chart"></i> <span class="item-name">Global</span> <i class="dd-arrow i-Arrow-Down"></i></a> 
               <ul class="submenu">
                  <li><a href="/app/dashboard/workforce" class=""><i class="nav-icon i-ID-Card"></i> <span class="item-name">Workforce</span></a></li>
                  <li><a href="/app/dashboard/inventory" class=""><i class="nav-icon i-ID-Card"></i> <span class="item-name">Inventory</span></a></li>
                  <li><a href="/app/dashboard/sales" class=""><i class="nav-icon i-ID-Card"></i> <span class="item-name">Sales</span></a></li>
                  <li><a href="/app/dashboard/accounting" class=""><i class="nav-icon i-ID-Card"></i> <span class="item-name">Accounting</span></a></li>
               </ul>
            </li>
            <li class="nav-item"><a href="/app/dashboard/log-histories" class=""><i class="nav-icon i-Administrator"></i> <span class="item-name">Log History</span></a></li>
         </ul> --}}
         <ul data-parent="reports" class="childNav d-none">
            <li class="nav-item"><a href="/app/reports/x-reading" class=""><i class="nav-icon i-Full-Basket"></i> <span class="item-name">POS</span></a> </li>
            <li class="nav-item dropdown-sidemenu">
               <a href="#">
                  <i class="nav-icon i-Full-Cart"></i>
                  <span class="item-name">Sales</span>
                  <i class="dd-arrow i-Arrow-Down"></i>
               </a>
               <ul class="submenu">
                  <li class="nav-item">
                     <a href="{{ route('reports.sales-journal') }}" class="">
                        <i class="nav-icon i-Book"></i>
                        <span class="item-name">Sales Journal</span>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item"><a href="/app/reports/y-reading" class=""><i class="nav-icon i-Building"></i> <span class="item-name">Inventory</span></a> </li>
            <li class="nav-item"><a href="/app/reports/y-reading" class=""><i class="nav-icon i-Library"></i> <span class="item-name">Workforce</span></a> </li>
            <li class="nav-item"><a href="/app/reports/y-reading" class=""><i class="nav-icon i-Receipt-3"></i> <span class="item-name">Accounting</span></a> </li>
               {{-- <a href="#"><i class="nav-icon i-Library"></i> <span class="item-name">Workforce</span> <i class="dd-arrow i-Arrow-Down"></i></a> 
               <ul class="submenu">
                  <li><a href="/app/reports/workforce/summary" class=""><i class="nav-icon i-ID-Card"></i> <span class="item-name">Summary</span></a></li>
                  <li><a href="/app/reports/workforce/employee-profiles" class=""><i class="nav-icon i-Business-ManWoman"></i> <span class="item-name">Employee Profiles</span></a></li>
                  <li><a href="/app/reports/workforce/employee-files" class=""><i class="nav-icon i-File-Pictures"></i> <span class="item-name">Employee Files</span></a></li>
                  <li><a href="/app/reports/workforce/shifts" class=""><i class="nav-icon i-Chef"></i> <span class="item-name">Shifts</span></a></li>
                  <li><a href="/app/reports/workforce/timesheets" class=""><i class="nav-icon i-Calendar-4"></i> <span class="item-name">Timesheets</span></a></li>
                  <li><a href="/app/reports/workforce/overtimes" class=""><i class="nav-icon i-Over-Time"></i> <span class="item-name">Regular Overtimes</span></a></li>
                  <li><a href="/app/reports/workforce/restday-overtimes" class=""><i class="nav-icon i-Over-Time"></i> <span class="item-name">Restday Overtimes</span></a></li>
                  <li><a href="/app/reports/workforce/salary-loans" class=""><i class="nav-icon i-Credit-Card"></i> <span class="item-name">Salary Loans</span></a></li>
                  <li><a href="/app/reports/workforce/payroll-summaries" class=""><i class="nav-icon i-Receipt-4"></i> <span class="item-name">Payroll Summary</span></a></li>
                  <li><a href="/app/reports/workforce/incident-reports" class=""><i class="nav-icon i-Link-2"></i> <span class="item-name">Incident Reports</span></a></li>
                  <li><a href="/app/reports/workforce/disciplinary-actions" class=""><i class="nav-icon i-Financial"></i> <span class="item-name">Disciplinary Actions</span></a></li>
                  <li><a href="/app/reports/workforce/leaves" class=""><i class="nav-icon i-Ticket"></i> <span class="item-name">Leaves</span></a></li>
                  <li><a href="/app/reports/workforce/benefits" class=""><i class="nav-icon i-Betvibes"></i> <span class="item-name">Benefits</span></a></li>
               </ul>
            </li> --}}
            {{-- <li class="nav-item dropdown-sidemenu">
               <a href="#"><i class="nav-icon i-Building"></i> <span class="item-name">Inventory</span> <i class="dd-arrow i-Arrow-Down"></i></a> 
               <ul class="submenu">
                  <li><a href="/app/reports/inventory/summary" class=""><i class="nav-icon i-Posterous"></i> <span class="item-name">Summary Report</span></a></li>
                  <li><a href="/app/reports/inventory/adjustment-summary" class=""><i class="nav-icon i-Data-Settings"></i> <span class="item-name">Products and Inventories Adjustments Report</span></a></li>
                  <li><a href="/app/reports/inventory/procurements" class=""><i class="nav-icon i-Computer-Secure"></i> <span class="item-name">PRF Report</span></a></li>
                  <li><a href="/app/reports/inventory/purchase-orders" class=""><i class="nav-icon i-Billing"></i> <span class="item-name">Po - Purchase Orders</span></a></li>
                  <li><a href="/app/reports/inventory/transfers" class=""><i class="nav-icon i-Jeep-2"></i> <span class="item-name">Warehouse to Warehouse(Inbound) Report</span></a></li>
                  <li><a href="/app/reports/inventory/warehouse-transfers" class=""><i class="nav-icon i-Jeep"></i> <span class="item-name">Warehouse to Warehouse(Outbound) Report</span></a></li>
                  <li><a href="/app/reports/inventory/stock-requests" class=""><i class="nav-icon i-Safe-Box"></i> <span class="item-name">Branch to Branch(Inbound) Report</span></a></li>
                  <li><a href="/app/reports/inventory/send-outs" class=""><i class="nav-icon i-Mail-Outbox"></i> <span class="item-name">Branch to Branch(Outbound) Report</span></a></li>
                  <li><a href="/app/reports/inventory/disbursements" class=""><i class="nav-icon i-Split-Vertical"></i> <span class="item-name">Inventory Requests</span></a></li>
                  <li><a href="/app/reports/inventory/processed-goods" class=""><i class="nav-icon i-Recycling-2"></i> <span class="item-name">Processed Goods Report</span></a></li>
                  <li><a href="/app/reports/inventory/audits" class=""><i class="nav-icon i-Approved-Window"></i> <span class="item-name">Audit Report</span></a></li>
                  <li><a href="/app/reports/inventory/input-taxes" class=""><i class="nav-icon i-Dollar"></i> <span class="item-name">Input Taxes</span></a></li>
               </ul>
            </li> --}}
            {{-- <li class="nav-item dropdown-sidemenu">
               <a href="#"><i class="nav-icon i-Full-Cart"></i> <span class="item-name">Sales</span> <i class="dd-arrow i-Arrow-Down"></i></a> 
               <ul class="submenu">
                  <li><a href="/app/reports/sales/summary" class=""><i class="nav-icon i-Pie-Chart"></i> <span class="item-name">Summary</span></a></li>
                  <li><a href="/app/reports/sales/sales-journal" class=""><i class="nav-icon i-Book"></i> <span class="item-name">Sales Journal</span></a></li>
                  <li><a href="/app/reports/sales/orders" class=""><i class="nav-icon i-Bookmark"></i> <span class="item-name">Orders and Reservations</span></a></li>
                  <li><a href="/app/reports/sales/quotations" class=""><i class="nav-icon i-Full-Basket"></i> <span class="item-name">Quotations</span></a></li>
                  <li><a href="/app/reports/sales/pick-ups" class=""><i class="nav-icon i-Hand"></i> <span class="item-name">Pick-Up Report</span></a></li>
                  <li><a href="/app/reports/sales/deliveries" class=""><i class="nav-icon i-Jeep"></i> <span class="item-name">Delivery Report</span></a></li>
                  <li><a href="/app/reports/sales/discounts" class=""><i class="nav-icon i-Coins"></i> <span class="item-name">Discounts</span></a></li>
                  <li><a href="/app/reports/sales/voided-sales" class=""><i class="nav-icon i-Billing"></i> <span class="item-name">Voided Sales</span></a></li>
                  <li><a href="/app/reports/sales/output-taxes" class=""><i class="nav-icon i-Receipt-3"></i> <span class="item-name">Output Taxes</span></a></li>
               </ul>
            </li> --}}
            {{-- <li class="nav-item dropdown-sidemenu">
               <a href="#"><i class="nav-icon i-Edit-Map"></i> <span class="item-name">X Reading</span> <i class="dd-arrow i-Arrow-Down"></i></a> 
               <ul class="submenu">
                  <li><a href="/app/reports/accounting/accounts-receivable" class=""><i class="nav-icon i-Add-Cart"></i> <span class="item-name">Accounts Receivable</span></a></li>
                  <li><a href="/app/reports/accounting/accounts-payable" class=""><i class="nav-icon i-Bag-Coins"></i> <span class="item-name">Accounts Payable</span></a></li>
                  <li><a href="/app/reports/accounting/ledger" class=""><i class="nav-icon i-Folders"></i> <span class="item-name">General Ledger</span></a></li>
                  <li><a href="/app/reports/accounting/balance-sheet" class=""><i class="nav-icon i-Newspaper"></i> <span class="item-name">Balance Sheet</span></a></li>
                  <li><a href="/app/reports/accounting/profit-loss-statement" class=""><i class="nav-icon i-Minimize-Window"></i> <span class="item-name">Profit and Loss Statement</span></a></li>
                  <li><a href="/app/reports/accounting/sales-journal" class=""><i class="nav-icon i-Password-shopping"></i> <span class="item-name">Sales Journal</span></a></li>
                  <li><a href="/app/reports/accounting/expense-journal" class=""><i class="nav-icon i-Receipt"></i> <span class="item-name">Expense Journal</span></a></li>
                  <li><a href="/app/reports/accounting/tax-journal" class=""><i class="nav-icon i-Receipt-3"></i> <span class="item-name">Tax Journal</span></a></li>
                  <li><a href="/app/reports/accounting/assets-summary" class=""><i class="nav-icon i-Building"></i> <span class="item-name">Assets Summary</span></a></li>
               </ul>
            </li> --}}
         </ul>
         {{-- <ul data-parent="Workforce" class="childNav d-none">
            <li class="nav-item"><a href="/app/workforce/upload-files" class=""><i class="nav-icon i-Upload-Window"></i> <span class="item-name">Upload Employee Files</span></a></li>
            <li class="nav-item"><a href="/app/workforce/assign-shifts" class=""><i class="nav-icon i-Business-Mens"></i> <span class="item-name">Assign Shifts</span></a></li>
            <li class="nav-item"><a href="/app/workforce/assign-leaves" class=""><i class="nav-icon i-Ticket"></i> <span class="item-name">Assign Leaves</span></a></li>
            <li class="nav-item"><a href="/app/workforce/assign-benefits" class=""><i class="nav-icon i-Betvibes"></i> <span class="item-name">Assign Benefits</span></a></li>
            <li class="nav-item"><a href="/app/workforce/assign-allowances" class=""><i class="nav-icon i-Money-2"></i> <span class="item-name">Assign Allowances</span></a></li>
            <li class="nav-item"><a href="/app/workforce/leave-requests" class=""><i class="nav-icon i-Blinklist"></i> <span class="item-name">Request For Leaves</span></a></li>
            <li class="nav-item"><a href="/app/workforce/overtime-requests" class=""><i class="nav-icon i-Over-Time"></i> <span class="item-name">Request for Regular Overtime</span></a></li>
            <li class="nav-item"><a href="/app/workforce/restday-overtime-requests" class=""><i class="nav-icon i-Over-Time"></i> <span class="item-name">Request for Restday Overtime</span></a></li>
            <li class="nav-item"><a href="/app/workforce/salary-loans" class=""><i class="nav-icon i-Credit-Card"></i> <span class="item-name">Salary Loan</span></a></li>
            <li class="nav-item"><a href="/app/workforce/payrolls" class=""><i class="nav-icon i-Receipt-4"></i> <span class="item-name">Process Payroll</span></a></li>
            <li class="nav-item"><a href="/app/workforce/time-keeper" class=""><i class="nav-icon i-Time-Machine"></i> <span class="item-name">Time Keeper</span></a></li>
            <li class="nav-item"><a href="/app/workforce/incident-reports" class=""><i class="nav-icon i-Link-2"></i> <span class="item-name">Create Incident Report</span></a></li>
            <li class="nav-item"><a href="/app/workforce/disciplinary-actions" class=""><i class="nav-icon i-Financial"></i> <span class="item-name">Create Disciplinary Actions</span></a></li>
            <li class="nav-item"><a href="/app/workforce/generate-workforce-labels" class=""><i class="nav-icon i-Network-Window"></i> <span class="item-name">Generate Workforce Labels</span></a></li>
            <li class="nav-item"><a href="/app/workforce/assign-commission-models" class=""><i class="nav-icon i-Tag-5"></i> <span class="item-name">Assign Commission Models</span></a></li>
            <li class="nav-item dropdown-sidemenu">
               <a href="#"><i class="nav-icon i-Gear"></i> <span class="item-name">Settings</span> <i class="dd-arrow i-Arrow-Down"></i></a> 
               <ul class="submenu">
                  <li><a href="/app/workforce/settings/departments" class=""><i class="nav-icon i-Window"></i> <span class="item-name">Departments</span></a></li>
                  <li><a href="/app/workforce/settings/designations" class=""><i class="nav-icon i-Worker"></i> <span class="item-name">Designations</span></a></li>
                  <li><a href="/app/workforce/settings/employment-status-list" class=""><i class="nav-icon i-ID-Card"></i> <span class="item-name">Status</span></a></li>
                  <li><a href="/app/workforce/settings/files" class=""><i class="nav-icon i-File-Cloud"></i> <span class="item-name">Files</span></a></li>
                  <li><a href="/app/workforce/settings/time_keeping" class=""><i class="nav-icon i-Time-Machine"></i> <span class="item-name">Time Keeping</span></a></li>
                  <li><a href="/app/workforce/settings/shifts" class=""><i class="nav-icon i-Chef"></i> <span class="item-name">Shifts</span></a></li>
                  <li><a href="/app/workforce/settings/night-differentials" class=""><i class="nav-icon i-Over-Time"></i> <span class="item-name">Night Differential</span></a></li>
                  <li><a href="/app/workforce/settings/leaves" class=""><i class="nav-icon i-Letter-Open"></i> <span class="item-name">Leaves</span></a></li>
                  <li><a href="/app/workforce/settings/holidays" class=""><i class="nav-icon i-Calendar-2"></i> <span class="item-name">Holidays</span></a></li>
                  <li><a href="/app/workforce/settings/benefits" class=""><i class="nav-icon i-Betvibes"></i> <span class="item-name">Benefits</span></a></li>
                  <li><a href="/app/workforce/settings/allowances" class=""><i class="nav-icon i-Money-Bag"></i> <span class="item-name">Allowances</span></a></li>
                  <li><a href="/app/workforce/settings/payroll_details" class=""><i class="nav-icon i-Mail-Money"></i> <span class="item-name">Additional Payroll Details</span></a></li>
                  <li><a href="/app/workforce/settings/commission-models" class=""><i class="nav-icon i-Tag-5"></i> <span class="item-name">Commission Models</span></a></li>
                  <li><a href="/app/workforce/settings/disciplinary-actions" class=""><i class="nav-icon i-Financial"></i> <span class="item-name">Disciplinary Actions</span></a></li>
               </ul>
            </li>
         </ul> --}}
         <ul data-parent="Inventory" class="childNav d-none">
            <li class="nav-item"><a href="/products" class=""><i class="nav-icon i-Posterous"></i> <span class="item-name">Products and Components</span></a></li>
            <li class="nav-item"><a href="/app/inventory/adjustments" class=""><i class="nav-icon i-Laptop-Secure"></i> <span class="item-name">Inventory Adjustments</span></a></li>
            {{-- <li class="nav-item"><a href="/app/inventory/procurements" class=""><i class="nav-icon i-Computer-Secure"></i> <span class="item-name">PRF - Procurement Request Form</span></a></li> --}}
            <li class="nav-item">
    <a href="{{ route('inventory_purchase_orders.index') }}" class="{{ request()->routeIs('inventory_purchase_orders.*') ? 'active' : '' }}">
        <i class="nav-icon i-Billing"></i>
        <span class="item-name">PO - Purchase Orders</span>
    </a>
</li>
            <li class="nav-item"><a href="/app/inventory/purchase-deliveries" class=""><i class="nav-icon i-Ambulance"></i> <span class="item-name">Transfer</span></a></li>
            {{-- <li class="nav-item"><a href="/app/inventory/transfers" class=""><i class="nav-icon i-Jeep-2"></i> <span class="item-name">Warehouse to Warehouse (Inbound)</span></a></li> --}}
            {{-- <li class="nav-item"><a href="/app/inventory/warehouse-transfers" class=""><i class="nav-icon i-Jeep-2"></i> <span class="item-name">Warehouse to Warehouse (Outbound)</span></a></li> --}}
            {{-- <li class="nav-item"><a href="/app/inventory/stock-requests" class=""><i class="nav-icon i-Safe-Box"></i> <span class="item-name">Branch to Branch (Inbound)</span></a></li> --}}
            {{-- <li class="nav-item"><a href="/app/inventory/send-out-stocks" class=""><i class="nav-icon i-Mail-Outbox"></i> <span class="item-name">Branch to Branch (Outbound)</span></a></li> --}}
            {{-- <li class="nav-item"><a href="/app/inventory/disbursements" class=""><i class="nav-icon i-Split-Vertical"></i> <span class="item-name">Inventory Request</span></a></li> --}}
            {{-- <li class="nav-item"><a href="/app/inventory/processed-goods" class=""><i class="nav-icon i-Recycling-2"></i> <span class="item-name">Log Processed Goods</span></a></li> --}}
            <li class="nav-item"><a href="/inventory/audits" class=""><i class="nav-icon i-Approved-Window"></i> <span class="item-name">Audits</span></a></li>
            {{-- <li class="nav-item"><a href="/app/inventory/print-labels" class=""><i class="nav-icon i-Tag-4"></i> <span class="item-name">Generate and Print Labels</span></a></li> --}}
            <li class="nav-item dropdown-sidemenu">
               {{-- <a href="#"><i class="nav-icon i-Gear"></i> <span class="item-name">Settings</span> <i class="dd-arrow i-Arrow-Down"></i></a>  --}}
               <ul class="submenu">
                  <li class="nav-item"><a href="/app/settings/warehouses" class=""><i class="nav-icon i-Building"></i> <span class="item-name">Warehouses</span></a></li>
                  <li><a href="/app/inventory/settings/assign-warehouses" class=""><i class="nav-icon i-Building"></i> <span class="item-name">Assign Default Warehouse</span></a></li>
                  <li><a href="/app/inventory/settings/categories" class=""><i class="nav-icon i-ID-Card"></i> <span class="item-name">Category</span></a></li>
                  <li><a href="/app/inventory/settings/brands" class=""><i class="nav-icon i-Landscape"></i> <span class="item-name">Brands</span></a></li>
                  <li><a href="/app/inventory/settings/units" class=""><i class="nav-icon i-Road-2"></i> <span class="item-name">Units</span></a></li>
                  <li><a href="/app/inventory/settings/supplier-types" class=""><i class="nav-icon i-Add-UserStar"></i> <span class="item-name">Supplier Types</span></a></li>
                  <li><a href="/app/inventory/settings/adjustment-types" class=""><i class="nav-icon i-Maximize-Window"></i> <span class="item-name">Adjustment Types</span></a></li>
                  <li><a href="/app/inventory/settings/discounts" class=""><i class="nav-icon i-Coins"></i> <span class="item-name">Discounts</span></a></li>
                  <li><a href="/app/inventory/settings/taxes" class=""><i class="nav-icon i-Dollar"></i> <span class="item-name">Taxes</span></a></li>
               </ul>
            </li>
         </ul>
         <ul data-parent="Sales" class="childNav d-none">
            <li class="nav-item">
               <a href="#" class="startEndTrigger">
                  <i class="nav-icon i-Clothing-Store"></i>
                  <span class="item-name">Start / End of the Day</span>
               </a>
            </li>
            
            <!-- POS link -->
            <li class="nav-item">
            <a href="/orders" class="posLink">
               <i class="nav-icon i-Receipt"></i>
               <span class="item-name">POS</span>
            </a>
            </li>
            <li class="nav-item"><a href="#" class=""><i class="nav-icon i-Remove-Bag"></i> <span class="item-name">Sales Invoicing</span></a></li>
            <li class="nav-item"><a href="/app/sales/manage-deliveries" class=""><i class="nav-icon i-Jeep"></i> <span class="item-name">Orders and Reservations</span></a></li>
            <li class="nav-item"><a href="/app/sales/manage-pick-ups" class=""><i class="nav-icon i-Hand"></i> <span class="item-name">Closing</span></a></li>
            <li class="nav-item"><a href="/kitchen" class=""><i class="nav-icon i-Full-Basket"></i> <span class="item-name">KDS</span></a></li>
            {{-- <li class="nav-item"><a href="/app/sales/quotations" class=""><i class="nav-icon i-Receipt-3"></i> <span class="item-name">Quotations</span></a></li> --}}
            {{-- <li class="nav-item"><a href="/app/sales/manage-prospects" class=""><i class="nav-icon i-Checked-User"></i> <span class="item-name">Manage Prospects</span></a></li> --}}
            <li class="nav-item dropdown-sidemenu">
               {{-- <a href="#"><i class="nav-icon i-Gear"></i> <span class="item-name">Settings</span> <i class="dd-arrow i-Arrow-Down"></i></a>  --}}
               <ul class="submenu">
                  <li><a href="/app/sales/settings/payment-methods" class=""><i class="nav-icon i-Wallet"></i> <span class="item-name">Payment Methods</span></a></li>
                  <li><a href="/app/sales/settings/discounts" class=""><i class="nav-icon i-Coins"></i> <span class="item-name">Discounts</span></a></li>
                  <li><a href="/app/sales/settings/customer-types" class=""><i class="nav-icon i-Business-ManWoman"></i> <span class="item-name">Customer Types</span></a></li>
                  <li><a href="/app/sales/settings/sales-areas" class=""><i class="nav-icon i-Suitcase"></i> <span class="item-name">Sales Areas</span></a></li>
                  <li><a href="/app/sales/settings/sales-personnels" class=""><i class="nav-icon i-Add-UserStar"></i> <span class="item-name">Sales Personnel</span></a></li>
                  <li><a href="/app/sales/settings/taxes" class=""><i class="nav-icon i-Receipt-3"></i> <span class="item-name">Taxes</span></a></li>
                  <li><a href="/app/sales/settings/prospect-statuses" class=""><i class="nav-icon i-Approved-Window"></i> <span class="item-name">Prospect Status</span></a></li>
               </ul>
            </li>
         </ul>
         <ul data-parent="Accounting" class="childNav d-none">
            <li class="nav-item"><a href="/app/accounting/account-receivables" class=""><i class="nav-icon i-Add-Cart"></i> <span class="item-name">Accounts Receivable</span></a></li>
            <li class="nav-item"><a href="/app/accounting/account-payables" class=""><i class="nav-icon i-Bag-Coins"></i> <span class="item-name">Accounts Payable</span></a></li>
            <li class="nav-item"><a href="/app/accounting/assets" class=""><i class="nav-icon i-Building"></i> <span class="item-name">Assets Management</span></a></li>
            <li class="nav-item"><a href="/app/accounting/fund-transfers" class=""><i class="nav-icon i-Letter-Sent"></i> <span class="item-name">Fund Transfer</span></a></li>
            <li class="nav-item"><a href="/app/accounting/liquidations" class=""><i class="nav-icon i-Maximize-Window"></i> <span class="item-name">Liquidate</span></a></li>
         </ul>
         <ul data-parent="People" class="childNav d-none">
            <li class="nav-item"><a href="/app/people/users" class=""><i class="nav-icon i-Administrator"></i> <span class="item-name">Users</span></a></li>
            <li class="nav-item"><a href="/app/people/employees" class=""><i class="nav-icon i-Engineering"></i> <span class="item-name">Employees</span></a></li>
            <li class="nav-item"><a href="{{ route('customers.index') }}" class=""><i class="nav-icon i-Business-ManWoman"></i> <span class="item-name">Customers</span></a></li>
            <li class="nav-item"><a href="{{ route('suppliers.index') }}" class=""><i class="nav-icon i-Business-Mens"></i> <span class="item-name">Suppliers</span></a></li>
         </ul>
         <ul data-parent="settings" class="childNav d-none">
            <ul class="submenu" style="text-align: left; padding-left: 0;">
               <li class="nav-item">
                  <a href="{{ route('settings.create') }}" class="">
                     <i class="nav-icon i-Library"></i>
                     <span class="item-name">System Settings</span>
                  </a>
               </li>
               <li class="nav-item"><a href="{{ route('branches.index') }}" class=""><i class="nav-icon i-Location-2"></i> <span class="item-name">Branches</span></a></li>
               <li class="nav-item"><a href="/users" class=""><i class="nav-icon i-Administrator"></i> <span class="item-name">Users</span></a></li>
               <li class="nav-item"><a href="/permission" class=""><i class="nav-icon i-Key"></i> <span class="item-name">Permission</span></a></li>
               <li class="nav-item"><a href="/app/settings/general/accounting" class=""><i class="nav-icon i-Data-Backup"></i> <span class="item-name">Back-Up Database</span></a></li>
            </ul>
            <li class="nav-item dropdown-sidemenu">
               <a href="#"><i class="nav-icon i-Gear"></i> <span class="item-name">General Settings</span> <i class="dd-arrow i-Arrow-Down"></i></a> 
               <ul class="submenu">
                  <li class="nav-item"><a href="/app/settings/general/workforce" class=""><i class="nav-icon i-Library"></i> <span class="item-name">Workforce</span></a></li>
                  
                  <li class="nav-item dropdown-sidemenu">
                     <a href="#">
                        <i class="nav-icon i-Building"></i>
                        <span class="item-name">Inventory</span>
                        <i class="dd-arrow i-Arrow-Down"></i>
                     </a>
                     <ul class="submenu">
                        <li class="nav-item">
                           <a href="{{ route('categories.index') }}">
                              <i class="nav-icon i-ID-Card"></i>
                              <span class="item-name">Category</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ route('units.index') }}">
                              <i class="nav-icon i-Road-2"></i>
                              <span class="item-name">Unit</span>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li class="nav-item dropdown-sidemenu">
                     <a href="#">
                        <i class="nav-icon i-Full-Basket"></i>
                        <span class="item-name">Sales</span>
                        <i class="dd-arrow i-Arrow-Down"></i>
                     </a>
                     <ul class="submenu">
                        <li class="nav-item">
                           <a href="{{ route('payments.index') }}">
                              <i class="nav-icon i-Wallet"></i>
                              <span class="item-name">Payment Methods</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ route('discounts.index') }}">
                              <i class="nav-icon i-Coins"></i>
                              <span class="item-name">Discounts</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item dropdown-sidemenu">
                     <a href="#">
                        <i class="nav-icon i-Edit-Map"></i>
                        <span class="item-name">Accounting</span>
                        <i class="dd-arrow i-Arrow-Down"></i>
                     </a>
                     <ul class="submenu">
                        <li class="nav-item">
                           <a href="{{ route('cash_equivalents.index') }}">
                              <i class="nav-icon i-Wallet"></i>
                              <span class="item-name">Cash Equivalents</span>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
      <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
         <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
      </div>
      <div class="ps__rail-y" style="top: 0px; right: 0px; height: 830px;">
         <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 806px;"></div>
      </div>
   </section>
   <div class="sidebar-overlay"></div>
   @include('layouts.start_end_day_modal')
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".sidebar-left");
    if (sidebar) {
      new PerfectScrollbar(sidebar, {
        wheelPropagation: true,   // lets the mouse wheel work properly
        suppressScrollX: true     // disable horizontal scrollbar
      });
    }
  });
  
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.querySelector(".menu-toggle");
  const sidebar = document.getElementById("sidebar");

  if (toggleBtn && sidebar) {
    toggleBtn.addEventListener("click", function () {
      sidebar.classList.toggle("active");
    });
  }
  const modal = document.getElementById('startPOSModal');
  if (!modal) return;

  const body = modal.querySelector('.modal-body');

  // If mouse wheel isn't scrolling, forward wheel events to the modal body.
  modal.addEventListener('wheel', function(e) {
    if (!body) return;

    const maxScrollTop = body.scrollHeight - body.clientHeight;
    const current = body.scrollTop;
    const delta = e.deltaY;

    // Determine if the body can scroll in the requested direction
    const scrollingDown = delta > 0;
    const canScrollDown = current < maxScrollTop;
    const canScrollUp = current > 0;

    // If the body can scroll in the wheel direction, scroll it and prevent the event bubbling to parent
    if ((scrollingDown && canScrollDown) || (!scrollingDown && canScrollUp)) {
      body.scrollTop = Math.min(Math.max(0, current + delta), maxScrollTop);
      e.preventDefault(); // stop outer scrolling
    }
    // else allow it to bubble (optional) so page/backdrop could handle it
  }, { passive: false }); // must be non-passive to call preventDefault()

});

const now = new Date();

// Format date as YYYY-MM-DD
const currentDate = now.toISOString().split('T')[0];

// Format time as HH:MM (24-hour format for input type="time")
const currentTime = now.toTimeString().slice(0, 5); // e.g., "09:45"

new Vue({
  el: "#startEndApp",
  data: {
    modalMode: 'open',
    endStep: 'confirm',
    sessionData: null,
    branch_id: 1,
    terminal_no: 'T1',
    startingFund: 0,
    cash_sales: 0,
    total_denomination: 0,
    tip: 0,

    currentDate: '',
    currentTime: '',
    closingDate: '',
    closingTime: '',
    endCash: '',
    remarks: '',

    hasStartedPOS: localStorage.getItem('hasStartedPOS') === '1' ? 1 : 0,

    // 💵 Individual denomination fields (now match DB columns)
    denom_1000: '',
   denom_500: '',
   denom_200: '',
   denom_100: '',
   denom_50: '',
   denom_20: '',
   denom_10: '',
   denom_5: '',
   denom_1: '',
   denom_050: '',
   denom_025: '',
   denom_010: '',
   denom_005: '',

    cashSales: 0,
    gcashSales: 0,
    bdoSales: 0,
    bpiSales: 0,
    receivableBPI: 0,
    tip: '',
   transferTo: '',
   cashEquivalents: [],
   transferAmount: '',

   manualTimeEdit: false,
   allPayments: [],
   },

  mounted() {
    this.setInitialDateTime();
    this.checkExistingSession();
    this.startAutoTimeUpdate();
    this.fetchAllPayments();

    // Attach after mount just in case
  this.$nextTick(() => {
    this.attachDenominationListeners();
  });
  // Run once Vue is mounted
  this.initDenominationWatcher();

  // Attach again when modal is shown
  const modalEl = document.getElementById('startPOSModal');
  if (modalEl) {
    modalEl.addEventListener('shown.bs.modal', () => {
      console.log('Modal shown — attaching listeners');
      this.attachDenominationListeners();
    });
  }
  setTimeout(() => {
    this.attachDenominationListeners();
  }, 300); // wait 0.3s to let modal/table render
    

    // 🧩 Attach sidebar handlers
    document.querySelector('.startEndTrigger')?.addEventListener('click', (e) => {
      e.preventDefault();
      this.promptStartEndModal();
    });

    document.querySelector('.posLink')?.addEventListener('click', (e) => {
      e.preventDefault();
      this.handlePOSNavigation('/orders');
    });

    // 🧩 Handle direct URL access (if someone types /orders manually)
    if (window.location.pathname === '/orders') {
      this.handlePOSNavigation('/orders', true);
    }
  },

  
  computed: {
    // 🔹 Total from denomination inputs
  denominationTotal() {
    const total =
      (this.denom_1000 * 1000) +
      (this.denom_500 * 500) +
      (this.denom_200 * 200) +
      (this.denom_100 * 100) +
      (this.denom_50 * 50) +
      (this.denom_20 * 20) +
      (this.denom_10 * 10) +
      (this.denom_5 * 5) +
      (this.denom_1 * 1) +
      (this.denom_050 * 0.5) +
      (this.denom_025 * 0.25) +
      (this.denom_010 * 0.1) +
      (this.denom_005 * 0.05);

    return isNaN(total) ? 0 : parseFloat(total.toFixed(2));
  },

  totalCashSales() {
    if (!Array.isArray(this.allPayments)) return 0;

    return this.allPayments
      .filter(p => p.payment_name === 'Cash On Hand' || p.payment_name === 'Cash')
      .reduce((sum, p) => sum + parseFloat(p.total_amount || 0), 0);
  },
  
  totalGCashSales() {
    return this.allPayments
      .filter(p => p.payment_name === 'GCash')
      .reduce((sum, p) => sum + parseFloat(p.total_amount || 0), 0);
  },

  // 🔹 POS cash sales + starting fund
  posCashSalesTotal() {
      const total = this.totalCashSales;

      return parseFloat(total.toFixed(2));
  },
  
  totalBDOSales() {
    return this.allPayments
      .filter(p => p.payment_name === 'BDO')
      .reduce((sum, p) => sum + parseFloat(p.total_amount || 0), 0);
  },
  
  totalBPISales() {
    return this.allPayments
      .filter(p => p.payment_name === 'BPI')
      .reduce((sum, p) => sum + parseFloat(p.total_amount || 0), 0);
  },
  
  totalSales() {
    // Total of all payment types
    return this.totalCashSales + this.totalGCashSales + this.totalBDOSales + this.totalBPISales;
  },
  

  // 🔹 Expected cash = sales + fund
  expectedCash() {
   const value = parseFloat(this.startingFund) + parseFloat(this.posCashSalesTotal);
   return isNaN(value) ? 0 : parseFloat(value.toFixed(2));
  },

  // 🔹 Actual cash counted (denominations + tips)
  actualCashCounted() {
    return this.denominationTotal;
  },

  // 🔹 Shortage (if actual < expected)
  shortage() {
    const diff = this.actualCashCounted - this.expectedCash;
    return diff < 0 ? Math.abs(diff).toFixed(2) : 0;
  },

  // 🔹 Overage (if actual > expected)
  overage() {
    const diff = this.actualCashCounted - this.expectedCash;
    return diff > 0 ? diff.toFixed(2) : 0;
  },

  
},

  methods: {
    // 🕒 Initialize current and closing datetime
    setInitialDateTime() {
      const now = new Date();
      const date = now.toISOString().split('T')[0];
      const time = now.toTimeString().slice(0, 5);
      this.currentDate = date;
      this.currentTime = time;
      this.closingDate = date;
      this.closingTime = time;
    },

    // ⏱ Auto update time
    startAutoTimeUpdate() {
      setInterval(() => {
        if (!this.manualTimeEdit) {
          const now = new Date();
          const time = now.toTimeString().slice(0, 5);
          this.currentTime = time;
          this.closingTime = time;
        }
      }, 1000);
    },
    async fetchOpenSession() {
  try {
    const response = await axios.get('/pos/session/check', {
      params: { terminal_no: this.terminal_no }
    });

    const session = response.data.session;
    console.log('Fetched session data:', cashEquivalents);
    
    if (response.data.has_open_session && session) {
      // 🧾 Set your data
      this.startingFund = session.starting_fund || 0;

      // 🪣 Also store it in localStorage for persistence (optional)
      localStorage.setItem('startingFund', this.startingFund);

    } else {
      console.warn('No open session found for terminal', this.terminal_no);
    }
  } catch (error) {
    console.error('Error fetching session info:', error);
  }
},


    initDenominationWatcher() {
    const modal = document.getElementById('endOfDayModal');
    if (modal) {
      // Bootstrap event: fires when modal is fully shown
      modal.addEventListener('shown.bs.modal', () => {
        console.log('✅ Modal shown — attaching denomination listeners');
        this.attachDenominationListeners();
      });
    }
  },

    // 🔍 Check session state
    async checkExistingSession() {
      try {
        const { data } = await axios.get('/pos/session/check', {
          params: { terminal_no: this.terminal_no }
        });

        if (data.has_open_session && data.session.status === 'open') {
          this.hasStartedPOS = 1;
          this.sessionData = data.session;
          localStorage.setItem('hasStartedPOS', '1');
          this.modalMode = 'close';
          this.startingFund = data.session.starting_fund;
        } else {
          this.hasStartedPOS = 0;
          localStorage.removeItem('hasStartedPOS');
          this.modalMode = 'open';
        }
      } catch (err) {
        console.error(err);
      }
    },

    // 🧩 For “Start / End of the Day” manual menu click
    promptStartEndModal() {
      this.checkExistingSession().then(() => {
        const modalEl = document.getElementById('startPOSModal');
        if (modalEl) {
          const modal = new bootstrap.Modal(modalEl);
          this.fetchOpenSession();
          modal.show();
        }
      });
    },

    // 🧭 Handle when clicking /orders or typing URL directly
    async handlePOSNavigation(url, auto = false) {
      try {
        const response = await axios.get('/pos/session/check', {
          params: { terminal_no: this.terminal_no }
        });

        const session = response.data.session;

        if (response.data.has_open_session && session.status === 'open') {
          // ✅ Allow access to POS
          if (!auto) window.location.href = url;
        } else {
          // ❌ Show modal
          this.hasStartedPOS = 0;
          localStorage.removeItem('hasStartedPOS');
          this.modalMode = 'open';

          this.$nextTick(() => {
            const modalEl = document.getElementById('startPOSModal');
            if (modalEl && !bootstrap.Modal.getInstance(modalEl)) {
              const modal = new bootstrap.Modal(modalEl);
              this.fetchOpenSession();
              modal.show();
            }
          });

          if (auto) console.log('🔒 Session not started — showing modal.');
        }
      } catch (error) {
        console.error('Error checking session before POS navigation:', error);
      }
    },

    async handleConfirmEndDay() {
      // 🧠 simulate unpaid order check
      const unpaidOrders = await this.checkUnpaidOrders();

      if (unpaidOrders) {
        this.endStep = 'unpaid';
      } else {
        this.endStep = 'form'; // move to actual end form
      }
    },

    handleUnpaidOk() {
    // Close the modal
    const modalEl = document.getElementById('startPOSModal');
    const modalInstance = bootstrap.Modal.getInstance(modalEl);
    modalInstance.hide();

    // Reset for next open
    this.endStep = 'confirm';
  },

async checkUnpaidOrders() {
   try {
      const res = await axios.get('/check-unpaid-orders', {
         params: { cashier_id: this.cashier_id }
      });
      return res.data.has_unpaid_orders;
   } catch (error) {
      console.error('Error checking unpaid orders:', error);
      return false;
   }
},


    resetEndStep() {
      this.endStep = 'confirm';
    },

    fetchAllPayments() {
      axios.get('/get-all-payments')
        .then(response => {
          const order = response.data.order;
          this.allPayments = order.totals_by_payment || [];
        })
      },

    // ✅ Start POS session
    async submitStartPOS() {
      try {
        const res = await axios.post('/pos/session/open', {
          branch_id: this.branch_id,
          terminal_no: this.terminal_no,
          cash_fund: this.startingFund,
        });

        if (res.status === 201) {
          alert('POS session started successfully!');
          this.hasStartedPOS = 1;
          localStorage.setItem('hasStartedPOS', '1');
          this.modalMode = 'close';
          window.location.href = '/orders';
        }
      } catch (err) {
        alert(err.response?.data?.message || 'Failed to start session.');
      }
    },

    getPaymentTotal(name) {
      const payment = this.allPayments.find(p => p.payment_name === name);
      return parseFloat(payment?.total_amount || 0);
   },

   // / 🔴 End POS session (save to user_sessions)
    async submitEndPOS() {
      try {
        // Compute total denomination value
        const totalCashCounted =
          (this.denom_1000 * 1000) +
          (this.denom_500 * 500) +
          (this.denom_200 * 200) +
          (this.denom_100 * 100) +
          (this.denom_50 * 50) +
          (this.denom_20 * 20) +
          (this.denom_10 * 10) +
          (this.denom_5 * 5) +
          (this.denom_1 * 1) +
          (this.denom_050 * 0.5) +
          (this.denom_025 * 0.25) +
          (this.denom_010 * 0.10) +
          (this.denom_005 * 0.05);

        this.endCash = totalCashCounted;

        const shortage = totalCashCounted < this.cashSales
          ? this.cashSales - totalCashCounted
          : 0;

        const overage = totalCashCounted > this.cashSales
          ? totalCashCounted - this.cashSales
          : 0;

        const payload = {
            branch_id: this.branch_id,
            terminal_no: this.terminal_no,
            transaction_date: this.closingDate,
            transaction_time: this.closingTime,
            starting_fund: this.startingFund,
           cash_sales: this.totalCashSales, // automatically updated
            gcash_sales: this.totalGCashSales,
            bdo_sales: this.totalBDOSales,
            bpi_sales: this.totalBPISales,
            receivable_bpi: this.receivableBPI,
            tip: this.tip,

            // 💰 Automatically computed totals
            total_cash_counted: this.actualCashCounted,
            shortage: this.shortage,
            overage: this.overage,

            transfer_to: this.transferTo,
            transfer_amount: this.transferAmount,
            remarks: this.remarks,

            // 🔹 Include all denomination fields (for backend saving)
            d_1000: this.denom_1000,
            d_500: this.denom_500,
            d_200: this.denom_200,
            d_100: this.denom_100,
            d_50: this.denom_50,
            d_20: this.denom_20,
            d_10: this.denom_10,
            d_5: this.denom_5,
            d_1: this.denom_1,
            d_050: this.denom_050,
            d_025: this.denom_025,
            d_010: this.denom_010,
            d_005: this.denom_005,
            };


        console.log('Payload:', payload);

        const response = await axios.post('/pos/session/close', payload);

        if (response.data.success) {
          alert('POS session closed successfully!');
          this.hasStartedPOS = 0;
          localStorage.removeItem('hasStartedPOS');
          this.modalMode = 'open';
        } else {
          alert(response.data.message || 'Failed to close session.');
        }
      } catch (err) {
        console.error(err);
        alert(err.response?.data?.message || 'Error closing session.');
      }
},
  },
  watch: {
    currentTime(newVal, oldVal) {
      if (newVal !== oldVal) this.manualTimeEdit = true;
    },
  }
});
</script>
