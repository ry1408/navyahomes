<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Plots Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Plots Management</h1>
        <a href="{{ route('admin.plots.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Create Plot
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            {{ $message }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">Plot No.</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">Project</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">Area (Sqft)</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">Total Price</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($plots as $plot)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-semibold">{{ $plot->plot_number }}</td>
                        <td class="px-4 py-3">{{ $plot->project->name }}</td>
                        <td class="px-4 py-3">{{ number_format($plot->area_sqft, 2) }}</td>
                        <td class="px-4 py-3">Rs. {{ number_format($plot->total_price, 2) }}</td>
                        <td class="px-4 py-3">
                            @if ($plot->isAvailable())
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Available
                                </span>
                            @elseif ($plot->isBooked())
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Booked
                                </span>
                            @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Sold
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            @if (!$plot->isSold())
                                <a href="{{ route('admin.plots.edit', $plot) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded text-xs">
                                    Edit
                                </a>
                            @endif

                            @if (!$plot->isSold())
                                <form method="POST" action="{{ route('admin.plots.destroy', $plot) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded text-xs">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No plots found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $plots->links() }}
    </div>
        </div>
    </div>
</x-app-layout>
