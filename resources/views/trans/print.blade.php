
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Laundry</title>

  <style>
    body{
      font-family: cursive;
      width: 80mm;
      margin: auto;
      padding: 30px;
    }

    .struk{
      text-align: center;
    }

    .line{
      margin: 5px 0;
      border-top: 1px dashed black;

    }

    .info, .product, .summary{
      text-align: left;
    }

    .products .item{
      margin-bottom: 5px;
    }

    .product .item-qty{
      display: flex;
      justify-content: space-evenly;
    }

    .info .row, .summary .row{
      display: flex;
      justify-content: space-between;
      margin: 2px
    }

    footer{
      text-align:center;
      font-size: 13px;
      margin-top: 10px

    }

    @media print{
      body{
        width: 88mm;
        margin: 0;
      }
    }

  </style>
</head>
<body>
  <div class="struk">
    <div class="struk-header">
      <h3>VadiZ Bubbles</h3>
      <h2>Bersih dan Wangi Jing!!!</h2>

      <div class="info text-center">
        Jl. Karet Baru Benhill Jakarta Pusat
        <br>
        081317487093
      </div>
    </div>
    <div class="line">
      <div class="info">
        <div class="row">
            <span>
             {{$details->created_at->format('d M Y')}}
            </span>
            <span>{{$details->created_at->format('H:i')}}</span>
        </div>
        <div class="row">
          <span>Cashier Name</span>
          <span>{{auth()->user()->name}}</span>
        </div>
        <div class="row">
          <span>Order ID:</span>
          <span>{{$details->order_code ?? ''}}</span>
        </div>
      </div>
    <div class="line"></div>
        <div class="product">
          @foreach ($details->details as $detail )

          <div class="item">
            <strong>{{$detail->service->service_name}}</strong>
            <div class="item-qty">
                <span>{{$detail->qty}}x@ {{number_format($detail->service->price)}}</span>
                <span>{{$detail->subtotal}}</span>
            </div>
          </div>
          @endforeach
        </div>
    </div>
    <div class="line"></div>
    <div class="summary">
      <div class="row">
        <span>Sub Total</span>
        <span>Rp. {{number_format($details->total)}}</span>
      </div>
    </div>
    <div class="line"></div>
    <footer>
      Terimakasih Jing!!!
    </footer>
  </div>

<script>
  window.print();


</script>
</body>
</html>
