<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Projects Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Projects Management</h1>
                <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Create Project
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
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Price/Sqft</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Total Plots</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Stats</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($projects as $project)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-semibold">{{ $project->name }}</td>
                                <td class="px-6 py-4">{{ $project->location }}</td>
                                <td class="px-6 py-4">Rs. {{ number_format($project->price_per_sqft, 2) }}</td>
                                <td class="px-6 py-4">{{ $project->total_plots }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @php $stats = $project->getStatsAttribute() @endphp
                                    <div class="space-y-1">
                                        <div>Available: <span class="font-bold text-green-600">{{ $stats['available'] }}</span></div>
                                        <div>Booked: <span class="font-bold text-yellow-600">{{ $stats['booked'] }}</span></div>
                                        <div>Sold: <span class="font-bold text-red-600">{{ $stats['sold'] }}</span></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full @if($project->status === 'active') bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded text-sm">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">No projects found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
