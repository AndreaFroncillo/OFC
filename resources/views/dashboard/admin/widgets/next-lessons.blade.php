@props([
'nextLessons',
])

<div class="dashboard-widget dashboard-next-lessons-widget">
    <div class="dashboard-widget-header">
        <div>
            <p class="dashboard-kicker mb-1">{{trans_choice('general.calendary', 1)}}</p>
            <h2 class="dashboard-widget-title">{{__('general.next_lessons')}}</h2>
        </div>
        <i class="fas fa-calendar-check dashboard-widget-header-icon"></i>
    </div>

    <div class="dashboard-list">
        @forelse($nextLessons as $nextLesson)
        <a href="#" class="dashboard-list-item dashboard-lesson-item">
            <div class="dashboard-lesson-date">
                <span>{{ $nextLesson['day'] }}</span>
                <small>{{ $nextLesson['month'] }}</small>
            </div>

            <div class="dashboard-list-content">
                <h4>{{ $nextLesson['title'] }}</h4>

                <div class="dashboard-lesson-meta">
                    <span>
                        <i class="fas fa-clock"></i>
                        {{ $nextLesson['time'] }}
                    </span>

                    <span>
                        <i class="fas fa-user-tie"></i>
                        {{ $nextLesson['trainer'] }}
                    </span>

                    <span>
                        <i class="fas fa-users"></i>
                        {{ $nextLesson['bookings'] }}
                    </span>
                </div>

                @if($nextLesson['percentage'] > 0)
                <div class="dashboard-lesson-progress" style="--progress: {{ $nextLesson['percentage'] }}%;">
                    <div></div>
                </div>
                @else
                <p class="dashboard-lesson-empty-bookings">
                    {{__('general.no_booking')}}
                </p>
                @endif
            </div>

            <span class="dashboard-badge {{ $nextLesson['badgeClass'] }}">
                {{ $nextLesson['badgeText'] }}
            </span>

            <i class="fas fa-arrow-right dashboard-list-arrow"></i>
        </a>
        @empty
        <div class="dashboard-empty-state">
            <i class="fas fa-calendar-xmark"></i>
            <p>{{__('general.no_classes_scheduled')}}</p>
        </div>
        @endforelse
    </div>

    <a href="#" class="dashboard-widget-link">
        {{__('quick.manage_classes')}}
        <i class="fas fa-arrow-right"></i>
    </a>
</div>