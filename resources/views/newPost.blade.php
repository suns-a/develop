<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinite Scroll Pagination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Infinite Scroll Pagination</h2>
                </div>
                <div class="col-md-12" id="post-data">
                    @include('data')
                </div>
            </div>
        </div>
    </section>
    <div class="ajax-load text-center" style="display: none">
        <p><img src="{{asset('images/icon_loader_a_ww_01_s1.gif')}}"/> Loading More Post</p>
    </div>

    <script>
        function loadMoreData(page)
        {
            $.ajax({
                url:'?page=' + page,
                type:'get',
                beforeSend: function()
                {
                    $(".ajax-load").show();
                }
            })
            .done(function(data){
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function(jqXHR,ajaxOptions,thrownError){
                alert("Server not responding...");
            });
        }

        var page = 1;
        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() >= $(document).height()){
                page++;
                loadMoreData(page);
            }
        });
    </script>
</body>
</html>