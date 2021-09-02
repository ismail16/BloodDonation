<div class="container">
<div class="row">
<div class="col-md-12">
    <?php 
        $divisions =  \App\Models\Division::orderBy('id', 'desc')->get();
    ?>
    <form class="" action="{{ route('search_blood') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex justify-content-center mt-1 mb-1 p-2">
            <div class="col-sm-6 col-md-2 col-lg-2 search_option">
                <h6 class="mb-1 form-label">Division</h6>
                <select class="form-control-sm w-100" name="division" id="division_selector" onchange="divisionChange(this);">
                   @foreach($divisions as $division)
                    <option value="{{ $division->id }}">
                        {{ $division->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-2 search_option">
                <h6 class="mb-1 form-label">District</h6>
                <select class="form-control-sm w-100" name="district"  onchange="districtChange(this);" id="district_id">
                </select>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-2 search_option">
                <h6 class="mb-1 form-label">Thana</h6>
                <select class="form-control-sm w-100" name="thana" id="thana_id">
                </select>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-2 search_option">
                <h6 class="mb-1 form-label">Blood Group</h6>
                <select class="form-control-sm w-100" name="blood_group">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
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

<script type="text/javascript">

    function divisionChange(div)
    {
        var div_id = div.value;
        let sel = document.getElementById('district_id');
        $("#district_id").html("");
        $.ajax({
            url: "{{route('division_selector')}}",
            method: "POST",
            dataType: "JSON",
            data: {div_id:div_id, _token: '{{csrf_token()}}'},
            success: function (data) {
                for (i = 0; i < data.length; i++) {
                  sel.innerHTML += `<option value="${data[i].id}"> ${data[i].name} </option>`
                }
            },
            error: function() {
                console.log(data);
            }
        });
    }

    function districtChange(dis)
    {
        var dis_id = dis.value;
        let sels = document.getElementById('thana_id');
        $("#thana_id").html("");
        $.ajax({
            url: "{{route('district_selector')}}",
            method: "POST",
            dataType: "JSON",
            data: {dis_id:dis_id, _token: '{{csrf_token()}}'},
            success: function (data) {
                for (i = 0; i < data.length; i++) {
                  sels.innerHTML += `<option value="${data[i].id}"> ${data[i].name} </option>`
                }
            },
            error: function() {
                console.log(data);
            }
        });
    }


</script>