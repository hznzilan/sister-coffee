<x-app-layout>
    <div class="py-12 bg-[#FDF8F3] min-h-screen">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-[#1A0F0D]">My Orders</h2>
            <div class="flex flex-wrap gap-2 mb-6">
    <a href="{{ route('user.orders', ['status' => 'all']) }}" 
       class="px-6 py-2 rounded-xl text-xs font-bold uppercase tracking-widest transition-all 
       {{ !request('status') || request('status') == 'all' ? 'bg-[#1A0F0D] text-white shadow-md' : 'bg-white text-gray-500 border border-gray-200 hover:bg-gray-50' }}">
        All Orders
    </a>

    <a href="{{ route('user.orders', ['status' => 'processing']) }}" 
       class="px-6 py-2 rounded-xl text-xs font-bold uppercase tracking-widest transition-all 
       {{ request('status') == 'processing' ? 'bg-orange-500 text-white shadow-md' : 'bg-white text-gray-500 border border-gray-200 hover:bg-gray-50' }}">
        Processing
    </a>

    <a href="{{ route('user.orders', ['status' => 'delivered']) }}" 
       class="px-6 py-2 rounded-xl text-xs font-bold uppercase tracking-widest transition-all 
       {{ request('status') == 'delivered' ? 'bg-green-600 text-white shadow-md' : 'bg-white text-gray-500 border border-gray-200 hover:bg-gray-50' }}">
        Delivered
    </a>
</div>



            <div class="bg-white rounded-3xl shadow-sm overflow-hidden border border-gray-100">
                <table class="w-full text-left">
                    <thead class="bg-[#1A0F0D] text-white text-xs uppercase tracking-widest">
                        <tr>
                            <th class="p-6">Order ID</th>
                            <th class="p-6">Date</th>
                            <th class="p-6" style="width: 40%;">Items</th>
                            <th class="p-6">Total Bill</th>
                            <th class="p-6">Payment</th>
                            <th class="p-6">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($orders as $date => $orderGroup)
                        @php
                            $firstItem = $orderGroup->first();
                            $totalBill = $orderGroup->sum(fn($item) => $item->price * $item->quantity);
                        @endphp
                        <tr class="hover:bg-gray-50/50 transition align-top">
                            <td class="p-6 font-mono text-sm text-gray-400">{{ $firstItem->id }}</td>

                            <td class="p-6 text-gray-600 text-sm">
                                {{ \Carbon\Carbon::parse($date)->format('d M Y') }}<br>
                                <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($date)->format('h:i A') }}</span>
                            </td>

                            <td class="p-6">
                                <div class="space-y-4">
                                    @foreach($orderGroup as $item)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <img src="{{ asset('coffee_img/' . $item->image) }}" class="h-12 w-12 rounded-xl object-cover shadow-sm">
                                            <div>
                                                <p class="font-bold text-gray-800 text-sm mb-0">{{ $item->coffee_title }}</p>
                                                <p class="text-xs text-gray-400">x{{ $item->quantity }}</p>
                                            </div>
                                        </div>
                                        <div class="text-sm font-medium text-gray-600">
                                            RM {{ number_format($item->price, 2) }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </td>

                            <td class="p-6 font-bold text-[#B36B39]">RM {{ number_format($totalBill, 2) }}</td>

                            <td class="p-6">
                                <span class="text-xs italic text-gray-400 uppercase font-semibold">{{ $firstItem->payment_status }}</span>
                            </td>

                            <td class="p-6">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase
                                    {{ $firstItem->delivery_status == 'delivered' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                    {{ $firstItem->delivery_status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>