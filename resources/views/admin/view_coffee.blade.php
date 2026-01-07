<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        /* Table styling to match Orders Management */
        .table-deg { 
            width: 100%; 
            border-collapse: collapse; 
            color: #e9ecef !important; 
            font-size: 15px !important; 
        }
        
        /* Container for horizontal scrolling */
        .scroll-container {
            overflow-x: auto;
            background-color: #2d3035;
            padding-bottom: 15px;
            border-radius: 8px;
        }

        /* Gold headers */
        .th-deg { 
            background-color: #34373d; 
            color: #E6A673 !important; 
            padding: 15px; 
            border: 1px solid #444; 
            text-transform: uppercase; 
            letter-spacing: 1px;
        }

        /* Dark cells with white borders */
        .td-deg { 
            padding: 15px; 
            border: 1px solid #444; 
            vertical-align: middle; 
            background-color: #2d3035; 
        }

        /* Custom scrollbar for Sisters Coffee theme */
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
          
          @if(session()->has('message'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session()->get('message') }}
              </div>
          @endif

          <div class="row mb-4">
              <div class="col-lg-6">
                  <form action="{{ url('view_coffee') }}" method="get" class="d-flex">
                      <input type="text" name="search" value="{{ request('search') }}" 
                             placeholder="Search coffee name or category..." 
                             class="form-control" 
                             style="background: #34373d; border: 1px solid #444; color: white;">
                      <button type="submit" class="btn ml-2" 
                              style="background: #E6A673; color: #1A0F0D; font-weight: bold;">
                          Search
                      </button>
                      <a href="{{ url('view_coffee') }}" class="btn ml-2" 
                         style="background: #6c757d; color: white; border: none;">
                          Clear
                      </a>
                  </form>
              </div>
          </div>

          <h2 class="h5 no-margin-bottom uppercase tracking-widest" style="color: #ffffff;">All Coffee Menu</h2>

          <div class="scroll-container mt-4">
              <table class="table-deg">
                  <thead>
                      <tr>
                          <th class="th-deg">Image</th>
                          <th class="th-deg">Coffee Name</th>
                          <th class="th-deg">Category</th>
                          <th class="th-deg" style="width: 250px;">Details</th>
                          <th class="th-deg">Price</th>
                          <th class="th-deg">Stock Status</th> 
                          <th class="th-deg">Toggle Stock</th> 
                          <th class="th-deg">Manage</th> 
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($coffee as $item)
                      <tr>
                          <td class="td-deg text-center">
                              <img src="{{ asset('coffee_img/' . $item->image) }}" 
                                   class="rounded" 
                                   style="width: 60px; height: 60px; aspect-square; object-cover; border: 1px solid #444;">
                          </td>

                          <td class="td-deg font-weight-bold" style="color: #ffffff;">{{ $item->name }}</td>

                          <td class="td-deg">
                              <span class="badge badge-info" style="padding: 5px 10px;">{{ $item->category }}</span>
                          </td>

                          <td class="td-deg" style="max-width: 250px;">
                            <div style="font-size: 13px; color: #adb5bd; white-space: normal; line-height: 1.4;">
                                {{ $item->detail }}
                            </div>
                          </td>

                          <td class="td-deg font-weight-bold text-white">RM {{ number_format($item->price, 2) }}</td>
                          
                          <td class="td-deg">
                            @if($item->status == 'active')
                                <span class="badge badge-success" style="background-color: #28a745; padding: 5px 10px;">In Stock</span>
                            @else
                                <span class="badge badge-danger" style="background-color: #dc3545; padding: 5px 10px;">Sold Out</span>
                            @endif
                          </td>

                          <td class="td-deg text-center">
                              <a href="{{ url('toggle_status', $item->id) }}" 
                                 class="btn btn-sm" 
                                 style="background-color: #E6A673; color: #1A0F0D; font-weight: bold; border-radius: 8px;">
                                 Change
                              </a>
                          </td>

                          <td class="td-deg text-center">
                              <div class="btn-group">
                                  <a href="{{url('edit_coffee', $item->id) }}" class="btn btn-sm btn-success mr-2" style="border-radius: 5px;">Update</a>
                                  <a href="{{url('delete_coffee', $item->id)}}" class="btn btn-sm btn-danger" style="border-radius: 5px;" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
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