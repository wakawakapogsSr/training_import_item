<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> LYR </title>
  <style>
    .hover-container {
      position: relative;
      display: inline-block;
    }

    /* Hidden text initially */
    .hover-container .hover-text {
      visibility: hidden;
      background-color: black;
      color: white;
      text-align: center;

      /* Position the text */
      position: absolute;
      bottom: 100%; /* Show above the element */
      left: 50%;
      transform: translateX(-50%);
      white-space: nowrap;
      z-index: 1;
    }

    /* Show the text when hovering over the container */
    .hover-container:hover .hover-text {
      visibility: visible;
    }
  </style>
</head>
<body>
  <a href="{{ route('branches') }}" style="margin-right: 10px;"> Branches </a>
  <a href="{{ route('items') }}" style="margin-right: 10px;"> Items </a>
  <hr>
  @yield('content')
</body>
</html>