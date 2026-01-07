<!DOCTYPE html>
<html>
  <head> 
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
          <form action="{{ url('upload_coffee') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="div_deg">
                    <label>Coffee Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="div_deg">
                    <label>Coffee Details</label>
                    <textarea name="details" cols="50" rows="5" required></textarea>
                </div>

                <div class="div_deg">
                    <label>Category</label>
                    <select name="category" required>
                        <option value="Coffee Series">Coffee Series</option>
                        <option value="Non-Coffee Series">Non-Coffee Series</option>
                        <option value="Sparkling">Sparkling</option>
                    </select>
                </div>

                <div class="div_deg">
                    <label>Price</label>
                    <input type="number" name="price" step="0.01" required>
                </div>

                <div class="div_deg">
                    <label>Coffee Image</label>
                    <input type="file" name="image">
                </div>

                <div class="div_deg">
                    <input type="submit" class="btn btn-primary" value="Add Coffee">
                </div>
            </form>



          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>