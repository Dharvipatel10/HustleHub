<x-layout>
    <h2 class="text-center text-3xl mb-4 font-bold border-gray-300 p-3">Welcome To HustleHub</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
       @forelse($jobs as $job)
            <x-job-card :job="$job"/>
       @empty
            <p>No jobs available at the moment.</p>
       @endforelse
    </div>
    <a href="{{ route('jobs.index') }}" class="block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"></i> 
        Show All Jobs
    </a>
    <x-bottom-banner />
</x-layout>