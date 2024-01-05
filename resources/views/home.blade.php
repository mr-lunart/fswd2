<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="list-group">
    @foreach ($category['data'] as $tag)
    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
      <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
      <div class="d-flex gap-2 w-100 justify-content-between">
        <div>
          <h6 class="mb-0">{{$tag['nama']}}</h6>
          <p class="mb-0 opacity-75">Total Product : {{$tag['total_product']}} </p>
        </div>
        <small class="opacity-50 text-nowrap">ID : {{$tag['id']}}</small>
      </div>
    </a>
    @endforeach
</div>
<br>
@foreach($products['data'] as $product)
<div class="card">
    <div class="m-2 ms-3 mb-0">
    <h4>{{$product['name']}}</h4>
    <p>Price : {{$product['price']}}</p>
    </div>
    <hr>
    <div class="row mb-3 text-center">
        @foreach($pictureProduct['data'] as $picture)
        <div class="col-4">
            @if($picture['slug']==$product['slug'])
            {{$picture['image']}}
            @endif
        </div>
        @endforeach
    </div>
</div>
@endforeach
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>