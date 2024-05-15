@extends('layouts.app')
@section('style')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-tt pe-3">
                    <h1>Subscription Plans</h1>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="alert alert-success" role="alert">
                    Currently you are subscribed to {{ $currentPlan->name }}. Upgrade to
                    {{ $currentPlan->name == 'Basic Plan' ? 'Business Plan' : 'Enterprise' }} to get lead to more
                    features.
                </div>
            </div>
            <div class="pricing-table mt-4">

                <!--end row-->
                <div class="text-center">
                    <button class="btn border-1 p-2 monthly-btn"
                        style="background-color: #F9F9F9;
                        border-radius: 24px;
                        font-size: 23px;
                        width: 136px;">Monthly</button>
                    <button class="btn border-1 p-2 yearly-btn"
                        style="background-color: #F9F9F9;
                        border-radius: 24px;
                        font-size: 23px;
                        width: 136px;">Yearly</button>
                </div>

                <hr />
                <br>
                <div class="row row-cols-1 row-cols-lg-3 monthly-plans">
                    <!-- Free Tier -->
                    @foreach ($plansMonthly as $index => $planMonthly)
                        <div class="col">

                            <div class="card mb-5 mb-lg-0 bg-info"
                                style="{{ $planMonthly->name == $currentPlan->name ? 'margin-top: -20px; margin-bottom: 20px; height: 600px;' : 'margin-bottom: 20px; width:500px' }}">
                                <div class="card-body"
                                    style="{{ $planMonthly->name == $currentPlan->name ? 'background-color:#0092CD; border-radius:15px; color:white' : 'background-color:#F9F9F9; border-radius:15px' }}">
                                    <h5 class="card-title grey-text text-uppercase text-center"
                                        style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                        {{ $planMonthly->name }}
                                    </h5>
                                    <h6 class="card-price text-center"
                                        style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                        ${{ $planMonthly->amount }}<span class="term">/month</span></h6>
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-transparent"
                                            style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                            Single User</li>
                                        <li class="list-group-item bg-transparent"
                                            style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">5GB
                                            Storage</li>
                                        <li
                                            class="list-group-item bg-transparent"style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                            Unlimited Public Projects</li>
                                        <li
                                            class="list-group-item bg-transparent"style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                            Community Access</li>
                                        <li
                                            class="list-group-item bg-transparent"style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                            Unlimited
                                            Private Projects</li>
                                        <li class="list-group-item bg-transparent"
                                            style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                            Dedicated
                                            Phone Support</li>
                                        <li class="list-group-item bg-transparent"
                                            style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                            Free
                                            Subdomain</li>
                                        <li
                                            class="list-group-item bg-transparent"style="{{ $planMonthly->name == $currentPlan->name ? 'color:white' : '' }}">
                                            Monthly
                                            Status Reports</li>
                                    </ul>
                                    <div class="d-grid"> <a href="#" class="btn my-2 radius-30 text-center"
                                            style="{{ $planMonthly->name != $currentPlan->name
                                                ? 'width: 271px;height: 55px;margin: 0 auto; border-radius: 24px;border: 1px;background-color:#0092CD;color:white;font-size:20px; font-weight:500;display: flex;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        justify-content: center; align-items: center;'
                                                : 'width: 271px;height: 55px;margin: 0 auto;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    border-radius: 24px; border: 1px;background-color:white;color:black;font-size:20px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    font-weight:500;display: flex;justify-content: center;align-items: center;' }}">{{ $planMonthly->name != $currentPlan->name ? 'Upgrade Now' : 'Current Plan' }}</a>
                                    </div>


                                </div>
                            </div>




                        </div>
                    @endforeach
                </div>

                <div class="row row-cols-1 row-cols-lg-3 yearly-plans" style="display: none;">
                    <!-- Free Tier -->
                    @foreach ($plansYearly as $index => $planYearly)
                        <div class="col">

                            <div class="card mb-5 mb-lg-0 bg-info"
                                style="{{ $planYearly->amount == $currentPlan->amount ? 'margin-top: -20px; margin-bottom: 20px; height: 600px;' : 'margin-bottom: 20px; width:500px' }}">
                                <div class="card-body"
                                    style="{{ $planYearly->amount == $currentPlan->amount ? 'background-color:#0092CD; border-radius:15px;color:white' : 'background-color:#F9F9F9; border-radius:15px' }}">
                                    <h5 class="card-title grey-text
                                    text-uppercase text-center"
                                        </h5>
                                        <h6 class="card-price text-center"
                                            style="{{ $planYearly->name == $currentPlan->name && $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                            ${{ $planYearly->amount }}<span class="term">/Year</span></h6>
                                        <hr class="my-4"
                                            style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item bg-transparent"
                                                style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                                Single User</li>
                                            <li class="list-group-item bg-transparent"
                                                style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                                5GB
                                                Storage</li>
                                            <li class="list-group-item bg-transparent"
                                                style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                                Unlimited Public Projects</li>
                                            <li class="list-group-item bg-transparent"
                                                style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                                Community Access</li>
                                            <li class="list-group-item bg-transparent"
                                                style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                                Unlimited
                                                Private Projects</li>
                                            <li class="list-group-item bg-transparent"
                                                style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                                Dedicated
                                                Phone Support</li>
                                            <li class="list-group-item bg-transparent"
                                                style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                                Free
                                                Subdomain</li>
                                            <li class="list-group-item bg-transparent"
                                                style="{{ $planYearly->amount == $currentPlan->amount ? 'color:white' : '' }}">
                                                Monthly
                                                Status Reports</li>
                                        </ul>

                                        <div class="d-grid"> <a href="#" class="btn my-2 radius-30 text-center"
                                                style="{{ $planYearly->amount != $currentPlan->amount
                                                    ? 'width: 271px;height: 55px;margin: 0 auto; border-radius: 24px;border: 1px;background-color:#0092CD;color:white;font-size:20px; font-weight:500;display: flex;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        justify-content: center; align-items: center;'
                                                    : 'width: 271px;height: 55px;margin: 0 auto;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    border-radius: 24px; border: 1px;background-color:white;color:black;font-size:20px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    font-weight:500;display: flex;justify-content: center;align-items: center;' }}">{{ $planYearly->amount != $currentPlan->amount ? 'Upgrade Now' : 'Current Plan' }}</a>
                                        </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mt-3">
                <div class="breadcrumb-tt pe-3">
                    <h1>Subscription History</h1>
                </div>

            </div>
            <div class="col-12 text-center mt-4"
                style="display:flex; justify-content:center;border:1px solid #F9F9F9;border-radius:30px; margin-bottom:40px ">
                <table class="table"
                    style="width:100%;backgroud-color:#F9F9F9; margin-bottom:30px margin-left:120px; font-size:18px">
                    <thead>
                        <tr style="
                        border-bottom: 3px solid #0000002b;">
                            <th>Package Name</th>
                            <th>Monthly/Anually</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($planHistory->count() != 0)
                            @foreach ($planHistory as $ph)
                                <tr>

                                    <td>{{ $ph->plan->name }}</td>
                                    <td>{{ $ph->plan->duration }}</td>
                                    <td>{{ $ph->start_date }}</td>
                                    <td>{{ $ph->end_date }}</td>
                                    <td>{!! $ph->subscription_status == 1
                                        ? '<span class="badge bg-success text-white shadow-sm w-100">Active</span>'
                                        : '<span class="badge bg-danger text-white shadow-sm w-100">Inactive</span>' !!}</td>

                                </tr>
                            @endforeach
                        @else
                            <p>No Subscription History</p>
                        @endif




                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <!-- Add this in your head section -->
    <script>
        $(document).ready(function() {
            // Show monthly plans by default
            $('.monthly-btn').addClass('active');
            $('.monthly-plans').show();

            // Toggle between monthly and yearly plans
            $('.monthly-btn').click(function() {
                $('.monthly-btn').addClass('active');
                $('.yearly-btn').removeClass('active');
                $('.monthly-plans').show();
                $('.yearly-plans').hide();
            });

            $('.yearly-btn').click(function() {
                $('.yearly-btn').addClass('active');
                $('.monthly-btn').removeClass('active');
                $('.yearly-plans').show();
                $('.monthly-plans').hide();
            });
        });
    </script>








    <!-- Add this at the end of your HTML, before the closing </body> tag -->
    <!-- Add this in your head section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add this at the end of your HTML, before the closing </body> tag -->
    <script>
        $(document).ready(function() {
            var delayTimer;
            fetchAllProducts();
            // Add an event listener to the search input
            $('#name').on('input', function() {
                clearTimeout(delayTimer);

                var inputValue = $(this).val();

                // Search only if the string is at least 3 characters long
                if (inputValue.length >= 3) {
                    // Set a delay before triggering the search
                    delayTimer = setTimeout(function() {
                        searchProducts(inputValue);
                    }, 500); // Adjust the delay as needed
                } else {
                    fetchAllProducts()
                }
            });

            // Function to search products and update the table
            function searchProducts(searchValue) {
                $.ajax({
                    url: '{{ route('searchProducts') }}', // Replace with your Laravel route
                    method: 'GET',
                    data: {
                        search: searchValue
                    },
                    success: function(data) {
                        // Update the table with the filtered results

                        $("#ajaxData").html(data);
                    }
                });
            }

            // Function to fetch all products
            function fetchAllProducts() {
                $.ajax({
                    url: '{{ route('searchProducts') }}', // Replace with your Laravel route
                    method: 'GET',
                    success: function(data) {
                        // Update the table with all products
                        $("#ajaxData").html(data);
                    }
                });
            }
        });
    </script>
@endsection
