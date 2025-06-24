<x-layout>
    <x-slot name="title">All Jobs</x-slot>
    <ul>
       @forelse($jobs as $job)
            <li>{{$job}}</li>
       @empty
            <li>No jobs available at the moment.</li>
       @endforelse
    </ul>
</x-layout>