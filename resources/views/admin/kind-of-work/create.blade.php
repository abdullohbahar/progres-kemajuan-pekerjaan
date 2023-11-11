@extends('admin.layout.app')

@section('title')
    Tambah Macam Pekerjaan
@endsection

@push('addons-css')
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Tambah Macam Pekerjaan</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard.admin') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Tambah Macam Pekerjaan</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <form action="{{ route('kind.of.work.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" id="" value="{{ $task_id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-0 pt-5">
                                    <div class="card-toolbar">
                                        <a href="javascript: history.go(-1)" class="btn btn-sm btn-primary">
                                            <i class="fas fa-arrow-left"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-end">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Divisi</label>
                                                <select class="form-select" name="name" id="divisi" required>
                                                    <option value="">-- Pilih Divisi --</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->name }}" data-id="{{ $division->id }}"
                                                            {{ old('name') == $division->name ? 'selected' : '' }}>
                                                            {{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('name')
                                                    <div id="validationServerUsernameFeedback"
                                                        class="invalid-feedback text-capitalize">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-container">
                                        <div class="row" id="main-form">
                                            <div class="col-12 dynamic-form">
                                                <div class="row justify-content-end">
                                                    <div class="col-8">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="sub_name">
                                                                Pekerjaan</label>
                                                            <input class="form-control" id="sub_pekerjaan"
                                                                placeholder="Ketik untuk mencari pekerjaan"
                                                                list="datalistOptions" name="sub_name[]"
                                                                value="{{ old('sub_name') }}" autocomplete="new-password"
                                                                required>
                                                            <datalist id="datalistOptions">
                                                                {{-- @foreach ($tasks as $task)
                                                                    <option value="{{ $task->name }}">
                                                                @endforeach --}}
                                                            </datalist>
                                                            @error('sub_name')
                                                                <div id="validationServerUsernameFeedback"
                                                                    class="invalid-feedback text-capitalize">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label" for="unit">
                                                            Satuan</label>
                                                        <input type="text" name="unit[]" class="form-control" required
                                                            id="unit">
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="information">Keterangan</label>
                                                            <textarea name="information[]" class="form-control @error('information') is-invalid @enderror" id="information"
                                                                cols="10" rows="2">{{ old('information') }}</textarea>
                                                            @error('information')
                                                                <div id="validationServerUsernameFeedback"
                                                                    class="invalid-feedback text-capitalize">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label class="form-label">Hapus</label>
                                                            <div class="d-grid">
                                                                <a href="javascript:;" id="hapus"
                                                                    class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-11 d-grid mt-4">
                                            <a href="javascript:;" id="tambah-sub" class="btn btn-light-primary">Tambah
                                                Sub
                                                Pekerjaan</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-grid">
                                    <button class="btn btn-success"> Simpan Pekerjaan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection

@push('addons-js')
    <script>
        var responseData; // Declare a variable to store response datas globally

        $(document).ready(function() {
            var subTaskCount = 1;

            // Function to clone the form elements
            function cloneForm() {
                var clonedForm = $("#main-form").clone();

                // Remove the "Tambah Sub Pekerjaan" button from the clone
                clonedForm.find("#tambah-sub").remove();

                // Clear values in the cloned form
                clonedForm.find('select[name="name[]"]').val(' '); // Assuming ' ' is the default value
                clonedForm.find('input[name="sub_name[]"]').val('');
                clonedForm.find('input[name="unit[]"]').val('');
                clonedForm.find('textarea[name="information[]"]').val('');

                // Append the cloned form to the container
                $("#form-container").append(clonedForm);

                subTaskCount++;
            }

            // Event listener for adding a new subtask
            $("#tambah-sub").click(function() {
                cloneForm();
            });

            // Event listener for removing a cloned form
            $("body").on("click", "#hapus", function() {
                if (confirm("Apakah Anda yakin ingin menghapus?")) {
                    $(this).closest(".dynamic-form").remove();
                }
            });
        });
    </script>

    <script>
        // Function to fetch and update datalist options
        function updateDatalistOptions(divisionID) {
            $.ajax({
                url: "/get-task-by-division/" + divisionID,
                method: "GET",
                dataType: "json",
                success: function(response) {
                    var datalistOptions = $("#datalistOptions");

                    console.log(response)

                    // Clear existing options
                    datalistOptions.empty();

                    // Populate datalist with new options
                    $.each(response.datas, function(index, task) {
                        datalistOptions.append($("<option>").attr("value", task.name));
                    });

                    responseData = response.datas;

                }
            });
        }

        // Event listener for change in division
        $("body").on("change", "#divisi", function() {
            var selectedOption = $(this).find(":selected");

            // Get the data-id attribute value
            var divisionID = selectedOption.data("id");

            // Update datalist options
            updateDatalistOptions(divisionID);
        });

        // Event listener for input focus on pekerjaan
        $("body").on("input", "#sub_pekerjaan", function() {
            var divisionID = $("#divisi").find(":selected").data("id");

            // Update datalist options
            updateDatalistOptions(divisionID);

            // Get the selected value from the input field
            var selectedValue = $(this).val();

            // Find the corresponding task in the response datas
            var selectedTask = responseData.find(task => task.name === selectedValue);

            // Update the unit input field with the unit of the selected task
            // $("#unit").val(selectedTask ? selectedTask.unit : "");

            $(this).closest('.row').find('div.col-3 input[name="unit[]"]').val(selectedTask.unit)

            // Handle the selected value as needed
            console.log("Selected Value:", selectedTask);

            // You can perform additional actions here based on the selected value
        });
    </script>
@endpush
