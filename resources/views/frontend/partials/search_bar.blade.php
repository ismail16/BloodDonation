<div class="container">
<div class="row">
<div class="col-md-12">
    <?php 
        $divisions =  \App\Models\Division::where('id', 'desc')->get();
    ?>
    <form class="" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex justify-content-center mt-1 mb-1 p-2">
            <div class="col-sm-6 col-md-2 col-lg-2 search_option">
                <h6 class="mb-1 form-label">Division</h6>
                <select class="form-control-sm w-100" name="looking_for">
                    @foreach($divisions as $division)
                    <option value="{{ $division->slug }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-2 search_option">
                <h6 class="mb-1 form-label">District</h6>
                <select class="form-control-sm w-100" name="marital_status">
                    <option value="Never_Married">Never Married</option>
                    <option value="Legally_Separated">Legally Separated</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Anulled">Anulled</option>
                </select>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-2 search_option">
                <h6 class="mb-1 form-label">Thana</h6>
                <select class="form-control-sm w-100" name="relegion">
                    <option value="Islam">Islam</option>
                </select>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 search_option">
                <h6 class="mb-1 form-label">Blood Group</h6>
                <select class="form-control-sm w-100" name="profession">
                    <option value="">Select Profession *</option>
                    <option value="Acting professional">Acting professional</option>
                </select>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-1 d-flex align-items-center d-flex justify-content-center">
                <button class="btn btn-sm  btn-block btn-primary p-2 px-1 mt-1">Search</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>