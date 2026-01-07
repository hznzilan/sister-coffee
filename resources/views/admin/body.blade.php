<h2 class="h5 no-margin-bottom">Dashboard</h2>
      </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex flex-column align-items-start">
                <div class="title d-flex align-items-center">
                  <div class="icon" style="margin-right: 10px;"><i class="icon-user-1"></i></div>
                  <strong>Total Users</strong>
                </div>
                <div class="number dashtext-1" style="margin-top: 10px;">{{$total_user}}</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex flex-column align-items-start">
                <div class="title d-flex align-items-center">
                  <div class="icon" style="margin-right: 10px;"><i class="icon-list-1"></i></div>
                  <strong>Total Items</strong>
                </div>
                <div class="number dashtext-2" style="margin-top: 10px;">{{$total_coffee}}</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex flex-column align-items-start">
                <div class="title d-flex align-items-center">
                  <div class="icon" style="margin-right: 10px;"><i class="icon-bill"></i></div>
                  <strong>Total Revenue</strong>
                </div>
                <div class="number dashtext-1" style="margin-top: 10px;">RM {{$total_revenue}}</div>
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 20px;">
          <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex flex-column align-items-start">
                <div class="title d-flex align-items-center">
                  <div class="icon" style="margin-right: 10px;"><i class="icon-padnote"></i></div>
                  <strong>Total Orders</strong>
                </div>
                <div class="number dashtext-3" style="margin-top: 10px;">{{$total_order}}</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex flex-column align-items-start">
                <div class="title d-flex align-items-center">
                  <div class="icon" style="margin-right: 10px;"><i class="icon-paper-and-pencil"></i></div>
                  <strong>Pending Orders</strong>
                </div>
                <div class="number dashtext-3" style="margin-top: 10px;">{{$pending_order}}</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="statistic-block block">
              <div class="progress-details d-flex flex-column align-items-start">
                <div class="title d-flex align-items-center">
                  <div class="icon" style="margin-right: 10px;"><i class="icon-check"></i></div>
                  <strong>Total Delivered</strong>
                </div>
                <div class="number dashtext-4" style="margin-top: 10px;">{{$total_delivered}}</div>
              </div>
            </div>
          </div>
        </div> 

      </div>
    </section>