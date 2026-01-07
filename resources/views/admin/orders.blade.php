<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        /* This prevents the text from shrinking */
        .table-deg { 
            min-width: 1200px; /* Forces the table to stay wide so text stays big */
            border-collapse: collapse; 
            color: #e9ecef !important; 
            font-size: 15px !important; /* Kept font size large */
        }
        
        /* The container that allows horizontal scrolling */
        .scroll-container {
            overflow-x: auto;
            white-space: nowrap;
            background-color: #2d3035;
            padding-bottom: 15px;
        }

        .th-deg { 
            background-color: #34373d; 
            color: #E6A673 !important; 
            padding: 15px; 
            border: 1px solid #444; 
            text-transform: uppercase; 
        }

        .td-deg { 
            padding: 10px 15px; 
            border: 1px solid #444; 
            vertical-align: middle; 
            background-color: #2d3035; 
        }

        /* Items alignment fix */
        .inner-table { width: 100%; border: none; margin: 0; }
        .inner-td { 
            padding: 10px 0; 
            border-bottom: 1px solid #3f4248; 
            height: 70px; 
            vertical-align: middle;
        }
        .inner-row:last-child .inner-td { border-bottom: none; }

        .item-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .item-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Styling the scrollbar to look nicer */
        .scroll-container::-webkit-scrollbar {
            height: 8px;
        }
        .scroll-container::-webkit-scrollbar-thumb {
            background: #E6A673; 
            border-radius: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    
    
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
            <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ url('order_search') }}" method="get" class="d-flex mb-4">
                @csrf
                <input type="text" name="search" placeholder="Search by Order ID..." 
                       class="form-control" style="background: #34373d; border: 1px solid #444; color: white;">
                <button type="submit" class="btn ml-2" style="background: #E6A673; color: #1A0F0D; font-weight: bold;">
                    Search
                </button>
                <a href="{{ url('all_orders') }}" class="btn ml-2" style="background: #6c757d; color: white; border: none;">
                    Clear
                </a>
            </form>
        </div>
    </div>
</div>
          <h2 class="h5 no-margin-bottom" style="color: #ffffffff;">Orders Management</h2>

          <div class="scroll-container mt-4">
            <table class="table-deg">
              <thead>
                <tr>
                  <th class="th-deg">Order ID</th>
                  <th class="th-deg">Date</th>
                  <th class="th-deg">Customer</th>
                  <th class="th-deg">Phone</th>
                  <th class="th-deg">Address</th>
                  <th class="th-deg" style="width: 350px;">Items</th>
                  <th class="th-deg">Qty</th>
                  <th class="th-deg">Total Bill</th>
                  <th class="th-deg">Status</th>
                  <th class="th-deg">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $orderGroup)
                @php
                    $firstItem = $orderGroup->first();
                    $totalPrice = $orderGroup->sum(fn($item) => $item->price * $item->quantity);
                @endphp
                <tr>
                  <td class="td-deg">#{{ $firstItem->id }}</td>
                  <td class="td-deg" style="font-size: 13px;">
                    {{ $firstItem->created_at->format('d M Y') }}<br>
                    <small style="color: #6c757d;">{{ $firstItem->created_at->format('h:i A') }}</small>
                  </td>
                  <td class="td-deg"><b style="color: #ffffffff;">{{ $firstItem->name }}</b></td>
                  <td class="td-deg"> {{ $firstItem->phone }}</td>
                  <td class="td-deg" style="max-width: 200px; white-space: normal;">
                      {{ $firstItem->address }}
                  </td>
                  
                  <td class="td-deg" style="padding: 0;">
                    <table class="inner-table">
                        @foreach($orderGroup as $item)
                        <tr class="inner-row">
                            <td class="inner-td" style="padding-left: 10px;">
                                <div class="item-info">
                                    <img src="{{ asset('coffee_img/' . $item->image) }}" class="item-img">
                                    <span style="font-weight: 600;">{{ $item->coffee_title }}</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                  </td>

                  <td class="td-deg" style="padding: 0;">
                    <table class="inner-table">
                        @foreach($orderGroup as $item)
                        <tr class="inner-row">
                            <td class="inner-td text-center">
                                <span style="color: #ffffffff; font-weight: bold;">x{{ $item->quantity }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                  </td>

                  <td class="td-deg" style="font-weight: bold;">RM {{ number_format($totalPrice, 2) }}</td>
                  
                  <td class="td-deg">
                    @if($firstItem->delivery_status == 'processing')
                        <span class="badge badge-warning">Processing</span>
                    @elseif($firstItem->delivery_status == 'in delivery')
                        <span class="badge badge-info">In Delivery</span>
                    @elseif($firstItem->delivery_status == 'delivered')
                        <span class="badge badge-success">Delivered</span>
                    @else
                        <span class="badge badge-danger">Rejected</span>
                    @endif
                  </td>

                  <td class="td-deg text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm dropdown-toggle" style="background-color: #E6A673; color: #1A0F0D; border: none;" data-toggle="dropdown">
                        Update
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" style="background-color: #34373d; border: 1px solid #444;">
                        <a class="dropdown-item text-white" href="{{ url('update_status', [$firstItem->id, 'in delivery']) }}">In Delivery</a>
                        <a class="dropdown-item text-white" href="{{ url('update_status', [$firstItem->id, 'delivered']) }}">Mark Delivered</a>
                        <div class="dropdown-divider" style="border-top: 1px solid #444;"></div>
                        <a class="dropdown-item text-danger font-weight-bold" href="{{ url('update_status', [$firstItem->id, 'rejected']) }}">Reject</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @include('admin.js')
  </body>
</html>