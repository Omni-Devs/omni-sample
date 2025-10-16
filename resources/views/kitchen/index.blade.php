@extends('layouts.app')
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px 12px;
    vertical-align: middle !important;
}

thead {
    background-color: #e9ecf3;
    font-weight: bold;
}

tr {
    transition: background-color 0.3s ease;
}

tr:hover {
    background-color: #dcecff !important;
}

.btn {
    font-size: 0.85rem;
    padding: 4px 8px;
}

.fw-semibold {
    font-weight: 600;
}


</style>
@section('content')
<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">POS</h1>
            <ul>
            <li><a href=""> Kitchen </a></li>
            <!----> <!---->
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div class="wrapper">
        <div class="card mt-4">
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="#" 
                            class="nav-link active">
                            Preparing
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" 
                            class="nav-link">
                            Served
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#"
                            class="nav-link">
                            Walked
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#"
                            class="nav-link">
                            Cancelled
                        </a>
                    </li>
                </ul>
            </nav>
        <div class="card-body">
            <div class="vgt-wrap ">
                <div class="vgt-inner-wrap">
                    <div class="vgt-fixed-header">
                        <!---->
                    </div>
                    <div class="vgt-responsive"style="max-height: 400px; overflow-y: auto;">
                        <table id="vgt-table" class="table-hover tableOne vgt-table custom-vgt-table ">
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
                            <col id="col-9">
                            <col id="col-10">
                            <col id="col-11">
                            <col id="col-12">
                            <col id="col-13">
                            <col id="col-14">
                            <col id="col-15">
                            <col id="col-16">
                            </colgroup>
                            <thead style="min-width: auto; width: auto;">
                            <tr>
                                <th scope="col" class="vgt-left-align text-left sortable">
                                    <span>Order No.</span>
                                    <button><span class="sr-only">Sort table by Order No in descending order</span></button>
                                </th>
                                <th scope="col" class="vgt-left-align text-left sortable">
                                    <span>Time Ordered</span>
                                    <button><span class="sr-only">Sort table by Time Ordered in descending order</span></button>
                                </th>
                                <th scope="col" class="vgt-left-align text-left sortable">
                                    <span>SKU</span>
                                    <button><span class="sr-only">Sort table by SKU in descending order</span></button>
                                </th>
                                <th scope="col" class="vgt-left-align text-left sortable">
                                    <span>Product Name</span>
                                    <button><span class="sr-only">Sort table by Product Name in descending order</span></button>
                                </th>
                                <th scope="col" class="vgt-left-align text-right sortable">
                                    <span>Qty</span>
                                    <button><span class="sr-only">Sort table by Qty in descending order</span></button>
                                </th>
                                <th scope="col" class="vgt-left-align text-right sortable">
                                    <span>Station</span>
                                    <button><span class="sr-only">Sort table by Station in descending order</span></button>
                                </th>
                                <th scope="col" class="vgt-left-align text-right sortable">
                                    <span>Running Time</span>
                                    <button><span class="sr-only">Sort table by Running Time in descending order</span></button>
                                </th>
                                <th scope="col" class="vgt-left-align text-right sortable">
                                    <span>Recipe</span>
                                </th>
                                <th scope="col" class="vgt-left-align text-right">
                                    <span>Action</span>
                                </th>
                            </tr>
                            </thead>
                             <tbody>
                            @php
                                $lastOrderId = null;
                                $colors = [
                                    '#f0f7ff', // light blue
                                    '#fff5e6', // light orange
                                    '#f3f9f1', // light green
                                    '#f9f0ff', // light purple
                                    '#fef7f1', // light beige
                                ];
                                $colorIndex = 0;
                            @endphp

                            @foreach ($orderItems as $item)
                                @php
                                    // Change background color when order ID changes
                                    if ($lastOrderId !== $item['order_id']) {
                                        $colorIndex = ($colorIndex + 1) % count($colors);
                                        $lastOrderId = $item['order_id'];
                                    }

                                    $runningTime = now()->diffInMinutes($item['created_at']);
                                @endphp

                                <tr style="background-color: {{ $colors[$colorIndex] }};">
                                    <td class="text-left fw-bold text-primary">#{{ $item['order_no'] }}</td>
                                    <td class="text-left">{{ $item['created_at']->format('h:i A') }}</td>
                                    <td class="text-left fw-semibold">{{ $item['code'] }}</td>
                                    <td class="text-left">{{ $item['name'] }}</td>
                                    <td class="text-end">{{ $item['qty'] }}</td>
                                    <td class="text-end">{{ $item['station'] }}</td>
                                    <td class="text-end">{{ $runningTime }} mins</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-secondary">Recipe</button>
                                    </td>
                                    <td class="text-right">
                                        @include('layouts.actions-dropdown', [
                                        'id' => $item['order_id'],
                                        'updateRoute' => '#',
                                        'remarksRoute' => '#',
                                        'status' => '#',
                                    ])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
new Vue({
  el: "#app",
  data: {
    order: {
      // Example: server timestamp from database
      created_at: "2025-10-14 17:04:45"
    },
    runningTime: "00:00",
    timer: null,
    stopped: false
  },
  mounted() {
    this.startTimer();
  },
  methods: {
    // ✅ Convert MySQL timestamp → readable AM/PM
    formatTime(datetime) {
      if (!datetime) return "";
      const date = new Date(datetime.replace(" ", "T"));
      return date.toLocaleTimeString("en-US", {
        hour: "2-digit",
        minute: "2-digit",
        hour12: true
      });
    },

    // ✅ Start counting live running time
    startTimer() {
      const start = new Date(this.order.created_at.replace(" ", "T"));
      this.timer = setInterval(() => {
        if (this.stopped) return;
        const now = new Date();
        const diff = Math.floor((now - start) / 1000);
        const minutes = String(Math.floor(diff / 60)).padStart(2, "0");
        const seconds = String(diff % 60).padStart(2, "0");
        this.runningTime = `${minutes}:${seconds}`;
        
      }, 1000);
    },

    // ✅ Stop timer when clicked
    stopTimer() {
      this.stopped = true;
      clearInterval(this.timer);
    }
  }
});
</script>
@endsection