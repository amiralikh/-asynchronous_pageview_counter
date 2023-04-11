@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">date</th>
                            <th scope="col">url</th>
                            <th scope="col">total views</th>
                            <th scope="col">unauthorized</th>
                            <th scope="col">authorized</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visit_report as $report)
                            <tr>
                                <td>{{ $report->date }}</td>
                                <td>{{ $report->url }}</td>
                                <td>{{ $report->total_views }}</td>
                                <td>{{ $report->unauthorized_views }}</td>
                                <td>{{ $report->authorized_views }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
