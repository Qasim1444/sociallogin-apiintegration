
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PageSpeed Analysis</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pagespeed.analyze') }}">
                        @csrf
                        <div class="form-group">
                            <label for="url">Enter URL to analyze:</label>
                            <input type="url" class="form-control" id="url" name="url" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Analyze</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

