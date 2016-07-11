<ul class="list-group activity-list">

    @forelse ($activity as $event)
        <li class="list-group-item">
            <span class="pull-right text-muted small time-line">
             {{ $event->created_at->diffForHumans() }} <span class="fa fa-clock-o"></span>
            </span>
            {{ $event->user->name }} have learned 5 words from Lesson '{{ $event->lesson->category->name }}'.
        </li>
    @empty
        <p>{{ $user->name }} have no activity for now!</p>
    @endforelse

    {!! $activity->render() !!}

</ul>
