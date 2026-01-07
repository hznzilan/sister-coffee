<x-app-layout>
    <div class="py-12 bg-[#FDF8F3] min-h-screen">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Your Coffee Order</h2>

            <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-[#1A0F0D] text-[#E6A673] uppercase text-xs">
                        <tr>
                            <th class="p-6">Image</th>
                            <th class="p-6">Coffee</th>
                            <th class="p-6">Quantity</th>
                            <th class="p-6">Price</th>
                            <th class="p-6">Total</th>
                            <th class="p-6">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php $grandTotal = 0; @endphp
                        @foreach($cart as $item)
                        <tr>
                            <td class="p-6">
                                <img src="{{ asset('coffee_img/' . $item->coffee->image) }}" class="h-16 w-16 rounded-xl object-cover">
                            </td>
                            <td class="p-6 font-bold">{{ $item->coffee->name }}</td>
                            <td class="p-6">
                                <div class="flex items-center space-x-3">
                                    <a href="{{ url('update_quantity/'.$item->id.'/decrease') }}" class="bg-gray-200 px-2 rounded">-</a>
                                    <span class="font-bold">{{ $item->quantity }}</span>
                                    <a href="{{ url('update_quantity/'.$item->id.'/increase') }}" class="bg-gray-200 px-2 rounded">+</a>
                                </div>
                            </td>
                            <td class="p-6">RM {{ number_format($item->coffee->price, 2) }}</td>
                            <td class="p-6 font-bold text-[#B36B39]">
                                RM {{ number_format($item->coffee->price * $item->quantity, 2) }}
                            </td>
                            <td class="p-6">
                                <a href="{{ url('remove_cart', $item->id) }}" class="text-red-500 hover:underline" onclick="return confirm('Remove item?')">Remove</a>
                            </td>
                        </tr>
                        @php $grandTotal += ($item->coffee->price * $item->quantity); @endphp
                        @endforeach
                    </tbody>
                </table>

                <div class="p-8 bg-gray-50 flex justify-between items-center">
                    <h3 class="text-xl font-bold">Grand Total: RM {{ number_format($grandTotal, 2) }}</h3>
                    
                    <a href="{{ url('checkout') }}" class="bg-[#1A0F0D] text-white px-8 py-3 rounded-xl uppercase font-bold text-center hover:bg-[#B36B39] transition">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>