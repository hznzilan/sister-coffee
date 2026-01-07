<x-app-layout>
    
    <div class="py-12 bg-[#FDF8F3] min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            
            <h2 class="text-2xl font-bold mb-6 text-[#1A0F0D]">Your Order</h2>
            <div class="bg-white rounded-3xl shadow-sm overflow-hidden mb-10">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-xs uppercase font-bold text-gray-600">
                        <tr>
                            <th class="p-6">Coffee Item</th>
                            <th class="p-6 text-center">Quantity</th>
                            <th class="p-6 text-right">Price</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php $total = 0; @endphp
                        @foreach($cart as $item)
                        <tr>
                            <td class="p-6 flex items-center space-x-4">
                                <img src="{{ asset('coffee_img/' . $item->coffee->image) }}" class="h-14 w-14 rounded-xl object-cover shadow-sm">
                                <div>
                                    <p class="font-bold text-[#1A0F0D]">{{ $item->coffee->name }}</p>
                                </div>
                            </td>
                            <td class="p-6 text-center font-semibold text-gray-600">{{ $item->quantity }}</td>
                            <td class="p-6 text-right font-bold text-[#1A0F0D]">RM {{ number_format($item->coffee->price * $item->quantity, 2) }}</td>
                        </tr>
                        @php $total += ($item->coffee->price * $item->quantity); @endphp
                        @endforeach 
                    </tbody>
                    <tfoot class="bg-gray-50/50">
                        <tr>
                            <td colspan="2" class="p-6 text-lg font-bold text-[#1A0F0D]">Grand Total</td>
                            <td class="p-6 text-right text-xl font-extrabold text-[#B36B39]">RM {{ number_format($total, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <form action="{{ route('confirm.order') }}" method="POST" class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                @csrf
                
                <h2 class="text-xl font-bold mb-6 flex items-center">
                    <span class="bg-[#1A0F0D] text-white h-7 w-7 rounded-full flex items-center justify-center mr-3 text-xs">1</span>
                    Delivery Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div>
                        <label class="block font-bold text-xs uppercase tracking-wide text-gray-400 mb-2"> Name</label>
                        <input type="text" value="{{ Auth::user()->name }}" disabled 
                               class="w-full rounded-xl border-gray-100 bg-gray-50 text-gray-500 font-medium cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block font-bold text-xs uppercase tracking-wide text-gray-700 mb-2">Phone Number</label>
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" required placeholder="011-XXXXXXX" 
                               class="w-full rounded-xl border-gray-200 focus:border-[#B36B39] focus:ring-[#B36B39] transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-bold text-xs uppercase tracking-wide text-gray-700 mb-2">Address</label>
                        <input type="text" name="address" required placeholder="e.g. Mahallah Ruqayyah, Block B" 
                               class="w-full rounded-xl border-gray-200 focus:border-[#B36B39] focus:ring-[#B36B39] transition">
                    </div>
                </div>

                <h2 class="text-xl font-bold mb-6 flex items-center">
                    <span class="bg-[#1A0F0D] text-white h-7 w-7 rounded-full flex items-center justify-center mr-3 text-xs">2</span>
                    Payment Method
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                    <label class="relative flex cursor-pointer rounded-2xl border p-4 hover:bg-gray-50 transition has-[:checked]:border-[#B36B39] has-[:checked]:bg-[#FDF8F3]">
                        <input type="radio" name="payment_method" value="cash on delivery" class="sr-only peer" checked>
                        <div class="flex flex-1 items-center justify-between">
                            <div class="flex flex-col">
                                <span class="block text-sm font-bold text-gray-900">Cash on Delivery</span>
                                <span class="text-xs text-gray-500 italic">Pay on arrival</span>
                            </div>
                        </div>
                    </label>

                    <label class="relative flex cursor-pointer rounded-2xl border p-4 hover:bg-gray-50 transition has-[:checked]:border-[#B36B39] has-[:checked]:bg-[#FDF8F3]">
                        <input type="radio" name="payment_method" value="card" class="sr-only peer">
                        <div class="flex flex-1 items-center justify-between">
                            <div class="flex flex-col">
                                <span class="block text-sm font-bold text-gray-900">Debit / Credit Card</span>
                                <span class="text-xs text-gray-500 italic">Secure online payment</span>
                            </div>
                        </div>
                    </label>
                </div>

                <div id="card-form" class="hidden mt-6 bg-gray-50 p-6 rounded-2xl border border-dashed border-gray-300">
    <h3 class="text-sm font-bold uppercase tracking-widest mb-4 text-gray-700">Card Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="md:col-span-2">
            <label class="block text-xs font-bold mb-1">Name on Card</label>
            <input type="text" name="card_name" class="w-full rounded-xl border-gray-200">
        </div>
        <div class="md:col-span-2">
            <label class="block text-xs font-bold mb-1">Card Number</label>
            <input type="text" name="card_number" placeholder="0000 0000 0000 0000" class="w-full rounded-xl border-gray-200">
        </div>
        <div>
            <label class="block text-xs font-bold mb-1">Expiry Date</label>
            <input type="text" name="card_expiry" placeholder="MM/YY" class="w-full rounded-xl border-gray-200">
        </div>
        <div>
            <label class="block text-xs font-bold mb-1">CVV</label>
            <input type="text" name="card_cvv" placeholder="123" class="w-full rounded-xl border-gray-200">
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[name="payment_method"]').forEach((elem) => {
        elem.addEventListener("change", function(event) {
            var cardForm = document.getElementById("card-form");
            if (event.target.value === "card") {
                cardForm.classList.remove("hidden");
            } else {
                cardForm.classList.add("hidden");
            }
        });
    });
</script>

                <button type="submit" class="w-full bg-[#1A0F0D] text-white py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-[#B36B39] transition-all shadow-xl">
                    Confirm Order
                </button>
            </form>
        </div>
    </div>
</x-app-layout>