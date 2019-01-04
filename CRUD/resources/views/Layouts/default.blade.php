<!DOCTYPE html>
<html lang="en">
<head>
 @include('includes.head')
</head>
<body style="min-height: 98vh;position: relative;margin: 0;"> 
    <header class="row">
    @include('includes.header')
    </header>
    <div id="main" class="container-fluid">
            @yield('content')
    </div>  
</body>
</html>