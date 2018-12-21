<div class="col-md-3">
    <div class="card" style="margin-top:15%;">
        <div class="card-header">
            Sidebar
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li>
                    <a href="{{ url('/admin') }}" >
                        <h4>DashBoard</h4>
                    </a>
                </li>

                <li >
                    <a href="{{ url('/admin/instantad') }}">
                        <h4>Instant Ads</h4>
                    </a>
                </li>

                <li>
                    <a>
                        <h4> Banner Ads</h4>
                    </a>
                </li>

                <li>
                    <a href="{{ route('aduser') }}" >
                        <h4>User Count</h4>
                    </a>
                </li>

                <li>
                    <a href="{{ route('submission.create') }}" >
                        <h4>Add Submission</h4>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
