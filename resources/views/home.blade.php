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

                        <!-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No.') }}</label>

                            <div class="col-md-6">
                                <input id="sendsms" type="text" class="form-control @error('sendsms') is-invalid @enderror" name="sendsms" value="{{ Auth::user()->mobile_no }}" readonly required autocomplete="sendsms" autofocus>

                                @error('sendsms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send SMS') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- <table class="table table-sm text-center table-hover rounded-lg">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ Auth::user()->email }}</td>
                                <td>{{ Auth::user()->mobile_no }}</td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
