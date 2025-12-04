<h2>
    {{ $job->title }} has been posted!
</h2>

<p>
    Congratulations! A new job has been posted.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View your job Listing</a>
</p>
