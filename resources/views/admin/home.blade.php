{{-- @extends('layouts.app') --}}
@section('title', 'Admin Dashboard')
{{-- @section('content') --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
<link rel="stylesheet" href="styles.css">

<div class="py-4 container-fluid fade-in">

    <div class="mb-4 row">
        <div class="col-12">
            <div class="card dashboard-header">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <h1 class="mb-1 dashboard-title">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <a href="https://dpsmap.com/" target="_blank">Directory</a>'s POI Admin
                            </h1>
                            <p class="text-muted mb-md-0">Manage your points of interest database</p>
                        </div>
                        <div class="flex-wrap gap-2 mt-3 d-flex mt-md-0">
                            <div class="me-5">

 <a href="{{ route('admin.users.index') }}">
        <button class="mt-2 btn btn-info mt-md-0">
            <i class="fas fa-users me-2"></i>View Users
        </button>
    </a>
<a href="{{ route('admin.blogs.index') }}">
    <button class="mt-2 btn btn-primary mt-md-0">
        <i class="fas fa-file-alt me-2"></i>View Posts
    </button>
</a>
                                <button class="btn btn-primary" data-bs-toggle="collapse"
                                    data-bs-target="#multiCollapseExample1">
                                    <i class="fas fa-plus-circle me-2"></i>Create POI
                                </button>
                                <button class="btn btn-outline-secondary" data-bs-toggle="collapse"
                                    data-bs-target="#importCollapse">
                                    <i class="fas fa-file-import me-2"></i>Import Data
                                </button>
                            </div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                <button class="btn btn-danger">
                                    <i class="fas fa-file-import me-2"></i>Logout
                                </button>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 collapse" id="importCollapse">
                        <div class="import-form">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3 align-items-end">
                                    <div class="col-12 col-md-8">
                                        <label for="importFile" class="form-label">Select Excel File</label>
                                        <input type="file" name="file" id="importFile" class="form-control" required>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button class="btn btn-success w-100" type="submit">
                                            <i class="fas fa-file-upload me-2"></i>Import Data
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="table-col" class="col-12 col-lg-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Points of Interest</h5>
                    <div class="gap-2 d-flex">
                        <button class="btn btn-sm btn-outline-secondary" id="refreshTable">
                            <i class="fas fa-sync-alt me-1"></i> Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive " style="overflow-x: hidden !important;">
                        <table id="poiTable" class="table table-hover display responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>POI_Name_Eng</th>
                                    <th>POI_Name_Myn</th>
                                    <th>Type</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Coordinates</th>
                                    <th>Verify Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pois as $index => $poi)
                                <tr>
                                    <td>{{ $poi->id }}</td>
                                    <td>
                                        {{ $poi->poi_n_eng }}
                                    </td>
                                    <td>
                                        {{ $poi->poi_n_myn3 }}
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $poi->type }}</span>
                                    </td>
                                    <td>{{ $poi->address }}</td>
                                    <td>
                                        @if ($poi->phone)
                                        <a href="tel:{{ $poi->phone }}" class="text-decoration-none">
                                            <i class="fas fa-phone-alt me-1 text-muted"></i>{{ $poi->phone }}
                                        </a>
                                        @else
                                        <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="d-block text-muted">
                                            <i class="fas fa-map-pin me-1"></i>{{ $poi->latitude }},
                                            {{ $poi->longitude }}
                                        </small>
                                        <a href="https://maps.google.com/?q={{ $poi->latitude }},{{ $poi->longitude }}"
                                            target="_blank" class="small text-primary">
                                            <i class="fas fa-external-link-alt me-1"></i>View on map
                                        </a>
                                    </td>
                                    <td>{{ $poi->verify_dat }}</td>
                                        <td>
                                            @if ($poi->verify_dat)
                                                <span class="badge badge-primary text-dark">
                                                    <i class="fas fa-check-circle me-1"></i>Verified
                                                </span>
                                            @else
                                                <span class="badge badge-warning text-dark">
                                                    <i class="fas fa-clock me-1"></i>Pending
                                                </span>
                                            @endif
                                        </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.edit', $poi->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.destroy', $poi->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this POI?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            <button class="btn btn-sm btn-info view-details" data-id="{{ $poi->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
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

        <div class="mt-3 col-12 col-lg-3 mt-lg-0">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-plus-circle me-2 text-primary"></i>Create New POI</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="fid" class="form-label">FID</label>
                                <input type="number" class="form-control" id="fid" name="fid" placeholder="Enter FID">
                            </div>
                            <div class="mb-3">
                                <label for="poi_n_eng" class="form-label">Poi_N_Eng <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="poi_n_eng" name="poi_n_eng" required
                                    placeholder="Enter POI name English">
                            </div>
                            <div class="mb-3">
                                <label for="poi_n_myn3" class="form-label">Poi_N_Myn <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="poi_n_myn3" name="poi_n_myn3" required
                                    placeholder="Enter POI name Myanmar">
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="">Select type</option>
                                    <option value="Restaurant">Restaurant</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="Hospital">Hospital</option>
                                    <option value="School">School</option>
                                    <option value="Religious building">Religious building</option>
                                    <option value="Gas">Gas</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address" required
                                    placeholder="Enter address">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" required
                                    placeholder="Enter phone number">
                            </div>

                            <div class="mb-4 accordion" id="additionalFieldsAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#additionalFields"
                                            aria-expanded="false" aria-controls="additionalFields">
                                            <i class="fas fa-caret-down me-2"></i>Additional Details
                                        </button>
                                    </h2>
                                    <div id="additionalFields" class="accordion-collapse collapse"
                                        data-bs-parent="#additionalFieldsAccordion">
                                        <div class="accordion-body">
                                            <div class="mb-3">
                                                <label for="st_n_eng" class="form-label">Street Name</label>
                                                <input type="text" class="form-control" id="st_n_eng" name="st_n_eng"
                                                    placeholder="Enter street name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="ward_n_eng" class="form-label">Ward Name</label>
                                                <input type="text" class="form-control" id="ward_n_eng"
                                                    name="ward_n_eng" placeholder="Enter ward name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tsp_n_eng" class="form-label">Township Name</label>
                                                <input type="text" class="form-control" id="tsp_n_eng" name="tsp_n_eng"
                                                    placeholder="Enter township name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dist_n_eng" class="form-label">District Name</label>
                                                <input type="text" class="form-control" id="dist_n_eng"
                                                    name="dist_n_eng" placeholder="Enter district name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="s_r_n_eng" class="form-label">Sub Road Name</label>
                                                <input type="text" class="form-control" id="s_r_n_eng" name="s_r_n_eng"
                                                    placeholder="Enter sub road name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="hn_eng" class="form-label">House Number</label>
                                                <input type="text" class="form-control" id="hn_eng" name="hn_eng"
                                                    placeholder="Enter house number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="latitude" class="form-label">Latitude <span
                                                class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" id="latitude"
                                            name="latitude" required placeholder="e.g. 16.8409">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="longitude" class="form-label">Longitude <span
                                                class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" id="longitude"
                                            name="longitude" required placeholder="e.g. 96.1735">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="verify_dat" class="form-label">Verify Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="verify_dat" name="verify_dat" required>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="verify_by" class="form-label">Verify By <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="verify_by" name="verify_by" required
                                            placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="verify_status" class="form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="verify_status" name="verify_status" required>
                                            <option value="verified">Verified</option>
                                            <option value="not_verified">Not Verified</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="verify_remark" class="form-label">Verify Remark</label>
                                <textarea class="form-control" id="verify_remark" name="verify_remark" rows="2"
                                    placeholder="Enter verification remarks"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="remark" class="form-label">General Remark</label>
                                <textarea class="form-control" id="remark" name="remark" rows="2"
                                    placeholder="Enter general remarks"></textarea>
                            </div>

                            <input type="hidden" name="created_by" value="1">
                            <input type="hidden" name="user_id" value="1">

                            <div class="gap-2 d-grid">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-save me-2"></i>Create POI
                                </button>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#multiCollapseExample1">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <!-- Quick Stats Card -->
   <div class="mx-auto " style="max-width: 600px;">
    <div class="mb-3 card" id="statsCard">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-chart-pie me-2 text-primary"></i>Quick Stats
            </h5>
        </div>
        <div class="card-body">
            <div class="mb-3 d-flex align-items-center">
                <div class="p-3 rounded-circle bg-success bg-opacity-10 me-3">
                    <i class="fas fa-map-marker-alt text-primary"></i>
                </div>
                <div>
                    <h6 class="mb-0">Total POIs</h6>
                    <h3 class="mb-0">{{ count($pois) }}</h3>
                </div>
            </div>

            <div class="mb-3 d-flex align-items-center">
    <div class="p-3 rounded-circle bg-success bg-opacity-10 me-3">
        <i class="fas fa-newspaper text-success"></i>
    </div>
    <div>
        <h6 class="mb-0">Total Posts</h6>
        <h3 class="mb-0">{{ $posts->count() }}</h3>
    </div>
</div>


<div class="mb-3 d-flex align-items-center">
    <div class="p-3 rounded-circle bg-primary bg-opacity-10 me-3">
        <i class="fas fa-users text-primary"></i>
    </div>
    <div>
        <h6 class="mb-0">Total Users</h6>
        <h3 class="mb-0">{{ $totalUsers }}</h3>
    </div>
</div>
            {{-- <div class="mb-3 d-flex align-items-center">
                <div class="p-3 rounded-circle bg-success bg-opacity-10 me-3">
                    <i class="fas fa-check-circle text-success"></i>
                </div>
                <div>
                    <h6 class="mb-0">Verified</h6>
                    <h3 class="mb-0">{{ $pois->where('verify_dat', !null)->count() }}</h3>
                </div>
            </div> --}}
            {{-- <div class="d-flex align-items-center">
                <div class="p-3 rounded-circle bg-warning bg-opacity-10 me-3">
                    <i class="fas fa-clock text-warning"></i>
                </div>
                <div>
                    <h6 class="mb-0">Pending</h6>
                    <h3 class="mb-0">{{ $pois->where('verify_dat', 'NULL')->count() }}</h3>
                </div>
            </div> --}}
        </div>
    </div>
</div>

            <!-- Recent Activity Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-history me-2 text-primary"></i>Recent Activity</h5>
                </div>
                <div class="p-0 card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($pois->sortByDesc('id')->take(5) as $recentPoi)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ $recentPoi->poi_n_eng }}</h6>
                                    <small class="text-muted">{{ $recentPoi->type }}</small>
                                </div>
                                <span class="badge bg-light text-dark">{{ $recentPoi->verify_dat }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                {{-- <div class="text-center card-footer">
                    <a href="#" class="text-primary text-decoration-none">View All Activity</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<!-- POI Details Modal -->
<div class="modal fade" id="poiDetailsModal" tabindex="-1" aria-labelledby="poiDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="poiDetailsModalLabel">POI Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Basic Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <th>POI Name</th>
                                <td id="modal-poi-name"></td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td id="modal-type"></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td id="modal-address"></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td id="modal-phone"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Location Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <th>Street</th>
                                <td id="modal-street"></td>
                            </tr>
                            <tr>
                                <th>Ward</th>
                                <td id="modal-ward"></td>
                            </tr>
                            <tr>
                                <th>Township</th>
                                <td id="modal-township"></td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td id="modal-district"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mt-3 row">
                    <div class="col-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6>Coordinates</h6>
                                <p id="modal-coordinates" class="mb-2"></p>
                                <div id="map-placeholder" class="py-5 text-center rounded bg-secondary bg-opacity-10">
                                    <i class="mb-2 fas fa-map fa-3x text-muted"></i>
                                    <p class="mb-0">Map would be displayed here</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" id="modal-edit-link" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable with modern styling
    var table = $('#poiTable').DataTable({
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        fixedHeader: true,
        scrollX: false,
        paging: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        dom: '<"d-flex justify-content-between align-items-center mb-3"<"d-flex align-items-center"l<"ms-2"B>>f>t<"row mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        buttons: [{
            extend: 'collection',
            text: '<i class="fas fa-download me-1"></i> Export',
            className: 'btn-outline-primary',
            buttons: [{
                    extend: 'copy',
                    text: '<i class="fas fa-copy me-1"></i> Copy',
                    className: 'btn-sm'
                },
                {
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv me-1"></i> CSV',
                    className: 'btn-sm'
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel me-1"></i> Excel',
                    className: 'btn-sm'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                    className: 'btn-sm'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print me-1"></i> Print',
                    className: 'btn-sm'
                }
            ]
        }],
        columnDefs: [{
            targets: 0,
            checkboxes: {
                selectRow: true
            }
        }],
        order: [
            [0, 'desc']
        ],
        language: {
            search: "",
            searchPlaceholder: "Search...",
            lengthMenu: "_MENU_",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: '<i class="fas fa-angle-double-left"></i>',
                previous: '<i class="fas fa-angle-left"></i>',
                next: '<i class="fas fa-angle-right"></i>',
                last: '<i class="fas fa-angle-double-right"></i>'
            }
        }
    });

    // Handle bulk actions visibility
    table.on('select deselect', function() {
        var selectedRows = table.rows({
            selected: true
        }).count();
        var bulkActions = $('.bulk-actions');

        if (selectedRows > 0) {
            bulkActions.addClass('active');
            $('.selected-count').text(selectedRows + ' POIs selected');
        } else {
            bulkActions.removeClass('active');
        }
    });

    // Bulk delete action
    $('#bulk-delete').on('click', function() {
        var selectedRows = table.rows({
            selected: true
        }).data();
        var ids = [];

        // Extract IDs from selected rows
        for (var i = 0; i < selectedRows.length; i++) {
            ids.push(selectedRows[i][1]); // ID is in the second column (index 1)
        }

        if (confirm('Are you sure you want to delete ' + ids.length + ' POIs?')) {
            // In a real application, you would send these IDs to the server
            console.log('Deleting POIs with IDs:', ids);

            // Simulate deletion
            table.rows({
                selected: true
            }).remove().draw();
            $('.bulk-actions').removeClass('active');
        }
    });

    // Bulk verify action
    $('#bulk-verify').on('click', function() {
        var selectedRows = table.rows({
            selected: true
        }).data();
        var ids = [];

        // Extract IDs from selected rows
        for (var i = 0; i < selectedRows.length; i++) {
            ids.push(selectedRows[i][1]); // ID is in the second column (index 1)
        }

        if (confirm('Are you sure you want to verify ' + ids.length + ' POIs?')) {
            // In a real application, you would send these IDs to the server
            console.log('Verifying POIs with IDs:', ids);

            // Simulate verification (in a real app, you would update the server)
            alert('POIs have been verified successfully!');
            $('.bulk-actions').removeClass('active');
            table.ajax.reload();
        }
    });

    // Toggle map view
    $('#toggle-map').on('click', function() {
        $('#map-view').slideToggle();
    });

    // Adjust table on window resize
    $(window).on('resize', function() {
        table.columns.adjust().responsive.recalc();
    });

    // Handle layout based on screen size and collapse state
    function handleLayout() {
        var tableCol = document.getElementById('table-col');
        var collapse = document.getElementById('multiCollapseExample1');
        var statsCard = document.getElementById('statsCard');

        if (window.innerWidth < 992) {
            // On mobile, always use full width
            tableCol.classList.remove('col-9');
            tableCol.classList.add('col-12');

            // Show/hide stats card based on form visibility
            if (collapse.classList.contains('show')) {
                statsCard.style.display = 'none';
            } else {
                statsCard.style.display = 'block';
            }
        } else {
            // On desktop, adjust based on collapse state
            if (collapse.classList.contains('show')) {
                tableCol.classList.remove('col-12');
                tableCol.classList.add('col-9');
                statsCard.style.display = 'none';
            } else {
                tableCol.classList.remove('col-9');
                tableCol.classList.add('col-12');
                statsCard.style.display = 'block';
            }
        }
    }

    // Initial layout
    handleLayout();

    // Handle collapse events
    $('#multiCollapseExample1').on('show.bs.collapse', function() {
        handleLayout();
    });

    $('#multiCollapseExample1').on('hide.bs.collapse', function() {
        handleLayout();
    });

    // Handle window resize
    $(window).on('resize', function() {
        handleLayout();
    });

    // Refresh button functionality
   $('#refreshTable').on('click', function () {
    const $btn = $(this);
    const $icon = $btn.find('i');

    $icon.addClass('fa-spin'); // Start spinning icon

    setTimeout(function () {
        table.ajax.reload(null, false); // false = stay on current page
        $icon.removeClass('fa-spin'); // Stop spinning icon
    }, 1000); // Simulate a 1 second delay for the refresh
});

    // View details modal functionality
    $('.view-details').on('click', function() {
        var id = $(this).data('id');
        var row = $(this).closest('tr');

        // In a real application, you might fetch this data via AJAX
        // For this example, we'll use the data from the table row
        var poiName = row.find('td:eq(2)').text().trim();
        var type = row.find('td:eq(3)').text().trim();
        var address = row.find('td:eq(4)').text().trim();
        var phone = row.find('td:eq(5)').text().trim();

        // Set modal content
        $('#modal-poi-name').text(poiName);
        $('#modal-type').text(type);
        $('#modal-address').text(address);
        $('#modal-phone').text(phone);

        // Set placeholder values for other fields
        $('#modal-street').text('Sample Street');
        $('#modal-ward').text('Sample Ward');
        $('#modal-township').text('Sample Township');
        $('#modal-district').text('Sample District');

        // Set coordinates from the table
        var coordsText = row.find('td:eq(6)').text().trim();
        $('#modal-coordinates').text(coordsText);

        // Set edit link
        $('#modal-edit-link').attr('href', "{{ route('admin.edit', '') }}/" + id);

        // Show the modal
        var modal = new bootstrap.Modal(document.getElementById('poiDetailsModal'));
        modal.show();
    });

    // Add hover effects to stat cards
    $('.stat-card').hover(
        function() {
            $(this).css('transform', 'translateY(-5px)');
            $(this).css('box-shadow', 'var(--shadow-md)');
        },
        function() {
            $(this).css('transform', 'translateY(0)');
            $(this).css('box-shadow', 'var(--shadow)');
        }
    );

    // Add animation to the create button
    setInterval(function() {
        if (!$('#multiCollapseExample1').hasClass('show')) {
            $('.pulse').toggleClass('pulse');
        }
    }, 3000);

    // Hide the custom search bar since we're using DataTables built-in search
    $('.search-highlight').hide();
});
</script>
</section>

{{-- @endsection --}}
{{-- @section('scripts') --}}
