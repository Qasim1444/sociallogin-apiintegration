<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Analysis Results</div>

                    <div class="card-body">
                        @if(isset($results['lighthouseResult']))
                            <h3>Performance Score: {{ $results['lighthouseResult']['categories']['performance']['score'] * 100 }}%</h3>

                            <h4>Metrics:</h4>
                            <ul>
                                @foreach($results['lighthouseResult']['audits'] as $audit)
                                    @if(isset($audit['displayValue']))
                                        <li>
                                            <strong>{{ $audit['title'] }}:</strong>
                                            {{ $audit['displayValue'] }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-danger">
                                Error analyzing the URL. Please try again.
                            </div>
                        @endif

                        <a href="{{ route('pagespeed.index') }}" class="btn btn-primary mt-3">Analyze Another URL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
