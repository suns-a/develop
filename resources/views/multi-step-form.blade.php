<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <title>Multi Step Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        section{
            padding-top:100px;
        }
        .form-section{
            padding-left:15px;
            display: none;
        }
        .form-section.current{
            display: inherit;
        }
        .btn-info, .btn-success{
            margin-top:10px;
        }
        .parsley-errors-list{
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
</head>
<body>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-white bg-info">
                            <h5>Multi Step Form</h5>
                        </div>
                        <div class="card-body">
                            <form class="contact-form" method="POST" action="{{route('form.formsubmit')}}">
                                @csrf
                                <div class="form-section">
                                    <label for="firstname">First Name:</label>
                                    <input type="text" name="firstname" class="form-control" required />

                                    <label for="lastname">Last Name:</label>
                                    <input type="text" name="lastname" class="form-control" required />
                                </div>

                                <div class="form-section">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" required />

                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" class="form-control" required />
                                </div>

                                <div class="form-section">
                                    <label for="msg">Message:</label>
                                    <textarea class="form-control" name="msg" required></textarea>
                                </div>

                                <div class="form-navigation">
                                    <button type="button" class="previous btn btn-info float-left">Previous</button>
                                    <button type="button" class="next btn btn-info float-right">Next</button>
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function(){
            var $sections = $('.form-section');

            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }

            function curIndex()
            {
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click(function(){
                navigateTo(curIndex()-1);
            });

            $('.form-navigation .next').click(function(){
                $('.contact-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });

            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group','block-'+index);
            });
            navigateTo(0);
        });
    </script>
</body>
</html>