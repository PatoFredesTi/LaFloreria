<div>
        <div class="grid grid-cols-5 gap-6 container py-8">
            <div class="col-span-3">
                <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                    <p class="text-gray-700 uppercase">Numero de orden: {{$order->id}}</p>
                </div>
    
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <p class="text-lg font-semibold uppercase">Envio <i class="fas fa-truck ml-4"></i></p>
    
                            <p class="text-sm">Los productos seran enviados a:</p>
                            <p class="text-sm">{{$order->address}}</p>
                            <p class="text-sm">ARREGLAR</p>
    
                        </div>
    
                        <div>
                            <p class="text-lg font-semibold uppercase">Datos de contacto <i class="far fa-edit ml-4"></i></p>
    
                            <p class="text-sm">Persona que recibira el producto:  {{$order->contact}}</p>
                            <p class="text-sm">Telefono de contacto: {{$order->phone}}</p>
                        </div>
                    </div>
                </div>
    
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6 text-gray-700">
                    <p class="text-xl font-semibold mb-4">Resumen</p>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <div class="flex">
                                            <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">
                                            <article>
                                                <h1 class="font-bold">{{$item->name}}</h1>
                                            </article>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                    $ {{number_format($item->price)}}
                                    </td>
                                    <td class="text-center">
                                        {{$item->qty}}
                                    </td>
                                    <td class="text-center">
                                        $ {{number_format($item->price * $item->qty)}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    
    
    
    
                
                
                <x-button class="w-full mt-4">
                    Generar Orden
                </x-button>
            </div>
    
            <div class="col-span-2">
                <div class="bg-white rounded-lg shadow-lg px-6 py-6 ">
                    <div class=" flex justify-between items-center mb-4">
                        <img class="h-20 w-30 object-cover" src="{{ asset('img/friso-formas-de-pago.png') }}" alt="">
            
                        <div class="text-gray-700">
                            <p class="font-semibold text-sm">
                                Subtotal: $ {{number_format($item->price * $item->qty)}}
                            </p>
                            <p class="font-semibold text-sm">
                                Envio: $ {{number_format($order->shipping_cost)}}
                            </p>
                            <p class="text-lg font-semibold">
                                Total:  {{number_format(($item->price * $item->qty) + $order->shipping_cost)}}
                            </p>
                        </div>   
                    </div> 
    
                    <div id="paypal-button-container"></div>
                </div>   
                
            </div>
        </div>
    
</div>

@push('script')
<script src="https://www.paypal.com/sdk/js?client-id={{config('services.paypal.client_id')}}"></script>
    
<script>
      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '77.44' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                Livewire.emit('payOrder' );

            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');

    </script>
@endpush
