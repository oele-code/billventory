<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Factura {{ $invoice }}</title>
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('logo.png') }}">
      </div>
      <h1>Factura #{{ $invoice }}</h1>
      <div id="company" class="clearfix">
        <div>{{ $company['name'] }}</div>
        <div>{{ $company['nit'] }}</div>
        <div>{{ $company['address'] }}</div>
        <div>{{ $company['mobile'] }}</div>
        <div><a href="{{ $company['email'] }}">{{ $company['email'] }}</a></div>
      </div>
      <div id="project">
        <div><span>Cliente</span> {{ $customer['name'] }}</div>
        <div><span>Dirección</span> {{ $customer['address'] }}</div>
        <div><span>Email</span> <a href="{{ $customer['email'] }}">{{ $customer['email'] }}</a></div>
        <div><span>Fecha</span> {{ $date }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Referencia</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @for($i = 0; $i < count($data); $i++)
          <tr>
            <td class="service">{{ $data[$i]['ref'] }}</td>
            <td>{{ $data[$i]['name'] }}</td>
            <td class="unit">{{ number_format($data[$i]['price'],0, ',','.') }}</td>
            <td class="qty">{{ $data[$i]['qty'] }}</td>
            <td class="total">{{ number_format($data[$i]['total'],0, ',','.') }}</td>
          </tr>
          @endfor
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">{{ number_format( $totalAll,0, ',','.') }}</td>
          </tr>
        </tbody>
      </table>
      <!-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> -->
    </main>
    <footer>
    </footer>
  </body>
</html>