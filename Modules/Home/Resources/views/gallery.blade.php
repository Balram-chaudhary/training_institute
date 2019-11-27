<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
   <link rel="stylesheet" href="{{asset('/public/himalayan/css/gallery.css')}}">
    <title>Microinstitue Gallery</title>
</head>
<body>

<div class="container gallery-container">

    <h1 style="color:#355a35;">Micro Institute Gallery</h1>
    <a href="{{route('home')}}">Back To Home</a>    
    <div class="tz-gallery">

        <div class="row">
          @if(sizeof($gallery)>0)
                  @foreach($gallery as $g)

            <div class="col-sm-12 col-md-4">
                <a class="lightbox" href="{{url('/public/images/'.$g->image)}}">
                    <img src="{{url('/public/images/'.$g->image)}}" alt="{{$g->image}}">
                </a>
            </div>
             @endforeach
                 @else
                    <h3>
                      No Photos Here 
                    </h3>
                 @endif

        </div>

    </div>
    <div class="center" id="paginated" style="text-align: center;">
              {{ $gallery->links() }}
          </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>