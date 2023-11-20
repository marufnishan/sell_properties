<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addProductModal" aria-hidden="true">
    <form action="" method="POST" id="addProductForm">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductModal">Add a property</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Type title...." aria-label="Type title....">
                        </div>
                        <div class="col-6">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control"  rows="5"  placeholder="Type description...."></textarea>
                        </div>
                        {{-- <div class="col-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm add-row">+</button>
                                <button type="button" class="btn btn-danger btn-sm remove-row">-</button>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="propertyImage" class="form-label">Property Image</label>
                            <input class="form-control propertyImage" type="file" name="propertyImage">
                        </div>
                        <div class="col-6">
                            <label for="propertyPrice" class="form-label">Property Price</label>
                            <input class="form-control propertyPrice" type="number" name="propertyPrice" placeholder="Type property price....">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="propertyImage" class="form-label">Location</label>
                            <input class="form-control propertyImage" type="text" name="propertyImage">
                        </div>
                        <div class="col-6">
                            <label for="propertyPrice" class="form-label">Area (sqft)</label>
                            <input class="form-control propertyPrice" type="text" name="propertyPrice" placeholder="Type property price....">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="propertyImage" class="form-label">Beds & Baths</label>
                            <input class="form-control propertyImage" type="text" name="propertyImage">
                        </div>
                        <div class="col-6">
                            <label for="propertyPrice" class="form-label">Residential</label>
                            <input class="form-control propertyPrice" type="text" name="propertyPrice" placeholder="Type property price....">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <p></p>
                    <button type="submit" class="btn btn-primary">Create sell request</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
    <style>
        .col-2 {
            display: flex;
            align-items: center;
        }

        .btn-group {
            display: flex;
            gap: 5px;
            margin-top:30px!important;
        }
    </style>
@endpush
