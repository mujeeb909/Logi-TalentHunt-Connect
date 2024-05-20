@extends('layouts.app')
@section('style')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endsection
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            {{-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Products</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Show Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div id='alertContainer'>
                        </div>


                        <div class="card-body">
                            <div class="card">
                                <div class="card-header input-title">
                                    <h4>{{ __('Add New Products') }}</h4>
                                </div>
                                <div class="card-body card-body-paddding">
                                    <form id="productForm" data-route="{{ route('saveProducts') }}">
                                        @csrf
                                        <div class="border border-3 p-4 rounded borderRmv">

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="product_name" required class="form-control"
                                                    id="product_name" placeholder="Enter Product Name">
                                            </div>

                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="text" class="form-control" name='price' id="price"
                                                    placeholder="Enter Price" required>

                                            </div>

                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <select class="form-control selectric lang" name="category" required>
                                                    <option value="">{{ __('Select Root Category') }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id == old('category') ? 'selected' : '' }}>
                                                            {{ str_repeat('- ', $category->depth) }}{{ $category->name }}
                                                        </option>
                                                        @if ($category->children->isNotEmpty())
                                                            @include(
                                                                'admin.categories.partials.subcategories',
                                                                ['categories' => $category->children]
                                                            )
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>




                                            <div class="mb-3">
                                                <div class="d-grid">
                                                    <button id="productSave" class="btn btn-info">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                            </div><!--end row-->
                            </form>
                        </div>
                    </div>

                </div>
            </div> --}}




            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="alertPlaceholder" class="container mt-3"></div>
                            <h1>Contact Manager</h1>
                            <div class="row p-2">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-md-4 position-relative">
                                            <input type="text" name="search" id="search" class="form-control"
                                                placeholder="Search"
                                                style="border-radius: 20px; background-color:#F9F9F9; height:45px; width:250px; padding-left: 34px; font-size: 18px;">
                                        </div>


                                        <div class="form-group col-md-4 offset-md-4">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                                                    style="border-radius: 20px; background-color:#F9F9F9; height:45px; width:150px; font-size:20px">
                                                    Sort by
                                                </button>
                                                <ul class="dropdown-menu"
                                                    style="border-radius: 20px; background-color:#F9F9F9; height:60px; width:150px;">
                                                    <li><a href="{{ route('contacts', ['sortOrder' => 'asc']) }}">Asc</a>
                                                    </li>
                                                    <li><a href="{{ route('contacts', ['sortOrder' => 'desc']) }}">Dsc</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <button class="btn pt-2 rounded-25 text-white m-4"
                                                style="background-color: #FF0000; font-size:21px; border-radius:25px; width:150px"
                                                onclick="deleteSelectedRows()"><i class="fa fa-trash mr-4"
                                                    aria-hidden="true"></i>Delete</button>

                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table"
                                                style="border:1px solid #F9F9F9;border-radius:30px; width:99%;backgroud-color:#f6f6f6">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="select-all" name="select-all"
                                                                value="all"></th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>State</th>
                                                        <th>Note</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($enquiries->count() != 0)
                                                        @foreach ($enquiries as $enquirie)
                                                            <tr>
                                                                <th scope="row"><input type="checkbox" id="select"
                                                                        class="select-checkbox" name="select"
                                                                        value="{{ $enquirie->id }}">
                                                                </th>
                                                                </th>
                                                                <td>{{ $enquirie->name }}</td>
                                                                <td>{{ $enquirie->email }}</td>
                                                                <td>{{ $enquirie->phone_no }}</td>
                                                                <td>{{ $enquirie->address }}</td>
                                                                <td>{{ $enquirie->message }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="6">No Contacts found</td>
                                                        </tr>
                                                    @endif


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>



                            </div>



                            <!-- Modal for adding a new supplier -->


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script>
        function deleteSelectedRows() {

            const checkboxes = document.querySelectorAll('.select-checkbox:checked');
            const selectedIds = [];

            checkboxes.forEach(function(checkbox) {

                selectedIds.push(checkbox.value);
            });
            if (selectedIds == 0) {
                swal("Please select at least one row to delete!", {
                    icon: "error",
                });
                return false;
            }

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover contact info!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('deleteSelectedRows') }}",
                            method: 'POST',
                            data: {
                                ids: selectedIds,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {

                                swal("Poof! Info has been deleted!", {
                                    icon: "success",
                                });

                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                swal("Error Occured!", {
                                    icon: "error",
                                });
                                console.error(error);
                            }
                        });

                    }
                });

        }


        const selectAllCheckbox = document.getElementById('select-all');

        // Get all checkboxes in the table body
        const checkboxes = document.querySelectorAll('#select');

        // Add event listener to "select all" checkbox
        selectAllCheckbox.addEventListener('change', function() {
            // Loop through all checkboxes
            checkboxes.forEach(function(checkbox) {
                // Set checked property of each checkbox to match "select all" checkbox
                checkbox.checked = selectAllCheckbox.checked;
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            $('#search').keyup(function(event) {
                if (event.keyCode === 13) {
                    performSearch();
                }
            });
        });

        function performSearch() {
            // Get the search query from the input field
            var searchQuery = $('#search').val();

            // Redirect to the search route with the search query
            window.location.href = "{{ route('contacts') }}?search=" + searchQuery;
        }
    </script>
@endsection
