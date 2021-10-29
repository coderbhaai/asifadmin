<!DOCTYPE html>
<html>
<head>
<title>Order placed with Amina Boutique</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    body{
        padding: 1em 2em;
    }
    button{
        margin: 1em 0;
        background: #e20574;
        border: none;
        padding: 1em 2em;
        color: #fff;
        border-radius: 5px;
    }
    button a{
        color: #fff;
        text-decoration: none;
    }
    a.ssy{
        color:  #e20574;
    }
    .logo-img{
        max-width: 130px;
        height: auto;
    }
</style>	
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <h2>Hi, </h2>
    <p>Your order is placed successfully with us.</p>
    <p>Your Order is: </p>
    @if(count($x))<h2>Courses</h2>@endif
    @foreach($x as $i)
        <p><a href="https://aminaboutique.in/course/{{$i['url']}}">{{ $i['name'] }}</a> : &#8377; {{ $i['sale'] }}</p>
    @endforeach

    @if(count($y))<h2>Products</h2>@endif
    @foreach($y as $i)
        <p><a href="https://aminaboutique.in/product/{{$i['url']}}">{{ $i['name'] }}</a> : {{ $i['amount'] }} @ {{ $i['sale'] }} = &#8377; {{ $i['amount'] * $i['sale'] }}</p>
    @endforeach

    <p>Thank you for placing the order with us</p>
    
    <p>Warm Regards</p>
    <h2>Team AminaBoutique</h2>		
</body>
</html>