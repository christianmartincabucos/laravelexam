@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Verify Mobile No.</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="https://developer.globelabs.com.ph/dialog/oauth/Mk4Ru6oBaetq5cd6rnTBnLtKGkpKurpg">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                    Register your number
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
