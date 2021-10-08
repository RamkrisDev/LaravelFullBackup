<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>infinite</h1>
    <section>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">infinite</h2>
            </div>
            <div class="clol-md-12" id="post-data">
                @include("data")
            </div>
        </div>
    </section>
    <div class="ajax-load text-center " style="diplay:none">
        <p>
            <img src="{{asset('images/Preloader.gif')}}" alt="">
            load more
        </p>
    </div>
    <script>
        function loader(page){
            $.ajax({
                url:"?page="+page,
                type:"GET",
                beforeSend:function(){
                    $(".ajax-load").show();
                }
            })
            .done(function(data){
                if(data.html==""){
                $('.ajax-load').html('No Other Records');
                return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function(jqXHR,ajaxOptions,thrownError){
                alert('Serever not responding');
            })
           
        }
        var page=1;
        $(window).scroll(function(){
            if($(window).scrollTop() +$(window).height() >= $(document).height()){
                page++;
                loader(page);
            }
        })
    </script>
</body>
</html>