<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
        <style>
        label
        {
            display:inline-block;
            width:200px;
            color:white;
        }

        .div_deg 
        {
            padding:10px;
        }

    </style>
  </head>
  <body>
    
    @include('admin.header')

    @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="text-white">Update Coffee</h2>

          <form action="{{ url('update_coffee', $coffee->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="div_deg">
                <label>Coffee Name</label>
                <input type="text" name="name" value="{{ $coffee->name }}">
            </div>

            <div class="div_deg">
                <label>Details</label>
                <textarea name="details">{{ $coffee->detail }}</textarea>
            </div>

            <div class="div_deg">
                <label>Category</label>
                <select name="category" required>
                    <option value="Coffee Series" {{ $coffee->category == 'Coffee Series' ? 'selected' : '' }}>Coffee Series</option>
                    <option value="Non-Coffee Series" {{ $coffee->category == 'Non-Coffee Series' ? 'selected' : '' }}>Non-Coffee Series</option>
                    <option value="Sparkling" {{ $coffee->category == 'Sparkling' ? 'selected' : '' }}>Sparkling</option>
                </select>
            </div>



            <div class="div_deg">
                <label>Price</label>
                <input type="text" name="price" value="{{ $coffee->price }}">
            </div>

            <div class="div_deg">
                <label>Current Image</label>
                <img width="150" src="/coffee_img/{{ $coffee->image }}">
            </div>

            <div class="div_deg">
                <label>Change Image</label>
                <input type="file" name="image">
            </div>

            <div class="div_deg">
                <input type="submit" class="btn btn-success" value="Update Coffee">
            </div>
          </form> 
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>