@extends("Layouts.layout")
@section('content')
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @if (session()->has('image'))
        <div>
            {{Session::get('image')}}

            <script>
                //toastr
                toastr.success("{!! Session::get('image') !!}");


                //swt alert
                swal('Great Job!',"{!! Session::get('image') !!}")

            </script>
        </div>
    @endif
   
        <h1 class="text-primary">addImage</h1>
    <form action="imgup" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="">
        <input type="file" name="file" id="" onchange="preview(this)">
        <img id="Preview"  alt="profileimage" width="200" height="200">
        <input type="submit" value="loadImage">
    </form>

<script>
    function preview(input){
        var file=$("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload=function(){
                $('#Preview').attr("src",reader.result);

            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection