<!DOCTYPE html>
<html lang="en">

    <div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Potwierdzenie zamówienia</h1>

        <div class="mb-4">
            <p><strong>Numer zamówienia:</strong> {{ $order->number }}</p>
            <p><strong>Data zamówienia:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
        </div>

        <h2 class="text-xl font-semibold mb-2">Szczegóły zamówienia</h2>
        <table class="w-full text-sm text-left text-gray-500 table-fixed">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nazwa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Atrybut 1
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Atrybut 2
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cena
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ilość
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Łącznie
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $o)
                <tr class="bg-white border-b hover:bg-gray-50 my-2">
                    <td class="px-6 py-4">
                        {{$o->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$o->attributes_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$o->attributes_grind}}
                    </td>
                    <td class="px-6 py-4">
                        {{$o->price}}
                    </td>
                    <td class="px-6 py-4">
                        {{$o->quantity}}
                    </td>
                    <td class="px-6 py-4">
                        {{$o->quantity*$o->price}} PLN
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <p><strong>Całkowita cena zamówienia:</strong> {{ number_format($order->total, 2) }} PLN</p>
        </div>
        <div class="mt-4">
            <p><a href="https://www.coffeesummit.pl/shop/cart/show/{{$order->id}}">Zobacz w sklepie</a></p>
        </div>
    </div>
</body>

</html>